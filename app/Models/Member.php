<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function borrowedBooks()
    {
        return $this->hasMany(Book::class, 'member_id');
    }
}
