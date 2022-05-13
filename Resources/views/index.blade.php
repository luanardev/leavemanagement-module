@extends('leavemanagement::layouts.app')

@section('content')

@if ($leaves->count() > 0)



    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Applications</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Leave Applications</h3>

          
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          #
                      </th>
                      <th >
                          Leave Type
                      </th>
                      <th>
                          Date Applied
                      </th>
                      <th>
                          Current Stage
                      </th>
                      <th>
                          Progress Level
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
                @foreach ($leaves as $leave)
                  <tr onclick="window.location='{{route('leavemanagement.client.pending.view', ['leave_id' => $leave->id])}}';">
                      
                      <td>
                          1
                      </td>
                      <td>
                        {{$leave->category->name}}
                      </td>
                      <td>
                        {{$leave->created_at->format('g:ia \o\n l jS F Y')}}
                      </td>
                      <td class="project_progress">
                          {{ $leave->status == 'rejected' ? 'Rejected by' : ""}}
                        {{$leave->level->name}}
                      </td>
                      <td class="project_progress" >
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{$leave->completion_level()}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$leave->completion_level()}}%">
                            </div>
                        </div>
                        <small>
                            {{$leave->completion_level()}}% Complete
                        </small>
                      </td>
                     
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
 

 
@else
<div class="alert alert-danger" role="alert">
    You have no leave requests
  </div>
@endif
    
@endsection
