<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSection extends Model
{
    use HasFactory;
    protected $fillable = ['main_section_name', "main_section_description", "main_section_image"];
    public function sections(){
        return $this->hasMany(Section::class);
    }

}
