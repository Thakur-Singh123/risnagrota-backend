<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'admission_form';
    protected $fillable = ['student_name','dob','class_admitted','father_name','mother_name','phone_no','address','status'];
}
