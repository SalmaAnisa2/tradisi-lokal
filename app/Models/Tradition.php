<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tradition extends Model
{
    protected $table = 'aa_traditions'; // 👈 WAJIB! sesuai nama tabel dari migration

    protected $fillable = [
        'title', 'slug', 'synopsis', 'category_id', 'cover_image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
