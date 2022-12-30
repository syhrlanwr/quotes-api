<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quote';

    protected $fillable = [
        'quote',
        'author',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
