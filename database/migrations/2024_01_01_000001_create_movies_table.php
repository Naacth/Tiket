<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('genre');
            $table->integer('duration'); // dalam menit
            $table->string('director');
            $table->string('cast');
            $table->string('poster');
            $table->string('trailer_url')->nullable();
            $table->enum('rating', ['G', 'PG', 'PG-13', 'R', 'NC-17']);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
}; 