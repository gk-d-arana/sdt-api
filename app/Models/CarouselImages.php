<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImages extends Model
{
    use HasFactory;
    protected $fillable = ["carousel_image"];
    
    public function main_section(){
        return $this->belongsTo(MainSection::class);
    }
}
