<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function category() {
        return $this->belongsTo(Category::class); 
    }

    public function publisher() {
        return $this->belongsTo(Publisher::class);
    }

    protected $fillable = [
        'image',
        'title',
        'category_id',
        'author',
        'publisher_id',
    ];
}
