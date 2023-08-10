
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

	  <h3><b>List of Borrowed Books:</b></h3>
	  <table class="d">
   		 <thead>
        	<tr>
            	<th>Borrow ID</th>
            	<th>Borrow Status</th>
            	<th>Student ID</th>
				<th>Book ID</th>
				<th>Action</th>
        	</tr>
    	</thead>
   		<tbody>
		   @php
				$i=1;
		   @endphp
		   @foreach($borrows as $dt)
		   		<tr>
					<td>{{$dt->b_id}}</td>
					<td>{{$dt->b_stat}}</td>
					<td>{{$dt->s_id}}</td>
					<td>{{$dt->id}}</td>
					<td>
						<a href="{{url('destroyBor/'.$dt->b_id)}}" class = "btn btn-primary btn-sm">Delete</a>
                        <a href="{{url('editBor/'.$dt->b_id)}}" class = "btn btn-primary btn-sm">Change Status</a>
					</td>
				</tr>
		   @endforeach
			
    	</tbody>
	</table>
	<form method="get" action="{{ url('addBorrow') }}">
			<br>
          	<button type="submit" class="btn btn-success">Borrow/Return Book</button>
		
    </form>
	</div>
</div>

@stop