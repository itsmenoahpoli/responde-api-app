<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSessionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_session_logs', function (Blueprint $table) {
            $table->id();
            $table->string('s_uid');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->dateTime('session_start');
            $table->dateTime('session_end')->nullable();
            $table->string('session_ip');
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
        Schema::dropIfExists('user_session_logs');
    }
}
