<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sience extends Model
{
    use HasFactory;

    public function teacher():BelongsToMany
    {
        return $this->belongsToMany(Teacher::class);
    }
    public function salle():HasMany
    {
        return $this->hasMany(Salle::class);
    }

}
