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

class Attendances extends Resources {

    use Uuids;
    use ObservableModel;

    protected $filters = [
        'default',
        'search',
        'fields',
        'relationship',
        'withtrashed',
        'orderby',

        // Fields table
        'id',
        'organization_id',
        'employee_id',
        'date',
        'schedule',
        'clockin',
        'clockout',
        'time_debt',
        'timeoff',
    ];

    protected $rules = array(
        'organization_id' => 'required|string',
        'employee_id' => 'required|string',
        'date' => 'required|date',
        'schedule' => 'nullable|json',
        'clockin' => 'nullable|date_format:H:i:s',
        'clockout' => 'nullable|date_format:H:i:s',
        'time_debt' => 'nullable|json',
        'timeoff' => 'nullable|json',
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
        'organization_id',
        'employee_id',
        'date',
        'schedule',
        'clockin',
        'clockout',
        'time_debt',
        'timeoff',
    );

    protected $fillable = array(
        'organization_id',
        'employee_id',
        'date',
        'schedule',
        'clockin',
        'clockout',
        'time_debt',
        'timeoff',
    );

    public function organization() {
        return $this->belongsTo('SaltOrganization\Models\Organizations', 'organization_id', 'id');
    }

    public function employee() {
        return $this->belongsTo('SaltEmployee\Models\Employees', 'employee_id', 'id');
    }
}
