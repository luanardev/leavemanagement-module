@extends('leavemanagement::layouts.app')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Apply For Leave</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">
        <div class="col-md-6">

            <div class="card card-outline">
                <div class="card-header">
                <h3 class="card-title">Leave Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('leavemanagement.apply') }}" method="POST">
                    {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Leave Category</label>
                                <select class="form-control" id="leave_category" name="category" id="" required>
                                    <option></option>
                                    @foreach($leave_categories as $leave_category)
                                        <option value="{{$leave_category->id}}">{{$leave_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Start Date</label>
                                <input name="start_date" min="{{date('Y-m-d')}}" type="date" class="form-control"  placeholder="Enter email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">End Date</label>
                                <input name="end_date" min="{{date('Y-m-d')}}" type="date" class="form-control"  placeholder="Enter email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Summary</label>
                                <textarea class="form-control" name="summary" id="" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1">Days Requested</label>
                                <input name="days" min="1" type="number" id="days_requested" class="form-control"  required>
                            </div>
                            
                        </div>
                    
                    </div>
                    
                </div>
                <!-- /.card-body -->
        
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <div class="col-md-6">
            <div class="card card-outline">
                <div class="card-header">
                <h3 class="card-title">Annual Leave Details</h3>
                </div>
                <div class="card-body">
                    <h5>Leave Days Per Financial Year</h5>
                    {{$leaves_per_year}}
                    <br><br>
                    <h5>Leaves Taken</h5>
                    {{$leaves_taken}}
                    <br><br>
                    <h5>Days Available</h5>
                    {{$leaves_per_year - $leaves_taken}}
                </div>
                
                
            </div>
            <!-- /.card -->

        </div>
    </div>

    <script>
    //     $('#days_requested').change(function () {
    //         var leave_type_id = $('#leave_category').val();
    //         console.log(leave_type_id);
    //         if(leave_type_id == 1){
    //             $(this).att("max", "{{$leaves_per_year - $leaves_taken}}");
    //         }else{
    //             $(this).removeAttr("max");
    //         }
    //     });
    // </script>
    

@endsection