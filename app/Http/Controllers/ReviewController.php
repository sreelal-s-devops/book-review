<?php

namespace App\Http\Controllers;

use App\Http\Requests\Add_Review_Request;
use App\Models\book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(book $book)
    {
       return view('review.add_review',compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Add_Review_Request $request ,book $book)
    {
      
       $data =$request->validated();
       $data['user_id']=Auth::user()->id;
       $book->review()->create($data);
       return redirect()->back()->with('message','Review added sucessfully..!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo"show function of review";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
