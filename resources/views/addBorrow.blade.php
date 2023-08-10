@extends('main')

@section('content')
@if($message = Session::get('fail'))

<div class="alert alert-info">
{{ $message }}
</div>

@endif

<div class="card">
	<div class="card-header">Borrow/Return Book</div>
    
	<div class="card-body">
        
		<form method="get" action="{{ url('createB') }}">
          
        <div class="form-group">
              <label for="id">Book</label>

                <select name="id" id="id">
                    <option value="">-- Select Book --</option>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{$book->id}} - {{ $book->bk_title }}</option>
                    @endforeach

                </select>
                
          </div>
          
          <div class="form-group">
              <label for="s_id">Student</label>
               
                <select name="s_id" id="s_id">
                    <option value="">-- Select Student --</option>
                    @foreach($student as $s)
                        <option value="{{ $s->s_id }}">{{$s->s_id}} - {{ $s->s_name }}</option>
                    @endforeach
                </select>

          </div>
          
          <div class="form-group">
              <label for="b_stat">Borrow Status</label>
                <select name="b_stat" id="b_stat" >
                    <option value="Borrowed">Borrowed</option>
                    <option value="Returned">Returned</option>
                </select>
          </div>
          
          <br>
          <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-success">Create</button>
          </div>
      </form>
      
	</div>
</div>

@stop