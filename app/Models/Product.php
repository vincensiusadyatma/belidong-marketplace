<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    Public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function creator(){
        return $this->belongsTo(User::class);
    }
    
}
