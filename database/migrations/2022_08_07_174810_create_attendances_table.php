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
        Schema::create('attendances', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('organization_id')->references('id')->on('organizations');
            $table->foreignUuid('employee_id')->references('id')->on('employees');

            $table->date('date');
            $table->json('schedule')->nullable();
            // SCHEDULE DATA
            // {
            //     day_type: 'weekday',
            //     note: '-',
            //     schedule_type: 'schedule', // schedule, calendar, timeoff
            //     date: '2022-08-01',
            //     time_in: '08:00:00',
            //     time_out: '17:00:00',
            //     schedule: [],
            //     calendar: [],
            //     timeoff: []
            // }
            $table->time('clockin')->nullable();
            $table->time('clockout')->nullable();
            $table->json('time_debt')->nullable();
            // TIME DEBT
            // {
            //     late: '00:00:00',
            //     early: '00:00:00',
            //     total: '00:00:00'
            // }
            $table->json('timeoff')->nullable(); // array of timeoffs

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
        Schema::dropIfExists('attendances');
    }
};
