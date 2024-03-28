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
        Schema::create('sauces', function (Blueprint $table) {
            $table->id()
                  ->index();
            $table->integer('userId');           /* identifiant de l'utilisateur qui a créé la sauce */         
            $table->string('name');             /* nom de la sauce */
            $table->string('manufacturer');     /* fabriquant de la sauce */
            $table->string('description');      /* description de la sauce */
            $table->string('mainPepper');       /* le principal ingrédient épicé de la sauce */
            $table->string('imageURL');         /* URL de l'image de la sauce téléchargée par l'utilisateur */
            $table->integer('heat');             /* nombre entre 1 et 10 décrivant la sauce */
            $table->integer('likes');            /* nombre d'utilisateurs qui aiment la sauce */
            $table->integer('dislikes');         /* nombre d'utilisateurs qui n'aiment pas la sauce */
            $table->json('usersLiked');         /* tableau des identifiants des utilisateurs qui ont aimé la sauce */
            $table->json('usersDisliked');      /* tableau des identifiants des utilisateurs qui n'ont pas aimé la sauce */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauces');
    }
};
