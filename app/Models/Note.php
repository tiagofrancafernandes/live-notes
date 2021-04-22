<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $hidden = [
        'simple_pass',
        'encrypted_note',
        'encrypt_pass',
    ];

    protected $casts        = [
        'public'    => 'boolean',
        'encrypted' => 'boolean',
        'tags'      => 'array',
    ];

    protected $fillable     = [
        'title',
        'slug',
        'encrypted_note',
        'simple_note',
        'public',
        'simple_pass',
        'encrypted',
        'encrypt_pass',
        'tags',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
