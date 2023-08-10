<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $primaryKey = 'id';
    protected $fillable = ['bk_title', 'bk_pub', 'bk_auth', 'bk_yr', 'bk_vol','bk_qty','bk_cover'];
}
