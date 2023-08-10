@extends('main')

@section('content')
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">Add Borrow</div>
    
	<div class="card-body">
        
        <form method="post" action="{{ url('updateBor/'.$borrows->b_id)}}">
          <div class="form-group">
              @csrf
              <label for="b_id">Borrow ID</label>
              <input type="text" class="form-control" name="b_id" id="b_id" value="{{$borrows->b_id}}" readonly/>
                @if($errors->has('b_id'))
					<span class="text-danger">Borrow ID is required</span>
			    @endif
          </div>
          
          <div class="form-group">
              <label for="b_stat">Borrow Status</label>
                <select name="b_stat" id="b_stat">
                    
                    <option value="Returned">Returned</option>
                    <option value="Borrowed">Borrowed</option>
                </select>
          </div>
          
          <div class="form-group">
              <label for="s_id">Student</label>
               
                <input type="text" class="form-control" name="s_id" id="s_id" value="{{$borrows->s_id}}" readonly/>

          </div>
          
          <div class="form-group">
              <label for="id">Book</label>

              <input type="text" class="form-control" name="id" id="id" value="{{$borrows->id}}" readonly/>
                
          </div>
          
          
          <br>
          <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-success">Edit</button>
          </div>
      </form>
      
	</div>
</div>

@stop