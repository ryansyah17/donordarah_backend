<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'goldarah',
        'jenis_kelamin',
        'roles',
        'profil_pictures',
        'remember_token',
    ];

    public $table = "users";
}
