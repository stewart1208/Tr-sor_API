<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['user_id', 'nivaux'];

    protected $guarded = [];
    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
