package com.nagamint.instantcrush.chat

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.database.ValueEventListener
import com.nagamint.instantcrush.R
import com.squareup.picasso.Picasso
import com.xwray.groupie.Item
import com.xwray.groupie.ViewHolder
import kotlinx.android.synthetic.main.user_row_new_message.view.*
import com.nagamint.instantcrush.models.UserData
import com.xwray.groupie.GroupAdapter
import kotlinx.android.synthetic.main.activity_new_message.*

class NewMessageActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_new_message)

        //choose and display users
        chooseAndDisplayUsers()
    }

    companion object {
        const val USER_OBJ = "USER_OBJ"
    }

    private fun chooseAndDisplayUsers() {
        //first, we choose what users are allowed to chat (both must had matched)
        var allowedUsers = arrayListOf<String>()
        val currentUser = FirebaseAuth.getInstance().uid

        val allowedUsersReference = FirebaseDatabase.getInstance().getReference("matches/$currentUser")
        allowedUsersReference.addListenerForSingleValueEvent( object : ValueEventListener {

            override fun onDataChange(p0: DataSnapshot) {
                p0.children.forEach {
                    val match1 = it.child("requestSender").value
                    val match2 = it.child("requestReceiver").value

                    if (match1 != null && match2 != null && match1 == match2) {
                        //so they have matched each other
                        allowedUsers.add(it.key.toString())
                    }
                }

                showUsers(allowedUsers)

            }
            override fun onCancelled(p0: DatabaseError) {}
        })
    }

    private fun showUsers(allowedUsers:ArrayList<String>) {

        val ref = FirebaseDatabase.getInstance().getReference("/users")

        ref.addListenerForSingleValueEvent( object: ValueEventListener{
            override fun onDataChange(p0: DataSnapshot) {
                //create adapter
                val adapter = GroupAdapter<ViewHolder>()

                p0.children.forEach {
                    val user = it.getValue(UserData::class.java)
                    //here will be a condition that choose which users should be displayed
                    //in this case only users that have matched both can chat

                    if (user != null && allowedUsers.contains(user.uid)) {
                        adapter.add(UserItem(user))
                    }
                }

                //action for row selected
                adapter.setOnItemClickListener { item, view ->

                    val userItem = item as UserItem

                    val intent = Intent(view.context,ChatActivity::class.java)

                    intent.putExtra(USER_OBJ, userItem.userData)

                    startActivity(intent)
                    finish()
                }

                //show in the view
                recyclerView_Users.adapter = adapter
            }

            override fun onCancelled(p0: DatabaseError) {}
        })
    }

    //recycle view adapter
    class UserItem(val userData: UserData): Item<ViewHolder>() {
        override fun bind(viewHolder: ViewHolder, position: Int) {
            //put userData info inside the xml
            viewHolder.itemView.txtName.text = userData.name
            //using Picasso for picture
            Picasso.get().load(userData.profilePictureURL).into(viewHolder.itemView.imgProfile)
        }

        override fun getLayout(): Int {
            return R.layout.user_row_new_message
        }

    }

    fun goChatList(view :View){
        finish()
    }

    override fun onBackPressed() {
        finish()
        super.onBackPressed()
    }

}
