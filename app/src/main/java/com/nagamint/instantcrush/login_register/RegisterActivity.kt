package com.nagamint.instantcrush.login_register

import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Toast
import com.google.firebase.auth.FirebaseAuth
import kotlinx.android.synthetic.main.activity_register.*
import android.Manifest
import android.app.Activity
import android.app.AlertDialog
import android.app.DatePickerDialog
import android.content.pm.PackageManager
import android.graphics.Bitmap
import android.os.Build
import android.support.annotation.RequiresApi
import android.provider.MediaStore
import android.net.Uri
import android.util.Log
import android.widget.DatePicker
import com.google.firebase.database.FirebaseDatabase
import com.google.firebase.storage.FirebaseStorage
import com.google.firebase.storage.StorageReference
import com.nagamint.instantcrush.MainActivity
import com.nagamint.instantcrush.R
import com.nagamint.instantcrush.models.UserData
import com.nagamint.instantcrush.utilities.Validations
import java.io.ByteArrayOutputStream
import java.lang.Exception
import java.util.*
import kotlin.collections.ArrayList

class RegisterActivity : AppCompatActivity() {

    var selected : Uri? = null
    var image: Bitmap? = null
    var mAuth: FirebaseAuth? = null
    var mStorageRef :StorageReference? = null
    var userData : UserData = UserData()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)

        mAuth = FirebaseAuth.getInstance()

        mStorageRef = FirebaseStorage.getInstance().reference

    }

    fun signIn(view: View) {
        //validations
        if(!validateUserInfo())
            return
        //if everything is correct
        mAuth!!.createUserWithEmailAndPassword(txtEmail.text.toString(),txtPassword.text.toString())
            .addOnCompleteListener{ task ->
                //we register a userData if doesn't exist
                if (task.isSuccessful){
                    //upload image and userData data
                    uploadImageStorage()
                    //after MainActivity is open
                    val intent = Intent(this, LogInActivity::class.java)
                    startActivity(intent)
                    finish()
                }
            }.addOnFailureListener{ exception ->
                //send error
                Toast.makeText(applicationContext,exception.localizedMessage.toString(),Toast.LENGTH_LONG)
            }
    }

    private fun validateUserInfo():Boolean {
        if (image==null) {
            Toast.makeText(this,"Debes seleccionar una imagen", Toast.LENGTH_LONG).show()
            return false
        }
        //get the user data from components
        val email = this.txtEmail.text.toString()
        val name = this.txtName.text.toString()
        val birthDay = this.txtDateOfBirth.text.toString()
        val sex = this.gender
        val interest = this.interest.toString()
        val minMaxAge = this.ageRange.selectedMinValue.toString() + "," + this.ageRange.selectedMaxValue.toString()
        val description = this.txtDescription.text.toString()
        userData = UserData("",email,name,birthDay,sex,interest,"",minMaxAge,description)
        //check
        return Validations(this).validateInfo(userData)
    }

    private fun uploadImageStorage() {
        //uploading userData profile picture
        val idImage = UUID.randomUUID().toString()
        val storageReference  = mStorageRef!!.child("/profilePictures/$idImage.jpg")

        var baos = ByteArrayOutputStream()
        image?.compress(Bitmap.CompressFormat.JPEG,30,baos)
        val byteImage = baos.toByteArray()

        val store = storageReference.putBytes(byteImage)
        store.addOnSuccessListener {
            Log.d("INFO","Imagen subida en url: ${it.metadata?.path}")
            storageReference.downloadUrl.addOnSuccessListener {
                Log.d("INFO","Imagen subida en url: $it")
                saveUserInfoDatabase(it.toString())
            }
        }.addOnFailureListener {
            Log.d("INFO","NO FALLO AL SUBIR LA IMAGEN + ${it.message}")
        }.addOnCanceledListener {
            Log.d("INFO","SE CANCELO LA SUBIDA DE LA IMAGEN")
        }
    }

    //info to be placed in db,  NO TRANSLATION, ONLY ENGLISH
    private var gender: String = ""
    private var interest = ArrayList<String>()

    private fun saveUserInfoDatabase(imageUrl:String) {
        val uid = FirebaseAuth.getInstance().uid.toString()
        val ref = FirebaseDatabase.getInstance().getReference("/users/$uid")

        //register the userData data
        val email = this.txtEmail.text.toString()
        val name = this.txtName.text.toString()
        val birthDay = this.txtDateOfBirth.text.toString()
        val sex = this.gender
        val interest = this.interest.toString()
        val minMaxAge = this.ageRange.selectedMinValue.toString() + "," + this.ageRange.selectedMaxValue.toString()
        val description = this.txtDescription.text.toString()

        val newUser = UserData(uid, email, name, birthDay, sex, interest, imageUrl, minMaxAge, description)
        Log.d("INFO","Guardando... \n $newUser")

        ref.setValue(newUser).addOnSuccessListener {
            Log.d("INFO","USUARIO GUARDADO")
        }.addOnFailureListener {
            Log.d("INFO","FALLO AL GUARDAR")
        }.addOnCanceledListener {
            Log.d("INFO","SE CANCELO GUARDADO")
        }

    }
    //select date
    fun pickDateOfBirth(view: View) {
        //get date of birth, initial date will be 15/6/2000
        val datePicker = DatePickerDialog(this, DatePickerDialog.OnDateSetListener { view:DatePicker, mYear:Int, mMonth:Int, mDay:Int ->
            txtDateOfBirth.setText("$mDay/$mMonth/$mYear")
        }, 2000,6,15)
        datePicker.show()
    }

    //select sex
    fun pickSex(view: View) {
        lateinit var dialog:AlertDialog

        // Initialize an array to show the userData
        val array = arrayOf("Hombre","Mujer")
        // Initialize an array to store in db
        var arrayNT = arrayOf("Man","Woman")

        val builder = AlertDialog.Builder(this)

        // Set a title for alert dialog
        builder.setTitle("Selecciona tu sexo:")

        // Set the single choice items for alert dialog with initial selection
        builder.setSingleChoiceItems(array,-1) { _, which->
            //show in form
            txtSex.text = array[which]
            //store value
            this.gender = arrayNT[which]
            dialog.dismiss()
        }
        dialog = builder.create()
        dialog.show()
    }

    //select interest
    fun pickInterest(view: View) {
        lateinit var dialog:AlertDialog

        // Initialize an array to show to user
        val array = arrayOf("Hombres","Mujeres")
        // Initialize an array to store in db
        var arrayNT = arrayOf("Man","Woman")

        // Initialize a boolean array of checked items
        val arrayChecked = booleanArrayOf(false,false)

        val builder = AlertDialog.Builder(this)

        // Set a title for alert dialog
        builder.setTitle("Choose favorite colors.")

        // Define multiple choice items for alert dialog
        builder.setMultiChoiceItems(array, arrayChecked) {dialog,which,isChecked->
            // Update the clicked item checked status
            arrayChecked[which] = isChecked
        }

        // Set the positive/yes button click listener
        builder.setPositiveButton("OK") { _, _ ->
            // Do something when click positive button
            val pickedInterests = ArrayList<String>()
            txtInterest.text = ""
            for (i in 0 until array.size) {
                val checked = arrayChecked[i]
                if (checked) {
                    pickedInterests.add(arrayNT[i])
                    txtInterest.text = "${txtInterest.text} ${array[i]}"
                }
            }
            this.interest = pickedInterests
        }

        dialog = builder.create()
        dialog.show()
    }

    //select image functions
    @RequiresApi(Build.VERSION_CODES.M)
    fun selectImage(view:View) {
        //check permissions
        if (checkSelfPermission(Manifest.permission.READ_EXTERNAL_STORAGE) != PackageManager.PERMISSION_GRANTED) {
            requestPermissions(arrayOf(Manifest.permission.READ_EXTERNAL_STORAGE),1)
        } else {
            val intent = Intent(Intent.ACTION_PICK,MediaStore.Images.Media.EXTERNAL_CONTENT_URI)
            startActivityForResult(intent,2)
        }
    }

    override fun onRequestPermissionsResult(requestCode: Int, permissions: Array<out String>, grantResults: IntArray) {
        if (requestCode == 1) {
            if (grantResults.isNotEmpty() && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                val intent = Intent(Intent.ACTION_PICK,MediaStore.Images.Media.EXTERNAL_CONTENT_URI)
                startActivityForResult(intent,2)
            }
        }
        super.onRequestPermissionsResult(requestCode, permissions, grantResults)
    }

    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        if (requestCode == 2 && resultCode == Activity.RESULT_OK && data != null) {
            selected = data.data
            try {
                var bitmap = MediaStore.Images.Media.getBitmap(this.contentResolver,selected)
                imgProfile.setImageBitmap(bitmap)
                image = bitmap
            } catch (e:Exception) {
                e.printStackTrace()
            }
        }
        super.onActivityResult(requestCode, resultCode, data)
    }

    fun goToLogIn() {
        val intent = Intent(this, LogInActivity::class.java)
        startActivity(intent)
        finish()
    }

    override fun onBackPressed() {
        goToLogIn()
        super.onBackPressed()
    }

}
