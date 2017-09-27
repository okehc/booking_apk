<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1506487441UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if(! Schema::hasColumn('users', 'deleted_at')) {
                $table->softDeletes();
            }
            
        });
Schema::table('users', function (Blueprint $table) {
            
if (!Schema::hasColumn('users', 'ubicacion')) {
                $table->integer('ubicacion')->nullable();
                }
if (!Schema::hasColumn('users', 'departamento')) {
                $table->integer('departamento')->nullable();
                }
if (!Schema::hasColumn('users', 'extension')) {
                $table->string('extension');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ubicacion');
            $table->dropColumn('departamento');
            $table->dropColumn('extension');
            
        });
Schema::table('users', function (Blueprint $table) {
            if(Schema::hasColumn('users', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
            
        });

    }
}

                