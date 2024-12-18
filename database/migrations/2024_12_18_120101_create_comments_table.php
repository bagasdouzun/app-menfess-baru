<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');  // Isi komentar
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Relasi ke tabel posts
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // Reply
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
