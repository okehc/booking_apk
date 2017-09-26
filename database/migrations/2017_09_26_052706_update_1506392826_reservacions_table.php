<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1506392826ReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservacions', function (Blueprint $table) {
            if(Schema::hasColumn('reservacions', 'fecha_de_finalizacion')) {
                $table->dropColumn('fecha_de_finalizacion');
            }
            
        });
Schema::table('reservacions', function (Blueprint $table) {
            
if (!Schema::hasColumn('reservacions', 'duracion')) {
                $table->time('duracion');
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
            $table->dropColumn('duracion');
            
        });
Schema::table('reservacions', function (Blueprint $table) {
                        $table->datetime('fecha_de_finalizacion')->nullable();
                
        });

    }
}
