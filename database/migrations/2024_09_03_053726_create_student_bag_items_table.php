<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_bag_items', function (Blueprint $table) {
            $table->id();
            $table->string('Department'); 
            $table->string('Course'); 
            $table->string('Gender'); 
            $table->string('Type');
            $table->string('Body');
            $table->string('Size');
            $table->string('Status');
            $table->string('code')->nullable();
            $table->string('claiming_schedule')->nullable(); 
            $table->string('shift')->nullable();
            $table->integer('reservationNumber')->nullable();
            $table->unsignedBigInteger('stubag_id');
            $table->foreign('stubag_id')->references('id')->on('student_bags')->onDelete('cascade');
            $table->timestamp('dateReceived')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_bag_items', function (Blueprint $table) {
            $table->dropForeign(['stubag_id']);
        });
        Schema::dropIfExists('student_bag_items');
    }
};