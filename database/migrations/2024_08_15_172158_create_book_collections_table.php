
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
        Schema::create('book_collections', function (Blueprint $table) {
            $table->id();
            $table->string('Department'); 
            $table->string('BookName');
            $table->string('SubjectCode');
            $table->string('SubjectDesc');
            $table->string('code')->nullable();
            $table->string('Status');
            $table->integer('reservationNumber')->nullable();
            $table->string('claiming_schedule')->nullable(); 
            $table->string('shift')->nullable();
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
        Schema::dropIfExists('book_collections');
    }
};
