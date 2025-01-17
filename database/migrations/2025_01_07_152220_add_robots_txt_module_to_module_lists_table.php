<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('module_lists')->insert([
            'id' => 19,
            'title' => 'Robots Txt',
            'controller_name' => 'RobotsTxtController',
            'action_name' => 'robots-txt.index',
            'icon' => 'fas fa-tag',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('module_lists')->where('id', 19)->delete();
    }
};
