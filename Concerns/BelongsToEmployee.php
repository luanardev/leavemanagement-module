<?php

namespace Luanardev\Modules\LeaveManagement\Concerns;
use Luanardev\Modules\Employees\Entities\Employee;


trait BelongsToEmployee{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}