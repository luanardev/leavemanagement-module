<?php

namespace Luanardev\Modules\LeaveManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Luanardev\Modules\LeaveManagement\Entities\LeaveCategory;
use Luanardev\Modules\LeaveManagement\Entities\Leave;
use Luanardev\Modules\LeaveManagement\Entities\LeaveApproval;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        //return view('leavemanagement::index');
        $surbodinate = Employee::find(22002);



        $supervisor = Employee::find(22001);
        $supervisor->supervise($surbodinate);

        print "Hello";
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $leave_categories = LeaveCategory::all();
        //dd($leave_categories);
        return view('leavemanagement::client.create')->with(['leave_categories' => $leave_categories]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $employeeId = Auth::user()->getEmployeeId();
        
        $leave = new Leave();
        $leave->employee_id = $employeeId;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->leave_category_id = $request->category;
        $leave->level_id = 1;
        $leave->summary = $request->summary;
        $leave->save();
        $employeeId = Auth::user()->getEmployeeId();
        $leaves = Leave::showPendingApplications($employeeId);
        
        return view('leavemanagement::index')->with(['leaves' => $leaves]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('leavemanagement::show');
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('leavemanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function getPending(Request $request){
        $leaves = Leave::getSubordinateApplications();
        return view('leavemanagement::admin.leaves')->with(['leaves' => $leaves]);
    }


    public function viewApplication(Request $request){
        $leave_id = $request->leave_id;
        $leave = Leave::find($leave_id);
        $approvals = LeaveApproval::getApprovalsByLeaveId($leave_id);
        return view('leavemanagement::client.leave')->with(['leave' => $leave, 'approvals' => $approvals]);
    } 



    public function viewPending(Request $request){
        $leave_id = $request->leave_id;
        $leave = Leave::find($leave_id);
        $approvals = LeaveApproval::getApprovalsByLeaveId($leave_id);
        return view('leavemanagement::admin.leave')->with(['leave' => $leave, 'approvals' => $approvals]);
    } 


    public function approve(Request $request){
        $leave_approval = new LeaveApproval;
        $leave_approval->leaveAction($request->leave_id, 'approved', $request->comment);
        $leaves = Leave::getSubordinateApplications();
        return view('leavemanagement::admin.leaves')->with(['decision' => 'approved', 'leaves' => $leaves]);
    }

    public function disapprove(Request $request){
        $leave_approval = new LeaveApproval;
        $leave_approval->leaveAction($request->leave_id, 'rejected', $request->comment);
        $leaves = Leave::getSubordinateApplications();
        return view('leavemanagement::admin.leaves')->with(['decision'=> 'rejected', 'leaves' => $leaves]);
    }
}
