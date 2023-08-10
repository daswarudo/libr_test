
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

		<form method="get" action="{{ url('search') }}"> 
			
				<table class="d">
					<tr>
	  					<td><input type="text" class="form-control" name="query" style="width: 100%;" placeholder="Search book"/></td>
	  					<td><button type="submit" class="btn btn-success">Search</button></td>
					</tr>
			
		</form>


	  <h3><b>List of Books:</b></h3>
	  <table class="d">
   		 <thead>
        	<tr>
				<th style="width:6%">Book ID</th>
				<th>Book Cover</th>
            	<th>Book Title</th>
            	<th>Author</th>
				<th>Quantity</th>
            	<th>Avaliability</th>
				<th>Action</th>
        	</tr>
    	</thead>
   		<tbody>
		   @php
				$i=1;
		   @endphp
		   @foreach($books as $dt)
		   		<tr>
				   <td>{{$dt->id}}</td>
					<td>
						<img src="{{ asset('storage/img/' . $dt->bk_cover) }}" style="height: 100px; width: 70px;">
					</td>
					<td>{{$dt->bk_title}}</td>
					<td>{{$dt->bk_auth}}</td>
					<td>{{$dt->bk_qty}}</td>
					<td>
					@if($dt->bk_qty < 1)
    					Not Available
					@else
    					Available
					@endif

					</td>
					<td>
						<a href="{{url('show/'.$dt->id)}}" class = "btn btn-primary btn-sm">Details</a>

						<a href="{{url('edit/'.$dt->id)}}" class = "btn btn-primary btn-sm">Edit</a>
						
						<a href="{{url('destroy/'.$dt->id)}}" class = "btn btn-primary btn-sm">Delete</a>
					</td>
				</tr>
		   @endforeach
			
    	</tbody>
	</table>
	<form method="get" action="{{ route('add') }}">
			<br>
          	<button type="submit" class="btn btn-success">Add book</button>
		
    </form>
	</div>
</div>

@stop