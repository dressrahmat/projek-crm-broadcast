<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LabelKontak extends Model
{
    use HasFactory;
    protected $table = 'label_kontak';
    protected $fillable = ['nama_label'];

    /**
     * Get all of the kontak for the LabelKontak
     *
     * @return HasMany
     */
    public function kontak(): HasMany
    {
        return $this->hasMany(Contact::class, 'id_label', 'id');
    }
}