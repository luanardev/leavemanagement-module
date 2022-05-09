<?php

namespace Luanardev\Modules\LeaveManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luanardev\Modules\Employees\Entities\Employee;
use Luanardev\Modules\LeaveManagement\Concerns\BelongsToEmployee;

class Leave extends Model
{
    use HasFactory, 
        BelongsToEmployee;

    protected $table = 'hrm_leaves';

    protected $fillable = [
        'id', 'employee_id', 'leave_category_id', 'start_date', 'end_date', 'summary'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category_id');
    }
}
