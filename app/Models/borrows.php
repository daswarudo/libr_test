<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrows extends Model
{
    use HasFactory;
    protected $table = 'borrows';
    protected $primaryKey = 'b_id';
    protected $fillable = ['b_stat', 's_id', 'id'];
    
    public function student()
    {
        return $this->belongsTo(student::class, 's_id');
    }

    /**
     * Get the book that was borrowed.
     */
    public function book()
    {
        return $this->belongsTo(book::class, 'id');
    }
}








