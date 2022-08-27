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
        Schema::create('stokdarahs', function (Blueprint $table) {
            $table->id();
            $table->string('goldarah_a');
            $table->string('goldarah_b');
            $table->string('goldarah_ab');
            $table->string('goldarah_o');
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
        Schema::dropIfExists('stokdarahs');
    }
};
