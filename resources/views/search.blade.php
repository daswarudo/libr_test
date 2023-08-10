@extends('main')

@section('content')
<div class="card">
<table class="d">
   		 <thead>
        	<tr>
				
            	<th>Book Title</th>
            	
            	<th>Author</th>
            	
				
        	</tr>
    	</thead>
   		<tbody>
		   @php
				$i=1;
		   @endphp
		   @foreach($books as $dt)
		   		<tr>
					
					<td>{{$dt->bk_title}}</td>
					
					<td>{{$dt->bk_auth}}</td>
				</tr>
		   @endforeach
			
    	</tbody>
	</table>
</div>
@endsection