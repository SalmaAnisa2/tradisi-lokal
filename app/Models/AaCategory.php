<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AaCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function traditions()
    {
        return $this->hasMany(AaTradition::class);
    }
}
