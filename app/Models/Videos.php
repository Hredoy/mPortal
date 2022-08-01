<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'videos';
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}
