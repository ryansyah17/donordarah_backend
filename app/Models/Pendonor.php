<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendonor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_users',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'nohp',
        'goldarah',
        'beratbadan',
        'tekanandarah',
        'kadarhb',
        'tanggal_donor',
    ];



    public function users()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
    public function history()
    {
        return $this->belongsTo(History::class, 'id_pendonor', 'id');
    }
}
