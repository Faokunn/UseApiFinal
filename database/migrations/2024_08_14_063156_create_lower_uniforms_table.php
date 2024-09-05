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
        Schema::create('lower_uniforms', function (Blueprint $table) {
            $table->id();
            $table->string('LowerSize');
            $table->string('Status');
            $table->string('code');
            $table->unsignedBigInteger('stubag_id');
            $table->foreign('stubag_id')->references('id')->on('student_bags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lower_uniforms');
    }
};
