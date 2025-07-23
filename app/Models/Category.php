<?php

namespace App\Models;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function books() {
        return $this->hasMany(Books::class);
    }

    protected $fillable = [
        'category_name'
    ];
}
