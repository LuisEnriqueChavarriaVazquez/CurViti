package com.nagamint.instantcrush.utilities
//https://github.com/konform-kt/konform
import android.content.Context
import android.util.Log
import android.widget.Toast
import com.nagamint.instantcrush.models.UserData
import io.konform.validation.Valid
import io.konform.validation.Validation
import io.konform.validation.jsonschema.maxLength
import io.konform.validation.jsonschema.minLength
import io.konform.validation.jsonschema.pattern

class Validations(private val appContext: Context) {

    //rules for validations
    private val validateUser = Validation<UserData>{
        UserData::name required {
            minLength(3) hint "Nombre demasiado corto"
            maxLength(80) hint "Nombre demasiado largo"
        }
        UserData::email required {
            pattern("^[A-Za-z](.*)([@]{1})(.{1,})(\\.)(.{1,})") hint "Email invalido"
        }
        UserData::description required {
            minLength(5) hint "Descripcion demasiado corta"
            maxLength(300) hint "Descripcion demasiado larga, debe ser de 300 caracteres maximo"
        }
        UserData::minMaxAge required {
            minLength(1) hint "uno o mas campos vacios"
        }
        UserData::interest required {
            minLength(1) hint "uno o mas campos vacios"
        }
        UserData::birthDay required {
            minLength(1) hint "uno o mas campos vacios"
        }
        UserData::sex required {
            minLength(1) hint "uno o mas campos vacios"
        }

    }

    fun validateInfo(userData:UserData):Boolean {

        val validationResult = validateUser(userData)

        //if validationResult is of type Valid
        if (validationResult is Valid){
            return true
        }

        Toast.makeText(appContext,"Campos inválidos", Toast.LENGTH_LONG).show()
        //Log.d("INFO",""+validationResult[UserData::name].isNullOrEmpty())
        return false
    }

}