@extends('leavemanagement::layouts.app')

@section('content')

@if (isset($decision) && $decision == 'approved')
<div class="alert alert-success" role="alert">
    Leave successfully Approved
  </div>
@elseif(isset($decision) && $decision == 'rejected')
<div class="alert alert-danger" role="alert">
    Leave successfully Rejected
  </div>   
@endif

@if ($leaves->count() > 0)

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Leave Applications</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Leave Type</th>
                        <th>Applicant</th>
                        <th>Date Applied</th>
                        <th># of Days</th>
                        <th>Current Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($leaves as $leave)
                            
                    
                    <tr onclick="window.location='{{route('leavemanagement.admin.pending.view', ['leave_id' => $leave->id])}}';">
                    
                        <td>1</td>
                        <td>{{$leave->category->name}}</td>
                        <td>{{$leave->employee->fullname()}}</td>
                        <td>{{$leave->end_date->format('g:ia \o\n l jS F Y')}}</td>
                        <td>5</td>
                        <td>{{$leave->level->name}}</td>
                    </tr>
                    
                    @endforeach
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
                </div>
            </div>
            <!-- /.card -->
        
            </div>
        </div>
    </div>
</section>

 
@else
<div class="alert alert-danger" role="alert">
    You have no leave requests
  </div>
@endif
    
@endsection
