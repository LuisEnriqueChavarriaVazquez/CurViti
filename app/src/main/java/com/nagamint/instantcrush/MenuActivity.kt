package com.nagamint.instantcrush

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.view.View
import com.google.firebase.auth.FirebaseAuth
import com.nagamint.instantcrush.models.User
import com.nagamint.instantcrush.utilities.FirebaseServices
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_menu.*

class MenuActivity : AppCompatActivity() {

    private var fbs: FirebaseServices = FirebaseServices()
    private var user: User = User()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_menu)
        //check session
        if (!fbs.validSession(this))
            finish()
        //get current userData
        user = User()
        user.data = intent.getParcelableExtra("UserData")
        //show info user
        chargeUserInfo()
    }

    private fun chargeUserInfo() {
        Picasso.get().load(user.data.profilePictureURL).into(imgProfile)
        this.txtName.text = user.data.name
        this.txtDescription.text = user.data.description
        this.txtEmail.text = user.data.email
    }

    fun goToModifyUser(view: View) {
        val intent = Intent(this,UserModifyInfo::class.java)
        intent.putExtra("UserData",user.data)
        startActivity(intent)
    }

    fun signOut(view: View) {
        FirebaseAuth.getInstance().signOut()
        finish()
    }

    fun goMain(view: View){
        finish()
    }

    override fun onBackPressed() {
        finish()
        super.onBackPressed()
    }

}
