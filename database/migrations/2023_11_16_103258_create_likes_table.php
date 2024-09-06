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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('likable_type');
            $table->unsignedBigInteger('likable_id');
            $table->timestamps();

            $table->foreign('likable_id')->references('id')->on('tracks')->onDelete('cascade')->index('likes_tracks_index');
            $table->foreign('likable_id')->references('id')->on('albums')->onDelete('cascade')->index('likes_albums_index');
            $table->foreign('likable_id')->references('id')->on('playlists')->onDelete('cascade')->index('likes_playlists_index');
            $table->foreign('likable_id')->references('id')->on('artists')->onDelete('cascade')->index('likes_artists_index');

            $table->unique(['user_id', 'likable_type', 'likable_id']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
