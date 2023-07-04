<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grouping extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_grouping');
    }
}
