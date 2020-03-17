package com.nagamint.instantcrush.models

import android.os.Parcelable
import kotlinx.android.parcel.Parcelize

@Parcelize
data class UserData(
    val uid: String,
    val email: String,
    val name: String,
    val birthDay: String,
    val sex: String,
    val interest: String,
    val profilePictureURL: String,
    val minMaxAge: String,
    val description: String
) : Parcelable {
    constructor(): this("","","",
        "","","","",
        "","")
}