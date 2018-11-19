<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'FirstName_Std', 'LastName_Std', 'NickName_Std', 'Gender_Std', 'Age_Std', 'Birth_Std', 'School_Std',
        'Class_Std', 'Major_Std', 'Email_Std', 'Tel_Std', 'Line_Std', 'Address_Std', 'FirstName_Par', 'LastName_Par',
        'Email_Par', 'Tel_Par', 'Line_Par', 'course_1', 'price1', 'course_2', 'price2', 'course_3', 'price3',
        'std', 'c_1', 'c_2', 'c_3', 'ThaiMoney', 'Pay', 'ID_Card', 'ID_Slip', 'Credit_Bank', 'Amount', 'Bank', 'Note',
        'Status', 'Term_ID', 'User_id', 'province',
    ];
}
