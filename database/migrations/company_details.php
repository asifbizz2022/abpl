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
       Schema::create('company_details', function (Blueprint $table) {
           $table->id();
           $table->text('about_text');
           $table->text('mission')->nullable();
           $table->text('vision')->nullable();
           $table->text('history')->nullable();
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
        Schema::dropIfExists('company_details');
    }
};
