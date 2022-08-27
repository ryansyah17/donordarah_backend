<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'id_pendonor',
        'donorke',
        'picture',
        'lokasi',
        'tanggal_donor'

    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'id_users');
    }
    public function pendonor()
    {
        return $this->hasOne(User::class, 'id', 'id_pendonor');
    }
}
