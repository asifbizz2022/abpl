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
      Schema::create('job_applications', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('email');
        $table->string('contact');
        $table->string('experience');
        $table->string('qualifications');
        $table->string('resume');
        $table->string('location');
        $table->text('cover_letter'); 
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
        Schema::dropIfExists('job_application');
    }
};
