<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\student;
use App\Models\borrows;

class bkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //test lmao
    public function list()
    {
        $books = books::get();
        return view('dashboard', compact('books'));
    }
    public function list2()
    {
        $books = books::get();
        $student = student::get();
        
        return view('addBorrow', compact('student', 'books'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function createBk(Request $request)
    {
        
        $request->validate([
            'bk_title' => 'required',
            'bk_pub' => 'required',
            'bk_auth' => 'required',
            'bk_yr' => 'required',
            'bk_vol' => 'required',
            'bk_qty' => 'required',
            'bk_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // add validation for image file
        ]);

        if($request->file('bk_cover')){
            $file= $request->file('bk_cover')->getClientOriginalName();
            $request->file('bk_cover')->storeAs('public/img/',$file);
            // $request->file('bk_cover')->storeAs(public_path('img'),$file);

            $book = new books;
            $book->bk_title = $request->input('bk_title');
            $book->bk_pub = $request->input('bk_pub');
            $book->bk_auth = $request->input('bk_auth');
            $book->bk_yr = $request->input('bk_yr');
            $book->bk_vol = $request->input('bk_vol');
            $book->bk_qty = $request->input('bk_qty');
            $book->bk_cover = $file;

            
            $res = $book->save();
        
            if($res)
            {
                return redirect('dashboard')->with('success', 'Book has been successfully Added');
            }
            else{
                return redirect('add')->with('fail', 'Book has been successfully Added');
            }
        }
        else{
            $book = new books;
            $book->bk_title = $request->input('bk_title');
            $book->bk_pub = $request->input('bk_pub');
            $book->bk_auth = $request->input('bk_auth');
            $book->bk_yr = $request->input('bk_yr');
            $book->bk_vol = $request->input('bk_vol');
            $book->bk_qty = $request->input('bk_qty');

            $res = $book->save();
        
            if($res)
            {
                return redirect('dashboard')->with('success', 'Book has been successfully Added');
            }
            else{
                return redirect('add')->with('fail', 'Book has been successfully Added');
            }
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = books::find($id);
        return view('show')->with('books', $books);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = books::where('id','=',$id)->first();
        return view('edit', compact('books'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $book = books::find($id);

        if (!$book) {
            return back()->with('error','Book not found');
        }

        $request->validate([
            'bk_title' => 'required',
            'bk_pub' => 'required',
            'bk_auth' => 'required',
            'bk_yr' => 'required',
            'bk_vol' => 'required',
            'bk_qty' => 'required',
        ]);

        $book->bk_title = $request->input('bk_title');
        $book->bk_pub = $request->input('bk_pub');
        $book->bk_auth = $request->input('bk_auth');
        $book->bk_yr = $request->input('bk_yr');
        $book->bk_vol = $request->input('bk_vol');
        $book->bk_qty = $request->input('bk_qty');
   
        $res = $book->save();
            
        if($res) {
            return redirect('dashboard')->with('success', 'Book has been successfully Updated');
        } else {
            return back()->with('error','book update failed');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        books::where('id','=',$id)->delete();
        return back()->with('success','Book has been successfully Deleted');
    }

    public function searchbk(Request $request)
    {
        /*$search_text = $_GET['query'];
        $bksrch = books::where('bk_title','LIKE','%'.$search_text.'%')->get();
    
        return view('search',compact('books'));///
        */
        //$search_text = $request->query;
        $search_text = $_GET['query'];
        $books = books::where('bk_title','LIKE','%'.$search_text.'%')->get();
        return view('search',compact('books'));
    }

    //<--- FOR STUDENTS -->

    public function creates(Request $request)
    {
        //'bk_qty'
        $request->validate([
            's_id' => 'required',
            's_name' => 'required',
            's_email' => 'required',
            's_course' => 'required',
            's_sy' => 'required',
        ]);

        $book = new student;
        $book->s_id = $request->input('s_id');
        $book->s_name = $request->input('s_name');
        $book->s_email = $request->input('s_email');
        $book->s_course = $request->input('s_course');
        $book->s_sy = $request->input('s_sy');
   
        $res = $book->save();
        
        if($res)
        {
            return redirect('students')->with('success', 'Student has been successfully Added');
        }
        else{
            return redirect('addStud')->with('fail', 'Student has been not successfully Added');
        }
    }

    public function listStud()
    {
        $student = student::get();
        return view('students', compact('student'));
    }

    public function destroyStud(string $id)
    {
        student::where('s_id','=',$id)->delete();
        return back()->with('success','Book has been successfully Deleted');
    }

    public function editStud($id)
    {
        $student = student::where('s_id','=',$id)->first();
        return view('editStud', compact('student'));
        
    }

    public function updateStud(Request $request,$id)
    {
        $student = student::where('s_id', $id)->first();
    
        if (!$student) {
            return back()->with('error','Student not found');
        }
        
        $request->validate([
            's_id' => 'required',
            's_name' => 'required',
            's_email' => 'required',
            's_course' => 'required',
            's_sy' => 'required',
        ]);
        
        $student->s_id = $request->input('s_id');
        $student->s_name = $request->input('s_name');
        $student->s_email = $request->input('s_email');
        $student->s_course = $request->input('s_course');
        $student->s_sy = $request->input('s_sy');

        $res = $student->save();
        
        if($res) {
            return redirect('students')->with('success', 'Student has been successfully Updated');
        } else {
            return back()->with('error','Student update failed');
        }
    }

    /*FOR BORROWS */
    public function listBorrow()
    {
        $borrows = borrows::get();
        return view('borrow', compact('borrows'));
    }
    /*
    public function createB(Request $request)
    {
        $request->validate([
            'b_id' => 'required',
            'b_stat' => 'required',
            's_id' => 'required',
            'id' => 'required'
        ]);

        $borrow = new borrows([
            'b_id' => $request->input('b_id'),
            'b_stat' => $request->input('b_stat'),
            's_id' => $request->input('s_id'),
            'id' => $request->input('id')
        ]);
    
        borrows::created(function ($borrow) {
            // If the borrow status is "Borrowed", decrement the book quantity
            if ($borrow->b_stat === "Borrowed") {
                $book = books::findOrFail($borrow->id);
                if ($book->bk_qty < 1) {
                    throw new Exception('Book quantity is less than 1');//debug only
                    //throw new \Exception('Book quantity is less than 1');//debug only
                    //return redirect('addBorrow')->with('fail', 'Book is out of stock.');
                }
                else{
                    $book->bk_qty--;
                    $book->save();
                }
                
            }
            // If the borrow status is "Returned", increment the book quantity
            else if ($borrow->b_stat === "Returned") {
                $book = books::findOrFail($borrow->id);
                $book->bk_qty++;
                $book->save();
            }
        });
        
        $res = $borrow->save();
    
        if($res)
        {
            return redirect('borrow')->with('success', 'Borrow data has been successfully Added');
        }
        else{
            return redirect('addBorrow')->with('fail', 'Borrow data has not been successfully Added');
        }
        
    }*/
    public function createB(Request $request)
    {
        $request->validate([
            //'b_id' => 'required',
            'b_stat' => 'required',
            's_id' => 'required',
            'id' => 'required'
        ]);

        // Check if the book is available before creating the borrow record
        $book = books::findOrFail($request->input('id'));
        if ($request->input('b_stat') === "Borrowed" && $book->bk_qty < 1) {
            return redirect('addBorrow')->with('fail', 'Book is out of stock.');
        }

        $borrow = new borrows([
            //'b_id' => $request->input('b_id'),
            'b_stat' => $request->input('b_stat'),
            's_id' => $request->input('s_id'),
            'id' => $request->input('id')
        ]);

        // Update the book quantity after creating the borrow record
        if ($request->input('b_stat') === "Borrowed") {
            $book->bk_qty--;
        } else if ($request->input('b_stat') === "Returned") {
            $book->bk_qty++;
        }
        $book->save();

        $res = $borrow->save();

        if($res)
        {
            return redirect('borrow')->with('success', 'Borrow data has been successfully Added');
        }
        else{
            return redirect('addBorrow')->with('fail', 'Borrow data has not been successfully Added');
        }
    }


    public function destroyBor(string $id)
    {
        borrows::where('b_id','=',$id)->delete();
        return back()->with('success','Borrow data has been successfully Deleted');
    }

    public function editBor($id)
    {
        $borrows = borrows::where('b_id','=',$id)->first();
        return view('editBor', compact('borrows'));
    }

    public function updateBor(Request $request,$id)
    {
        $borrow = borrows::where('b_id', $id)->first();
    
        if (!$borrow) {
            return back()->with('error','Borrow data not found');
        }
        
        $request->validate([
            'b_id' => 'required',
            'b_stat' => 'required',
            's_id' => 'required',
            'id' => 'required'
        ]);
        
        $borrow->b_id = $request->input('b_id');
        $borrow->b_stat = $request->input('b_stat');
        $borrow->s_id = $request->input('s_id');
        $borrow->id = $request->input('id');

        $res = $borrow->save();
        
        if($res) {
            if ($borrow->b_stat == 'Returned') {
                $book = books::find($borrow->id);
                $book->bk_qty = $book->bk_qty + 1;
                $book->save();
            }
            if ($borrow->b_stat == 'Borrowed') {
                $book = books::find($borrow->id);
                $book->bk_qty = $book->bk_qty - 1;
                $book->save();
            }
            return redirect('borrow')->with('success', 'Borrow data has been successfully Updated');
        } else {
            return back()->with('error','Borrow data update failed');
        }
    }
}
