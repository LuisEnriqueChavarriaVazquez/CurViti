package com.nagamint.instantcrush.models

class ChatMessage (
    val id:String,
    val text:String,
    val idSender:String,
    val idReceiver: String,
    val timeStamp:Long) {
    constructor() : this("","","","",-1)
}