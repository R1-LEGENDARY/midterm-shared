<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function books()
    {
        return $this->belongsToMany(Book::class)
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }
}
