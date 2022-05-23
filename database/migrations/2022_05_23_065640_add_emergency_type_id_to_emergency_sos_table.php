<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmergencyTypeIdToEmergencySosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emergency_sos', function (Blueprint $table) {
            $table->dropColumn(['type']);
            $table->foreignId('emergency_type_id')->nullable()->constrained('emergency_types')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emergency_sos', function (Blueprint $table) {
            $table->dropColumn(['emergency_type_id']);
        });
    }
}
