<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1506310475ReservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservacions', function (Blueprint $table) {
            if(Schema::hasColumn('reservacions', 'capacidad')) {
                $table->dropColumn('capacidad');
            }
            if(Schema::hasColumn('reservacions', 'invitado')) {
                $table->dropColumn('invitado');
            }
            
        });
Schema::table('reservacions', function (Blueprint $table) {
            
if (!Schema::hasColumn('reservacions', 'ubicacion')) {
                $table->string('ubicacion')->nullable();
                }
if (!Schema::hasColumn('reservacions', 'repeat')) {
                $table->tinyInteger('repeat')->nullable()->default(0);
                }
if (!Schema::hasColumn('reservacions', 'invitado')) {
                $table->text('invitado')->nullable();
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
            $table->dropColumn('ubicacion');
            $table->dropColumn('repeat');
            $table->dropColumn('invitado');
            
        });
Schema::table('reservacions', function (Blueprint $table) {
                        $table->integer('capacidad')->nullable();
                $table->string('invitado')->nullable();
                
        });

    }
}
