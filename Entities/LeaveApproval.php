<?php

namespace Luanardev\Modules\LeaveManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Luanardev\Modules\Employees\Entities\Employee;

class LeaveApproval extends Model
{
    use HasFactory;

    protected $table = 'hrm_leave_approvals';

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Luanardev\Modules\LeaveManagement\Database\factories\LeaveApprovalFactory::new();
    }

    public function leaveAction($leave_id, $verdict, $comment){
        $leave = Leave::find($leave_id);
        //dd($leave);
        
        if($verdict == 'approved'){
            $leave->accept();
            $this->status = "approved";
        }else{
            $leave->reject();
            $this->status = "rejected";
        }
       
        $employeeId = Auth::user()->getEmployeeId();
        $this->approver_id = $employeeId;
        $this->comment = $comment;
        
        $this->leave_id = $leave_id;
        $this->save();
        
    }

    public static function getApprovalsByLeaveId($leave_id){
        return SELF::where('leave_id', $leave_id)->orderBy('created_at')->get();
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'approver_id');
    }
    
    
}
