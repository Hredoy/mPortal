<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'comments';
    public function uploads()
    {
        return $this->belongsTo(Upload::class,'upload_id', 'id');
    }
    
}
