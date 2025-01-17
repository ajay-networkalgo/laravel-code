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
        Schema::table('contact_us', function (Blueprint $table) {
            $table->integer('otp')->default(0)->after('message'); // Add OTP column
            $table->boolean('is_verified_otp')->default(0)->after('otp'); // Add is_verified_otp column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_us', function (Blueprint $table) {
            $table->dropColumn(['otp', 'is_verified_otp']); // Remove both columns
        });
    }
};
