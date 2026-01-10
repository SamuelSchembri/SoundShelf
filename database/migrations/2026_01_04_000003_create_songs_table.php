<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->integer('track_number')->nullable();
            $table->integer('duration')->nullable(); // seconds
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
