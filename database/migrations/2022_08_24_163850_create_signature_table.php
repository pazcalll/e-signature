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
            $table->integer("signature_detail_id")->nullable();
            $table->foreign("signature_detail_id")->references('id')->on('signature_details')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("lecturer_id")->nullable();
            $table->foreign("lecturer_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("student_id")->nullable();
            $table->foreign("student_id")->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
