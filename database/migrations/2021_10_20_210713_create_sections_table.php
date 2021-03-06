<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_section_id');
            $table->foreign('main_section_id')->references('id')->on('main_sections')->onDelete('cascade');
            $table->string('section_name');
            $table->text('section_description');
            $table->string('section_arabic_name');
            $table->text('section_arabic_description');
            $table->string('section_image');
            $table->timestamps();

            $table->index('main_section_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
