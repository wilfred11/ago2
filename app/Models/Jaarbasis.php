<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jaarbasis extends Model
{
    use HasFactory;
    protected $table = 'Jaarbasis';
    public $timestamps = false;
    protected $fillable = [
        'naam',
        'trap',
        'loon',
    ];
}
