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
        Schema::create('item_books', function (Blueprint $table) {
            $table->id();
            $table->string('Department'); 
            $table->string('BookName');
            $table->string('SubjectCode');
            $table->string('SubjectDesc');
            $table->string('Status');
            $table->integer('Stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_books');
    }
};
