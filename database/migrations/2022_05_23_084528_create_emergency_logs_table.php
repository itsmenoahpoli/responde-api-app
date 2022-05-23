<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emergency_sos_id')->constrained('emergency_sos')->restrictOnDelete();
            $table->foreignId('emergency_sms_template_id')->constrained('emergency_sms_templates')->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_logs');
    }
}
