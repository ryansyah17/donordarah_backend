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
        Schema::create('pendonors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->nullable();
            $table->string('name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->longText('alamat');
            $table->string('nohp');
            $table->enum('goldarah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->integer('beratbadan');
            $table->integer('tekanandarah');
            $table->integer('kadarhb');
            $table->date('tanggal_donor');
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
        Schema::dropIfExists('pendonors');
    }
};
