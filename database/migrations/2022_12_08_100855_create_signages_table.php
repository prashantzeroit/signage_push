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
        Schema::create('signages', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('user_id',11);
            $table->string('device',11);         
            $table->string('playlist_id',11);         
            $table->string('pin',11);        
            $table->string('area',11);        
            $table->string('zip',11);        
            $table->string('expiry');         
            $table->string('last_pinged',11);          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signages');
    }
};
