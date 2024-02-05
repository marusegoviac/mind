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
            $table->string('task_instructions', 1000);
            $table->timestamps();
        });

        DB::table('tasks')->insert([
            ['task_title' => "Échappée Artistique", 'task_objectif' => "Libérer ta créativité et t'exprimer.", 'task_instructions' => "Rassemble tes trucs d'art (papier, couleurs, pinceaux, etc.). Trouve un coin tranquille et prends 30 minutes pour créer sans te juger. Dessine, peins, gribouille. Réfléchis sur ta création, note les émotions ou pensées qui te viennent. Prends note de ce que tu as pensé et ressenti pendant le process."],
            ['task_title' => "Journal Intime", 'task_objectif' => "Réguler tes émotions et te connaître mieux.", 'task_instructions' => "Accorde-toi 20 minutes de temps calme. Écris dans les notes ou dans un journal à propos de ta journée, de tes émotions, de ce qui te trotte dans la tête. Identifie les trucs qui t'ont secoué. Pense à des solutions ou des astuces pour t'aider."],
            ['task_title' => "Dodo sans Écrans", 'task_objectif' => "Te détendre et stresser moins.", 'task_instructions' => "Une heure avant d'aller au pieu, coupe les écrans. Fais une activité relaxante avant de te coucher (lis un bouquin, prends un bain, étire-toi). Crée une ambiance de sommeil chill, lumière douce, lit confortable. Pense à ta journée et focus sur les trucs positifs."],
            ['task_title' => "Mouvement Zen", 'task_objectif' => "Booster ton bien-être physique et être conscient de ton corps.", 'task_instructions' => "Choisis une activité que t'aimes (yoga, marche, danse). Accorde 30 minutes à cette activité. Concentre-toi sur tes mouvements et ressentis corporels. Respire profondément et apprécie la connexion corps-esprit."],
            ['task_title' => "Récit en Photos", 'task_objectif' => "Associer créativité et introspection.", 'task_instructions' => "Promène-toi avec un appareil photo ou ton smartphone. Prends des photos qui représentent tes émotions ou pensées du moment. Crée une histoire visuelle ou écrite avec les photos. Réfléchis sur l'histoire et comment elle se lie à tes sentiments."],
            ['task_title' => "Affirmations Positives", 'task_objectif' => "Renforcer ta résilience émotionnelle et t'aimer un peu plus.", 'task_instructions' => "Choisis trois affirmations positives. Répète-les matin et soir. Quand ça chauffe, rappelle-toi de tes affirmations. Sens l'impact positif sur ton mindset et tes émotions."],
            ['task_title' => "Nuit Réparatrice", 'task_objectif' => "Mettre le sommeil en priorité pour être au top.", 'task_instructions' => "Instaure une routine relax avant de te coucher. Garde un horaire de sommeil stable. Crée un environnement sombre et tranquille. Vise 7 à 9 heures de sommeil de qualité."],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};