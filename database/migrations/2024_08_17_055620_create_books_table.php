
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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('BookName');
            $table->string('SubjectCode');
            $table->string('SubjectDesc');
            $table->boolean('hasBook');
            $table->string('code');
            $table->bigInteger('bookCollection_id')->unsigned();
            $table->foreign('bookCollection_id')->references('id')->on('book_collections');
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


