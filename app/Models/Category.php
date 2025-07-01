<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'aa_categories'; // 👈 WAJIB agar tidak mencari `categories`

    protected $fillable = [
        'category_name',
        'description',
    ];

    public function traditions()
    {
        return $this->hasMany(Tradition::class, 'category_id');
    }
}
