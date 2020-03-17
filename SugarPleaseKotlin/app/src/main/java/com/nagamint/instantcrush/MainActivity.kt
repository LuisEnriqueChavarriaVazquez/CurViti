package com.nagamint.instantcrush

import android.app.Dialog
import android.content.Context
import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Button
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import com.nagamint.instantcrush.chat.ChatListActivity
import com.nagamint.instantcrush.models.UserData
import com.nagamint.instantcrush.models.User
import com.nagamint.instantcrush.utilities.FirebaseServices
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_main.*
import java.lang.Exception


class MainActivity : AppCompatActivity() {

    private var fbs:FirebaseServices = FirebaseServices()
    private var user:User = User()

    private var usersToShow = ArrayList<UserData>()
    private var currentUserIndex = 0

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        //check session
        if (!fbs.validSession(this))
            finish()
        //get current userData
        user = User(FirebaseAuth.getInstance().uid.toString())
        //while running the app check for new matches
        startListenerForNewMatches(FirebaseAuth.getInstance().uid.toString())
        /*
        to do:
        -show new matches when the userData re-open the app
        -seeForNewMatchesWhileDisconnect
        -get users to show*/
        getListOfUsers()
        currentUserIndex = 0
    }

    //store matches done by user
    fun performYes (view: View) {
        //set match in both users
        user.giveMatch(usersToShow[currentUserIndex-1].uid)
        Log.d("INFO","GIVE MATCH TO ${usersToShow[currentUserIndex-1].name}")
        //show next userData in list
        showNextUser()
    }

    fun performNo (view: View) {
        showNextUser()
    }

    private fun showNextUser() {
        if (usersToShow.isNotEmpty()) {
            if (currentUserIndex > usersToShow.size - 1) {
                //re-create array list again
                Log.d("INFO","END OF LIST, RECHARGING...")
                currentUserIndex = 0
                showNextUser()
            } else {
                val currentUser = usersToShow[currentUserIndex]

                if (user.evaluateInterest(currentUser)) {
                    Log.d("INFO","READING USER[${currentUserIndex+1}/${usersToShow.size}]=\"${currentUser.name}\"")
                    showUser(currentUser)
                    currentUserIndex++
                } else {
                    //no eligible user
                    currentUserIndex++
                    showNextUser()
                }
            }
        }
    }

    private fun showUser(currentUserData: UserData) {
        lblCurrentUserName.text = "${currentUserData.name}, ${currentUserData.birthDay}"
        Picasso.get().load(currentUserData.profilePictureURL).into(imgCurrentUser)
        lblCurrentUserPresentation.text = "${currentUserData.description}"
    }

    fun goToChat(view:View) {
        val intent = Intent(this, ChatListActivity::class.java)
        startActivity(intent)
    }

    fun goToMenu(view: View) {
        val intent = Intent(this,MenuActivity::class.java)
        intent.putExtra("UserData",user.data)
        startActivity(intent)
    }

    override fun onResume() {
        if (!fbs.validSession(this))
            finish()
        super.onResume()
    }

    private fun getListOfUsers() {
        //Array list to store users
        this.usersToShow.clear()
        //get reference
        val reference = FirebaseDatabase.getInstance().getReference("/users/")
        //start listener
        var listener = reference.addChildEventListener( object: ChildEventListener {

            override fun onChildAdded(dataSnapshot: DataSnapshot, prevChildKey: String?) {
                try {
                    val usr = dataSnapshot.getValue(UserData::class.java)
                    if (usr != null) {
                        usersToShow.add(usr)
                        Log.d("INFO","ADDED: " + usr.uid)
                    }
                } catch (e:Exception) {
                    Log.d("INFO","CAN'T ADD USER")
                }
            }

            override fun onCancelled(p0: DatabaseError) {}
            override fun onChildMoved(p0: DataSnapshot, p1: String?) {}
            override fun onChildChanged(p0: DataSnapshot, p1: String?) {}
            override fun onChildRemoved(p0: DataSnapshot) {}
        })
    }
    //this should be in FB Services but it doesnt work here
    //send a notification if the current userData gets a match, if a new notification appear in his/her gb node
    private fun startListenerForNewMatches(idCurrentUser:String) {

        val reference = FirebaseDatabase.getInstance().getReference("/matches/$idCurrentUser")

        reference.addChildEventListener(object : ChildEventListener{
            override fun onChildChanged(p0: DataSnapshot, p1: String?) {
                val r1 = p0.child("requestSender").value
                val r2 = p0.child("requestReceiver").value

                if (r1 != null && r2 != null) {
                    //its a match!
                    showMatchNotification()
                }

            }

            override fun onChildAdded(p0: DataSnapshot, p1: String?) {}
            override fun onChildRemoved(p0: DataSnapshot) {}
            override fun onCancelled(p0: DatabaseError) {}
            override fun onChildMoved(p0: DataSnapshot, p1: String?) {}
        })
    }

    private fun showMatchNotification() {
        var MatchDialog = Dialog(this)
        MatchDialog.setContentView(R.layout.match_notification)
        MatchDialog.setTitle("Its a match")

        var btnSendMsj = MatchDialog.findViewById<Button>(R.id.btnSendMsj)
        var btnKeepLok = MatchDialog.findViewById<Button>(R.id.btnKeepLok)

        btnKeepLok.setOnClickListener {
            MatchDialog.dismiss()
        }

        MatchDialog.show()
    }

}
