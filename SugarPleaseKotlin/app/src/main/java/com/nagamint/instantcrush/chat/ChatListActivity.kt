package com.nagamint.instantcrush.chat

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import com.nagamint.instantcrush.R
import com.nagamint.instantcrush.models.ChatMessage
import com.nagamint.instantcrush.models.UserData
import com.squareup.picasso.Picasso
import com.xwray.groupie.GroupAdapter
import com.xwray.groupie.Item
import com.xwray.groupie.ViewHolder
import kotlinx.android.synthetic.main.activity_chat_list.*
import kotlinx.android.synthetic.main.latest_message_row.view.*

class ChatListActivity : AppCompatActivity() {

    private val adapter = GroupAdapter<ViewHolder>()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_chat_list)

        listChat.adapter = adapter

        //set item listener in adapter
        adapter.setOnItemClickListener { item, view ->
            val intent = Intent(this, ChatActivity::class.java)

            val row = item as LatestMessageRow

            intent.putExtra(NewMessageActivity.USER_OBJ,row.chatFriendUserData)

            startActivity(intent)
        }

        listenForLatestMessages()
    }

    private val latestMessagesMap = HashMap<String,ChatMessage>()

    private fun listenForLatestMessages() {
        val idSender = FirebaseAuth.getInstance().uid
        val reference = FirebaseDatabase.getInstance().getReference("/last_message/$idSender")

        reference.addChildEventListener(object: ChildEventListener {

            override fun onChildAdded(p0: DataSnapshot, p1: String?) {
                val chatMessage = p0.getValue(ChatMessage::class.java) ?: return
                latestMessagesMap[p0.key!!] = chatMessage
                refreshRecyclerViewMessages()
            }

            override fun onChildChanged(p0: DataSnapshot, p1: String?) {
                val chatMessage = p0.getValue(ChatMessage::class.java) ?: return
                latestMessagesMap[p0.key!!] = chatMessage
                refreshRecyclerViewMessages()
            }

            override fun onCancelled(p0: DatabaseError) {}
            override fun onChildMoved(p0: DataSnapshot, p1: String?) {}
            override fun onChildRemoved(p0: DataSnapshot) {}
        })
    }

    private fun refreshRecyclerViewMessages() {
        adapter.clear()
        latestMessagesMap.values.forEach {
            adapter.add(LatestMessageRow(it))
        }

    }

    class LatestMessageRow(private val chatMessage: ChatMessage): Item<ViewHolder>() {
        var chatFriendUserData : UserData? = null

        override fun getLayout(): Int {
            return R.layout.latest_message_row
        }

        override fun bind(viewHolder: ViewHolder, position: Int) {
            //get info to display
            val chatUserId : String
            if (chatMessage.idSender == FirebaseAuth.getInstance().uid) {
                chatUserId = chatMessage.idReceiver
            } else {
                chatUserId = chatMessage.idSender
            }

            val reference = FirebaseDatabase.getInstance().getReference("/users/$chatUserId")
            reference.addListenerForSingleValueEvent(object : ValueEventListener{
                override fun onDataChange(p0: DataSnapshot) {
                    chatFriendUserData = p0.getValue(UserData::class.java)
                    viewHolder.itemView.txtName.text = chatFriendUserData?.name
                    viewHolder.itemView.txtMsj.text = chatMessage.text
                    val imgView = viewHolder.itemView.imgProfile
                    Picasso.get().load(chatFriendUserData?.profilePictureURL).into(imgView)
                }

                override fun onCancelled(p0: DatabaseError) {

                }
            })
        }

    }

    fun goToNewMessage(view: View) {
        val intent = Intent(this, NewMessageActivity::class.java)
        startActivity(intent)
    }

    fun goMain(view:View) {
        finish()
    }

    override fun onBackPressed() {
        finish()
        super.onBackPressed()
    }

}
