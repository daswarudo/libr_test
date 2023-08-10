@extends('main')

@section('content')
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">Add Student</div>
    
	<div class="card-body">
        
		<form method="get" action="{{ url('create') }}">
          <div class="form-group">
              @csrf
              <label for="s_id">Student ID</label>
              <input type="text" class="form-control" name="s_id"/>
                @if($errors->has('s_id'))
					<span class="text-danger">Student ID is required</span>
			    @endif
          </div>
          
          <div class="form-group">
              <label for="s_name">Student Name</label>
              <input type="text" class="form-control" name="s_name"/>
              @if($errors->has('s_name'))
					<span class="text-danger">Student Name is required</span>
			    @endif
          </div>
          
          <div class="form-group">
              <label for="s_email">Student email</label>
              <input type="text" class="form-control" name="s_email"/>
              @if($errors->has('s_email'))
					<span class="text-danger">Student email is required</span>
			    @endif
          </div>
          
          <div class="form-group">
              <label for="s_course">Student Course</label>
              <input type="text" class="form-control" name="s_course"/>
              @if($errors->has('s_course'))
					<span class="text-danger">Student Course is required</span>
			    @endif
          </div>
          
          <div class="form-group">
              <label for="s_sy">Year</label>
              <input type="text" class="form-control" name="s_sy"/>
              @if($errors->has('s_sy'))
					<span class="text-danger">Year is required</span>
			    @endif
          </div>
          <br>
          <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-success">Create</button>
          </div>
      </form>
      
	</div>
</div>

@stop