<?php

namespace Luanardev\Modules\LeaveManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luanardev\Modules\Employees\Entities\Employee;
use Luanardev\Modules\LeaveManagement\Entities\LeaveLevel;
use Luanardev\Modules\LeaveManagement\Concerns\BelongsToEmployee;
use Illuminate\Support\Facades\Auth;

class Leave extends Model
{
    use HasFactory, 
        BelongsToEmployee;

    protected $table = 'hrm_leave_applications';

    protected $fillable = [
        'id', 'employee_id', 'leave_category_id', 'start_date', 'end_date', 'level_id', 'summary'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
        'created_at' => 'date:Y-m-d'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(LeaveCategory::class, 'leave_category_id');
    }

    public static function showPendingApplications($empolyee_id){
        return SELF::where('employee_id', $empolyee_id)->get();
    }

    public function level()
    {
        return $this->belongsTo(LeaveLevel::class, 'level_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function completion_level(){
        if($this->status == 'rejected'){
            return 100;
        }else{
            $max = 3;
        return round(($this->level_id/$max)*100);
        }
        
    }

    public static function leavesTaken($financialYear){
        $emp_id = Auth::user()->getEmployeeId();
        return SELF::where('employee_id', $emp_id)->where('leave_category_id', 1)->where('financial_year', $financialYear)->sum('days');
    }
    public static function getSubordinateApplications(){
       $subordinate_ids = Auth::user()->getEmployee()->subordinates()->pluck('employee_id');
        return Leave::where('status',  'pending')->whereIn('employee_id', $subordinate_ids)->get();
    }

    public function reject(){
        $this->status = 'rejected';
        $this->save(); 
    }

    public function accept(){
        $this->level_id += 1;
        if($this->level_id == 3){
            $this->status = 'approved';
        }
        $this->save();
    }


}
