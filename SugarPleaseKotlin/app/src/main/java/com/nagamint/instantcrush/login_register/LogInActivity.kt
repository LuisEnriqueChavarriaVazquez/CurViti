package com.nagamint.instantcrush.login_register

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import com.google.firebase.auth.FirebaseAuth
import com.nagamint.instantcrush.MainActivity
import com.nagamint.instantcrush.R
import com.nagamint.instantcrush.utilities.Validations
import kotlinx.android.synthetic.main.activity_log_in.*

class LogInActivity : AppCompatActivity() {

    var validate : Validations? = null
    var mAuth: FirebaseAuth? = null
    var mAuthListener : FirebaseAuth.AuthStateListener? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_log_in)

        validate = Validations(applicationContext)

        mAuth = FirebaseAuth.getInstance()

        mAuthListener = FirebaseAuth.AuthStateListener {  }

        //is a userData already log in?
        if (mAuth!!.currentUser != null) {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
            finish()
        }

    }

    fun logIn(view: View) {
        //validate if is empty or null
        val email = txtEmail.text.toString()
        val pass = txtPassword.text.toString()
        //if they are validated
        if (email.isNotEmpty() && pass.isNotEmpty()){
            mAuth!!.signInWithEmailAndPassword(email,pass)
                .addOnCompleteListener{ task ->
                    if (task.isSuccessful){
                        val intent = Intent(this, MainActivity::class.java)
                        startActivity(intent)
                        finish()
                    }
                }.addOnFailureListener{ exception ->
                    Toast.makeText(applicationContext,"Usuario o contraseña incorrectos",Toast.LENGTH_LONG).show()
                }
        } else {
            Toast.makeText(applicationContext,"Por favor llena todos los campos",Toast.LENGTH_LONG).show()
        }
    }

    fun goToSignIn(view: View) {
        val intent = Intent(this, RegisterActivity::class.java)
        startActivity(intent)
        finish()
    }

}
