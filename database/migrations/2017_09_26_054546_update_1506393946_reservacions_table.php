<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1506393946ReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservacions', function (Blueprint $table) {
            if(Schema::hasColumn('reservacions', 'fecha_de_inicio')) {
                $table->dropColumn('fecha_de_inicio');
            }
            if(Schema::hasColumn('reservacions', 'invitado')) {
                $table->dropColumn('invitado');
            }
            if(Schema::hasColumn('reservacions', 'duracion')) {
                $table->dropColumn('duracion');
            }
            
        });
Schema::table('reservacions', function (Blueprint $table) {
            
if (!Schema::hasColumn('reservacions', 'hora_duracion')) {
                $table->integer('hora_duracion')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'minuto_duracion')) {
                $table->integer('minuto_duracion')->nullable();
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
            $table->dropColumn('hora_duracion');
            $table->dropColumn('minuto_duracion');
            
        });
Schema::table('reservacions', function (Blueprint $table) {
                        $table->datetime('fecha_de_inicio')->nullable();
                $table->text('invitado')->nullable();
                $table->time('duracion');
                
        });

    }
}
