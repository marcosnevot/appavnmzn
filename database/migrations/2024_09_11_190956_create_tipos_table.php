<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique(); // Nombre del tipo de tarea
            $table->timestamps();
        });

        // Insertar opciones iniciales
        DB::table('tipos')->insert([
            ['nombre' => 'HACIENDA'],
            ['nombre' => 'LABORAL'],
            ['nombre' => 'MUTUA'],
            ['nombre' => 'SEGURIDAD SOCIAL'],
            ['nombre' => 'AYUNTAMIENTO'],
            ['nombre' => 'DGA'],
            ['nombre' => 'INE'],
            ['nombre' => 'ADMINISTRATIVO'],
            ['nombre' => 'INMOBILIARIO'],
            ['nombre' => 'DGA VIVIENDA'],
            ['nombre' => 'NOTARIAL'],
            ['nombre' => 'DPH'],
            ['nombre' => 'REGISTRO PROPIEDAD'],
            ['nombre' => 'FNMT'],
            ['nombre' => 'MINISTERIO INTERIOR'],
            ['nombre' => 'DGA JUEGO'],
            ['nombre' => 'EXTRANJERIA'],
            ['nombre' => 'REGISTRO PROP.'],
            ['nombre' => 'contrato privado'],
            ['nombre' => 'RED'],
            ['nombre' => 'MUTUA FREMAP'],
            ['nombre' => 'GOBIERNO DE ARAGON'],
            ['nombre' => 'AEAT'],
            ['nombre' => 'FREMAP'],
            ['nombre' => 'REGISTRO MERCANTIL'],
            ['nombre' => 'INSS'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos');
    }
};
