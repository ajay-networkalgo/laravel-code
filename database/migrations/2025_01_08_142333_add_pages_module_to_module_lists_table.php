<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::table('module_lists', function (Blueprint $table) {
            DB::table('module_lists')->insert([
                'id' => 21,
                'title' => 'Pages',
                'controller_name' => 'PageController',
                'action_name' => 'page.index',
                'icon' => 'fas fa-tag',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('module_lists')->where('id', 21)->delete();
    }
};
