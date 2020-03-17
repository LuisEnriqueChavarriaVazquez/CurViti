package com.nagamint.instantcrush

import android.app.AlertDialog
import android.app.DatePickerDialog
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.DatePicker
import com.nagamint.instantcrush.models.User
import com.nagamint.instantcrush.models.UserData
import com.nagamint.instantcrush.utilities.FirebaseServices
import com.squareup.picasso.Picasso
import kotlinx.android.synthetic.main.activity_user_modify_info.*

class UserModifyInfo : AppCompatActivity() {

    private var fbs: FirebaseServices = FirebaseServices()
    private var user: User = User()

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_user_modify_info)
        //check session
        if (!fbs.validSession(this))
            finish()
        //get current userData
        user = User()
        user.data = intent.getParcelableExtra("UserData")
        //show actual data
        displayInfo(user.data)
    }

    private fun displayInfo(usrData:UserData){
        txtName.setText(usrData.name)
        txtDateOfBirth.setText(usrData.birthDay)
        txtDescription.setText(usrData.description)
        Picasso.get().load(usrData.profilePictureURL).into(imgProfile)
    }

    fun updateData(view: View){

    }

    //info to be placed in db,  NO TRANSLATION, ONLY ENGLISH
    private var gender: String = ""
    private var interest = ArrayList<String>()

    //select date
    fun pickDateOfBirth(view: View) {
        //get date of birth, initial date will be 15/6/2000
        val datePicker = DatePickerDialog(this, DatePickerDialog.OnDateSetListener { view: DatePicker, mYear:Int, mMonth:Int, mDay:Int ->
            txtDateOfBirth.setText("$mDay/$mMonth/$mYear")
        }, 2000,6,15)
        datePicker.show()
    }

    //select sex
    fun pickSex(view: View) {
        lateinit var dialog: AlertDialog

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
        lateinit var dialog: AlertDialog

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
}
