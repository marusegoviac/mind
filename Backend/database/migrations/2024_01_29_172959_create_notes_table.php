<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Migration pour créer la table des notes dans la BDD.
     */
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('user_id')->default('1');
            $table->string('note_title');
            $table->string('note_content');
            $table->timestamps();

            $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};