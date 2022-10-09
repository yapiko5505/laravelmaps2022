<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $filllable=['name', 'address', 'category_id'];

    public function category()
    {            
        return $this->belongsTo(Category::class);
    }
    

}
