<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'published_year', 'section_id', 'author_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function borrowers()
    {
        return $this->belongsToMany(Borrower::class)
            ->withPivot('borrowed_at', 'returned_at')
            ->withTimestamps();
    }
}
