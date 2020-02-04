package com.nagamint.instantcrush.utilities

import android.app.Dialog
import android.content.Context
import android.content.Intent
import android.util.Log
import android.widget.Button
import com.google.firebase.auth.FirebaseAuth
import com.google.firebase.database.*
import com.nagamint.instantcrush.R
import com.nagamint.instantcrush.login_register.LogInActivity
import com.nagamint.instantcrush.models.UserData

class FirebaseServices() {

    //validates if session of current user is valid
    fun validSession(appContext: Context):Boolean {
        val uid = FirebaseAuth.getInstance().uid
        if (uid == null) {
            val intent = Intent(appContext, LogInActivity::class.java)
            appContext.startActivity(intent)
            return false
        }
        return true
    }

}

