<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signatures', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("id_signature_detail")->nullable();
            $table->foreign("id_signature_detail")->references('id')->on('signature_details')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_lecturer")->nullable();
            $table->foreign("id_lecturer")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("id_student")->nullable();
            $table->foreign("id_student")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signature');
    }
}
