<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'year',
        'member_id',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'books_categories', 'book_id', 'category_id');
    }
}
