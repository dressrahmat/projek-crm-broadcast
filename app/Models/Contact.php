<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'organisasi',
        'alamat',
    ];
}