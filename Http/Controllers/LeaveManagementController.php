<?php

namespace Luanardev\Modules\LeaveManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Luanardev\Modules\LeaveManagement\Entities\LeaveCategory;
use Luanardev\Modules\LeaveManagement\Entities\Leave;

class LeaveManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       
        
        return view('leavemanagement::index');
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
        $employee_id = Auth::user()->id;
        $leave = new Leave();
        $leave->employee_id = $employee_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->leave_category_id = $request->category;
        $leave->save();

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
}
