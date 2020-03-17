package com.nagamint.instantcrush.chat

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.ChildEventListener
import com.google.firebase.database.DataSnapshot
import com.google.firebase.database.DatabaseError
import com.google.firebase.database.FirebaseDatabase
import com.nagamint.instantcrush.R
import com.nagamint.instantcrush.UserProfileViewActivity
import com.nagamint.instantcrush.models.ChatMessage
import com.xwray.groupie.GroupAdapter
import com.xwray.groupie.Item
import com.xwray.groupie.ViewHolder
import com.nagamint.instantcrush.models.UserData
import com.nagamint.instantcrush.models.User
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_chat.*
import kotlinx.android.synthetic.main.chat_from_row.view.*
import kotlinx.android.synthetic.main.chat_to_row.view.*

class ChatActivity : AppCompatActivity() {

    //create the recycle view adapter
    private val adapter = GroupAdapter<ViewHolder>()
    private var user = User()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_chat)

        this.user.data = intent.getParcelableExtra(NewMessageActivity.USER_OBJ)

        txtFriendName.text = user.data.name
        Picasso.get().load(user.data.profilePictureURL).into(imgFriendProfile)

        //set the recycle view adapter
        listMessages.adapter = adapter

        listenMessages()

    }

    //store messages in database
    fun sendMessage(view:View){

        val txt = txtMessageToSend.text.toString()
        val idSender = FirebaseAuth.getInstance().uid.toString()
        val idReceiver = intent.getParcelableExtra<UserData>(NewMessageActivity.USER_OBJ).uid
        val timeStamp = System.currentTimeMillis()

        //push function automatically generates a new child with random id
        val reference = FirebaseDatabase.getInstance().getReference("/messages/$idSender/$idReceiver").push()

        val toReference = FirebaseDatabase.getInstance().getReference("/messages/$idReceiver/$idSender").push()

        val rf = reference.key.toString()

        //validations should be here
        if (txt == "")
            return

        val chatMessage = ChatMessage(rf, txt, idSender, idReceiver, timeStamp)

        reference.setValue(chatMessage).addOnSuccessListener {
            txtMessageToSend.text.clear()
            listMessages.scrollToPosition(adapter.itemCount - 1)
        }
        toReference.setValue(chatMessage)

        //store last message to show in chat list activity
        val lastMsjReference = FirebaseDatabase.getInstance().getReference("/last_message/$idSender/$idReceiver")
        lastMsjReference.setValue(chatMessage)

        val lastToMsjReference = FirebaseDatabase.getInstance().getReference("last_message/$idReceiver/$idSender")
        lastToMsjReference.setValue(chatMessage)

    }

    //listen for new and older messages in database
    private fun listenMessages() {

        val idSender = FirebaseAuth.getInstance().uid.toString()
        val idReceiver = intent.getParcelableExtra<UserData>(NewMessageActivity.USER_OBJ).uid

        val reference = FirebaseDatabase.getInstance().getReference("/messages/$idSender/$idReceiver")

        reference.addChildEventListener(object: ChildEventListener{

            override fun onChildAdded(p0: DataSnapshot, p1: String?) {
                val chatMessage = p0.getValue(ChatMessage::class.java)
                if (chatMessage != null) {
                    if (chatMessage.idSender == FirebaseAuth.getInstance().uid) {
                        adapter.add(ChatToItem(chatMessage.text))
                    } else {
                        adapter.add(ChatFromItem(chatMessage.text))
                    }
                }
                listMessages.scrollToPosition(adapter.itemCount - 1)
            }

            override fun onCancelled(p0: DatabaseError) {}
            override fun onChildMoved(p0: DataSnapshot, p1: String?) {}
            override fun onChildChanged(p0: DataSnapshot, p1: String?) {}
            override fun onChildRemoved(p0: DataSnapshot) {}

        })

    }

    //chat list items
    class ChatFromItem(val text: String): Item<ViewHolder>() {
        override fun bind(viewHolder: ViewHolder, position: Int) {
            //from chat_from_row.xml
            viewHolder.itemView.txtMessageToSend.text = text
        }

        override fun getLayout(): Int {
            return R.layout.chat_from_row
        }

    }

    class ChatToItem(val text: String): Item<ViewHolder>() {
        override fun bind(viewHolder: ViewHolder, position: Int) {
            //from chat_to_row.xml
            viewHolder.itemView.txtMessage_to.text = text
        }

        override fun getLayout(): Int {
            return R.layout.chat_to_row
        }

    }

    fun goProfileView(view: View){
        val intent = Intent(this,UserProfileViewActivity::class.java)
        intent.putExtra("UserData",this.user.data)
        startActivity(intent)
    }

    fun goChatList(view: View) {
        finish()
    }

    override fun onBackPressed() {
        finish()
        super.onBackPressed()
    }

}
