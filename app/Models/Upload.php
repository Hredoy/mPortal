<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'uploads';
    // Relation

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
    public function regions()
    {
        return $this->belongsTo(Region::class,'region_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'upload_id', 'id');
    }
}
