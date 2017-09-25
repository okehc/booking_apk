<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1506303859ReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservacions', function (Blueprint $table) {
            if(Schema::hasColumn('reservacions', 'nombre')) {
                $table->dropColumn('nombre');
            }
            if(Schema::hasColumn('reservacions', 'comentario')) {
                $table->dropColumn('comentario');
            }
            
        });
Schema::table('reservacions', function (Blueprint $table) {
            
if (!Schema::hasColumn('reservacions', 'nombre_de_reunion')) {
                $table->string('nombre_de_reunion')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'sala_de_juntas')) {
                $table->string('sala_de_juntas')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'capacidad')) {
                $table->integer('capacidad')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'fecha_de_inicio')) {
                $table->datetime('fecha_de_inicio')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'fecha_de_finalizacion')) {
                $table->datetime('fecha_de_finalizacion')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'invitado')) {
                $table->string('invitado')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'comentario')) {
                $table->text('comentario')->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservacions', function (Blueprint $table) {
            $table->dropColumn('nombre_de_reunion');
            $table->dropColumn('sala_de_juntas');
            $table->dropColumn('capacidad');
            $table->dropColumn('fecha_de_inicio');
            $table->dropColumn('fecha_de_finalizacion');
            $table->dropColumn('invitado');
            $table->dropColumn('comentario');
            
        });
Schema::table('reservacions', function (Blueprint $table) {
                        $table->string('nombre')->nullable();
                $table->string('comentario')->nullable();
                
        });

    }
}
