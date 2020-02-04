package com.nagamint.instantcrush.models

import android.util.Log
import com.google.firebase.database.*
import java.util.*
import kotlin.collections.ArrayList

class User {

    var data:UserData = UserData()
    var matchList = ArrayList<String>()

    constructor(){
        this.data = UserData()
        this.matchList = ArrayList()
        this.getUserMatchesFromDB(data.uid)
    }

    constructor(uid:String) {
        this.getUserDataFromDB(uid)
        this.getUserMatchesFromDB(uid)
    }

    constructor(userData:UserData) {
        this.data = userData
    }

    private fun getUserDataFromDB(uid: String){
        //get reference
        val reference = FirebaseDatabase.getInstance().getReference("/users/$uid")
        //start listener
        reference.addListenerForSingleValueEvent(object: ValueEventListener {

            override fun onDataChange(dataSnapshot: DataSnapshot) {
                val user = dataSnapshot.getValue(UserData::class.java)
                if (user != null){
                    data = user
                    Log.d("INFO","USER LOG: ${user.uid}")
                }
            }

            override fun onCancelled(FirebaseError: DatabaseError) {
                Log.d("INFO",FirebaseError.message)
            }
        })
    }

    private fun getUserMatchesFromDB(uid: String){
        //get reference
        val reference = FirebaseDatabase.getInstance().getReference("/matches/$uid")
        //start listener
        reference.addChildEventListener(object: ChildEventListener {
            override fun onChildAdded(dataSnapshot: DataSnapshot, prevChildKey: String?) {
                val userIdValue = dataSnapshot.key
                val senderValue = dataSnapshot.child("requestSender").value
                if (senderValue != null && userIdValue != null) {
                    matchList.add(userIdValue)
                }
            }

            override fun onCancelled(p0: DatabaseError) {}
            override fun onChildMoved(p0: DataSnapshot, p1: String?) {}
            override fun onChildChanged(p0: DataSnapshot, p1: String?) {}
            override fun onChildRemoved(p0: DataSnapshot) {}
        })
    }

    fun giveMatch(idReceiveMatchUser:String) {
        val idSendMatchUser = this.data.uid
        val ref1 = FirebaseDatabase.getInstance().getReference("/matches/$idSendMatchUser/$idReceiveMatchUser")
        ref1.child("requestSender").setValue("1")

        val ref2 = FirebaseDatabase.getInstance().getReference("/matches/$idReceiveMatchUser/$idSendMatchUser")
        ref2.child("requestReceiver").setValue("1")
    }



    //this function evaluate if a given user could be of interest to this one
    fun evaluateInterest(userData:UserData):Boolean {
        //if its the same user
        if (userData.uid == this.data.uid) {
            Log.d("INFO","NO ELIGIBLE USER: SELF")
            return false
        }
        //if this user give a match already
        if (matchList.contains(userData.uid)){
            Log.d("INFO","NO ELIGIBLE USER: ALREADY MATCHED")
            return false
        }
        //create a user object
        //see for gender
        if(!data.interest.contains(userData.sex)) {
            Log.d("INFO","NO ELIGIBLE USER: NO INTERESTED ABOUT SEX")
            return false
        }
        //see for age
        val age = User(userData).age().toInt()
        val min = data.minMaxAge.split(',')[0].toInt()
        val max = data.minMaxAge.split(',')[1].toInt()

        if (age !in (min + 1) until max) {
            Log.d("INFO","NO ELIGIBLE USER: " + min + " < " + age + " < " + max)
            return false
        }

        return true
    }

    fun age():String {

        var birthday = Calendar.getInstance()
        var today = Calendar.getInstance()

        val values = this.data.birthDay.split('/')
        val year = values[2].toInt()
        val month = values[1].toInt()
        val day = values[0].toInt()
        birthday.set(year,month,day)

        var age = today.get(Calendar.YEAR) - birthday.get(Calendar.YEAR)

        if (today.get(Calendar.DAY_OF_YEAR) < birthday.get(Calendar.DAY_OF_YEAR)) {
            age--
        }

        return age.toString()
    }
}