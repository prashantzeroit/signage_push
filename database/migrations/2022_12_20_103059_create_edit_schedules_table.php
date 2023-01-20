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
        Schema::create('edit_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('signage_id',11);
            $table->string('user_id',11);
            $table->string('playlist_id',11);
            $table->string('slidertime',11);
            $table->string('status',255)->default('Active');
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
        Schema::dropIfExists('edit_schedules');
    }
};
