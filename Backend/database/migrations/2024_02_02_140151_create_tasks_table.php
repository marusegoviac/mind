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
        Schema::create('tasks', function (Blueprint $table) {
            
            $table->id();
            $table->string('task_title');
            $table->string('task_objectif');
            $table->string('task_instructions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};