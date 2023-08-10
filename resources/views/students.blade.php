
@extends('main')

@section('content')
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif
<div class="card">
	<div class="card-header">Dashboard</div>
	
	<div class="card-body">

	  <h3><b>List of Students:</b></h3>
	  <table class="d">
   		 <thead>
        	<tr>
            	<th>Student ID</th>
            	<th>Student Name</th>
            	<th>Email</th>
				<th>Course</th>
                <th>Year</th>
                <th>Action</th>
        	</tr>
    	</thead>
   		<tbody>
		   @php
				$i=1;
		   @endphp
		   @foreach($student as $dt)
		   		<tr>
					<td>{{$dt->s_id}}</td>
					<td>{{$dt->s_name}}</td>
                    <td>{{$dt->s_email}}</td>
                    <td>{{$dt->s_course}}</td>
                    <td>{{$dt->s_sy}}</td>
                    <td>
                        <a href="{{url('destroyStud/'.$dt->s_id)}}" class = "btn btn-primary btn-sm">Delete</a>
                        <a href="{{url('editStud/'.$dt->s_id)}}" class = "btn btn-primary btn-sm">Edit</a>
                    </td>
				</tr>
		   @endforeach
			
    	</tbody>
	</table>
	<form method="get" action="{{ route('addStud') }}">
			<br>
          	<button type="submit" class="btn btn-success">Add Student</button>

    </form>
	</div>
</div>

@stop