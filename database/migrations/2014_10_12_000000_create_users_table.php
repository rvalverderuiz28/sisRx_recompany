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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('direccion')->nullable();
            $table->string('dni')->unique();
            $table->string('celular')->unique();
            $table->string('sexo')->nullable();
            $table->string('rol')->nullable();
            $table->unsignedBigInteger('rol_id');
            $table->date('fecha_contratacion')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('estado');

            $table->timestamps();

            $table->foreign(['rol_id'])->references(['id'])->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
