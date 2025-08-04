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
      Schema::create('job_openings', function (Blueprint $table) {
      $table->id();
      $table->string('job_type'); 
      $table->string('title');
      $table->string('location');
      $table->string('experience');
      $table->string('seats');
      $table->longText('description');
      $table->string('salary_range')->nullable();
      $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('job_openings');
    }
};
