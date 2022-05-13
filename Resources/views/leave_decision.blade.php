<div class="text-center mt-5 mb-3 form-group">
            
    <form  method="post">
        {{ csrf_field() }}
        <label for="">Comment</label>
        <textarea class="form-control" name="comment" id="" cols="5" rows="5"></textarea>
        <br>
        <input type="hidden" name="leave_id" value="{{$leave->id}}">
      <button type="submit" formaction="{{route('leavemanagement.admin.approve')}}" class="btn btn-sm btn-success">Approve</button>
      <button type="submit" formaction="{{route('leavemanagement.admin.disapprove')}}" class="btn btn-sm btn-danger">Disapprove</button>
    
    </form>
                  
              </div>