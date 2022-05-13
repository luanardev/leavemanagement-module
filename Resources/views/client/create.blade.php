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
                        <select class="form-control" name="category" id="" required>
                            @foreach($leave_categories as $leave_category)
                                <option value="{{$leave_category->id}}">{{$leave_category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input name="start_date" type="date" class="form-control"  placeholder="Enter email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">End Date</label>
                        <input name="end_date" type="date" class="form-control"  placeholder="Enter email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleInputEmail1">Summary</label>
                        <textarea class="form-control" name="summary" id="" cols="30" rows="10" required></textarea>
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

@endsection