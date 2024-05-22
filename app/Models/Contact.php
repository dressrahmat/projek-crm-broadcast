<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    protected $fillable = [
        'id_label',
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'organisasi',
        'alamat',
    ];

    /**
     * Get the labelkontak that owns the Contact
     *
     * @return BelongsTo
     */
    public function labelkontak(): BelongsTo
    {
        return $this->belongsTo(labelkontak::class, 'id_label', 'id');
    }
}