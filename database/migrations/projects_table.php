<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projects', function (Blueprint $table) {
        $table->id();
        $table->string('category');
        $table->string('title');
        $table->string('location');
        $table->string('type');
        $table->string('duration');
        $table->string('completion_year'); 
        $table->longText('description');
        $table->string('is_active');
        $table->string('is_completed');
        $table->integer('display_order'); 
        $table->string('image_url')->nullable();
         $table->timestamp('created_at')->useCurrent();
    $table->timestamp('updated_at')->useCurrent();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
