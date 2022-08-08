<?php

namespace SaltEmployeeAttendance\Observers;

use SaltEmployeeAttendance\Models\Attendances;

trait ClockinObserver
{
    public static function bootClockinObserver()
    {
        static::creating(function ($model) {
            // TODO: check if attendance for the current date is exist
            // FIXME: this line of code below should be executed through event
            // $data = request('weekday', []);
            // Attendances::create($data);
        });

        static::created(function ($model) {
            // TODO: event after clockin stored
        });
    }
}