<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelKontak extends Model
{
    use HasFactory;
    protected $table = 'label_kontak';
    protected $fillable = ['nama_label'];
}