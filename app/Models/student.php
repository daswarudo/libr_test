<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 's_id';
    protected $fillable = ['s_name', 's_email', 's_course', 's_sy'];
    
}
