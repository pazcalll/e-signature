<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignatureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signature_details', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("hash")->unique();
            $table->string("private_key")->unique();
            $table->string("public_key")->unique();
            $table->string("signature_key")->unique()->nullable();
            $table->text("note")->nullable();
            $table->string('signature')->nullable();
            $table->string('qrcode')->nullable();
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
        Schema::dropIfExists('SignatureDetails');
    }
}
