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
        Schema::create('attendance_clocks', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('attendance_id')->references('id')->on('attendances');
            $table->foreignUuid('organization_id')->references('id')->on('organizations');
            $table->foreignUuid('employee_id')->references('id')->on('employees');

            $table->enum('method', [
                'api',
                'web',
                'mobile',
                'android',
                'ios',
                'fingerprint',
                'rfc',
                'other'
            ])->default('api');
            $table->date('date');
            $table->time('clock');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_clocks');
    }
};
