<?php

namespace Luanardev\Modules\LeaveManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Luanardev\Modules\LeaveManagement\Entities\Leave;
use Luanardev\Modules\LeaveManagement\Entities\LeaveApproval;
use Luanardev\Modules\Employees\Entities\Employee;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $employeeId = Auth::user()->getEmployeeId();
        
        $leaves = Leave::showPendingApplications($employeeId);
        
        return view('leavemanagement::index')->with(['leaves' => $leaves]);

        

      

        
    }

   
}
