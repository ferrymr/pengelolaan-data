<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVwRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW `vw_roles` AS select 
                `users`.`id` AS `id`,
                `users`.`name` AS `nama`,
                `users`.`email` AS `email`,
                `users`.`password` AS `password`,
                `roles`.`id` AS `role_id`,
                `roles`.`name` AS `role_name` 
                
            FROM ((`role_user` 
                JOIN `users` ON ((`users`.`id` = `role_user`.`user_id`))) 
                JOIN `roles` ON ((`roles`.`id` = `role_user`.`role_id`))) 
                
            ORDER BY `users`.`id`;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("
            DROP VIEW vw_roles; 
        ");
    }
}
