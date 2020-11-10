<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'foto_ktp')) {
            Schema::table('users', function(Blueprint $table) {
                $table->string('foto_ktp')->after('status')->nullable();
            });
        }
        if (!Schema::hasColumn('users', 'code_aff_ref')) {
            Schema::table('users', function(Blueprint $table) {
                $table->string('code_aff_ref')->after('foto_ktp')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('users', 'foto_ktp')) {
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('foto_ktp');
            });
        }
        if (Schema::hasColumn('users', 'code_aff_ref')) {
            Schema::table('users', function(Blueprint $table) {
                $table->dropColumn('code_aff_ref');
            });
        }
    }
}
