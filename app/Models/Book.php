<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;



    public function group()
    {
        return $this->belongsToMany(Grouping::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class , 'borrow');
    }
}
