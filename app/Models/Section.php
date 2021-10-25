<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['section_name', "section_description", "section_image", "main_section_id"];

    public function main_section(){
        return $this->belongsTo(MainSection::class);
    }

}
