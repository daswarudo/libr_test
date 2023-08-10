@extends('main')

@section('content')
@if($message = Session::get('success'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif
<div class="card">
	<div class="card-header">Edit Book</div>
    
	<div class="card-body">
    
		<form method="post" action="{{ url('update/'.$books->id)}}">
           
          <div class="form-group">
              @csrf
              <label for="bk_title">Book Title</label>
              <input type="text" class="form-control" name="bk_title" value="{{$books->bk_title}}"/>
              @if($errors->has('bk_title'))
					<span class="text-danger">Book title is required</span>
			    @endif
            </div>
          <div class="form-group">
              <label for="bk_pub">Book Publisher</label>
              <input type="text" class="form-control" name="bk_pub" value="{{$books->bk_pub}}"/>
              @if($errors->has('bk_pub'))
					<span class="text-danger">Book publisher is required</span>
			    @endif
          </div>
          <div class="form-group">
              <label for="bk_auth">Book Author</label>
              <input type="text" class="form-control" name="bk_auth" value="{{$books->bk_auth}}"/>
              @if($errors->has('bk_auth'))
					<span class="text-danger">Book author is required</span>
			    @endif
          </div>
          <div class="form-group">
              <label for="bk_yr">Book Year</label>
              <input type="text" class="form-control" name="bk_yr"  value="{{$books->bk_yr}}"/>
              @if($errors->has('bk_yr'))
					<span class="text-danger">Book year is required</span>
			    @endif
          </div>
          <div class="form-group">
              <label for="bk_vol">Book Volume</label>
              <input type="text" class="form-control" name="bk_vol"  value="{{$books->bk_vol}}"/>
              @if($errors->has('bk_vol'))
					<span class="text-danger">Book volume is required</span>
			    @endif
          </div>
          <div class="form-group">
              <label for="bk_vol">Book Quantity</label>
              <input type="text" class="form-control" name="bk_qty"  value="{{$books->bk_qty}}"/>
              @if($errors->has('bk_qty'))
					<span class="text-danger">Book quantity is required</span>
			    @endif
          </div>
          <br>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
      </form>
      
	</div>
</div>

@stop