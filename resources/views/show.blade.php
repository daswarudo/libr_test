
@extends('main')

@section('content')
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif
<div class="card">
	<div class="card-header">Book Details</div>
    
	<div class="card-body">
    <button type="submit" class="btn btn-success" onclick="history.go(-1);">Back</button>
	  <br>
	  
	  <table class="d">
   		 <thead>
        	<tr>
				<td>Book ID</td>
				<th>Book Cover</th>
            	<th>Book Title</th>
            	<th>Publisher</th>
            	<th>Author</th>
            	<th>Year</th>
				<th>Volume</th>
				<th>Quantity</th>
				<th>Avaliability</th>
        	</tr>
    	</thead>
   		<tbody>
		   		<tr>
				   <td>{{$books->id}}</td>
				   <td>
						<img src="{{ asset('storage/img/' . $books->bk_cover) }}" style="height: 100px; width: 70px;">
					</td>
					<td>{{$books->bk_title}}</td>
					<td>{{$books->bk_pub}}</td>
					<td>{{$books->bk_auth}}</td>
					<td>{{$books->bk_yr}}</td>
					<td>{{$books->bk_vol}}</td>
					<td>{{$books->bk_qty}}</td>
					<td>
					@if($books->bk_qty < 1)
    					Not Available
					@else
    					Available
					@endif

					</td>
				</tr>
		   
			
    	</tbody>
	</table>

	</div>
</div>

@stop