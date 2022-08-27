<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stokdarah extends Model
{
    use HasFactory;
    protected $fillable = [
        'goldarah_a',
        'goldarah_b',
        'goldarah_ab',
        'goldarah_o',

    ];
}
