<?php

namespace SaltEmployeeAttendance\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Schema;

use SaltLaravel\Models\Resources;
use SaltLaravel\Traits\ObservableModel;
use SaltLaravel\Traits\Uuids;

use SaltEmployeeAttendance\Observers\ClockinObserver;

class AttendanceClocks extends Resources {

    use Uuids;
    use ObservableModel;
    use ClockinObserver;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',

        // Fields table
        'id',
        'attendance_id',
        'organization_id',
        'employee_id',
        'method',
        'date',
        'clock',
    ];

    protected $rules = array(
        'attendance_id' => 'required|string',
        'organization_id' => 'required|string',
        'employee_id' => 'required|string',
        'method' => 'nullable|string',
        'date' => 'required|date',
        'clock' => 'required|date_format:H:i:s',
    );

    protected $auths = array (
        'index',
        'store',
        'show',
        'update',
        'patch',
        'destroy',
        'trash',
        'trashed',
        'restore',
        'delete',
        'import',
        'export',
        'report'
    );

    protected $structures = array();
    protected $forms = array();

    protected $searchable = array(
        'attendance_id',
        'organization_id',
        'employee_id',
        'method',
        'date',
        'clock',
    );

    protected $fillable = array(
        'attendance_id',
        'organization_id',
        'employee_id',
        'method',
        'date',
        'clock',
    );

    public function organization() {
        return $this->belongsTo('SaltOrganization\Models\Organizations', 'organization_id', 'id');
    }

    public function employee() {
        return $this->belongsTo('SaltEmployee\Models\Employees', 'employee_id', 'id');
    }
}
