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
        Schema::create('avis_passages', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('nom_site');
            $table->string('statut');
            $table->boolean('autorisation');
            $table->unsignedBigInteger('id_client');
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis_passages');
    }
};
