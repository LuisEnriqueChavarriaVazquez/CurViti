package com.nagamint.instantcrush

import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import com.nagamint.instantcrush.models.User
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_user_profile_view.*

class UserProfileViewActivity : AppCompatActivity() {

    private var user = User()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_user_profile_view)

        //getting user info
        this.user.data = intent.getParcelableExtra("UserData")
        showInfo()

    }

    private fun showInfo() {
        Picasso.get().load(user.data.profilePictureURL).into(imgProfile)
        txtName.text = user.data.name
        txtBirth.text = "${user.data.birthDay} (${user.age()})"
        txtDescription.text = user.data.description
    }

    fun goBack(view:View) {
        finish()
    }

    override fun onBackPressed() {
        finish()
        super.onBackPressed()
    }
}
