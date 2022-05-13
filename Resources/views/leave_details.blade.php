@extends('leavemanagement::layouts.app')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Details</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Leave Details</h3>

          <div class="card-tools">
            
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 order-1 order-md-2">
              <div class="row">
                
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Approver Activity</h4>
                  @if ($approvals->count() > 0)
                    @foreach ($approvals as $approval)
                    <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="" >
                          <span class="username">
                            <a href="#">{{$approval->employee->fullname()}}</a>
                          </span>
                          <span class="description">{{$approval->created_at->format('l jS F Y')}} </span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          {{$approval->comment ? $approval->comment : 'Comment Not Given'}}
                        </p>
  
                        <p>
                          <a href="#" class="link-black text-sm">
                            @if ($approval->status == 'approved')
                                <i class="fas fa-solid fa-thumbs-up"></i>
                            @else
                                <i class="fas fa-solid fa-thumbs-down"></i>
                            @endif  
                            {{$approval->status}}
                            </a>
                        </p>
                      </div>
                        
                    @endforeach
                      
                  @else
                      No Activity Yet
                  @endif
                    

                    
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
              <h3 class="text-primary">Leave Details</h3>
              <br>
              <div class="text-muted">
                <b class="d-block">Applicant Name</b>
                <p class="text-sm">{{$leave->employee->fullname()}}
                </p>

                <b class="d-block">Leave Type</b>
                <p class="text-sm">{{$leave->category->name}} 
                </p>

                <b class="d-block">Start Date</b>
                <p class="text-sm">{{$leave->start_date->format('l jS F Y')}}  
                </p>

                <b class="d-block">End Date</b>
                <p class="text-sm">{{$leave->end_date->format(' l jS F Y')}}
                </p>

                <b class="d-block">Summary</b>
                <p class="text-sm">{{$leave->summary}}</p>

                    </p>

                    <b class="d-block">Current Approval Level</b>
                    <p class="text-sm">{{$leave->level->name}}</p>
              </div>

              <h5 class="mt-5 text-muted">Attachments</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul>
              
            </div>
          </div>
          @yield('submit_field')
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection