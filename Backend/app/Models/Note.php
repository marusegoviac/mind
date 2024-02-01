<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'note_title',
        'note_content',
    ];
}
