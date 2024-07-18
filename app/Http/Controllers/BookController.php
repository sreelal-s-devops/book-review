<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddBookRequest;
use App\Http\Requests\UpdateBookFormRequest;
use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $filters = [
                'All Books' => 'All Books',
                'Latest' => 'Latest',
                'Most Reviewed' => 'Most Reviewed',
                'Most Rating' => 'Most Rating',

            ];
            $title = $request['title'];
            $filter = $request['filter'];

            $books = book::with('review')->when($title, function ($query, $title) {
                $query->title($title);
            })->rating();
            $books = match ($filter) {
                'Most Reviewed' => $books->MostReviewed(),
                'Latest' => $books->Latest(),
                'Most Rating' => $books->HighestRated(),
                default => $books,
            };
            $books = $books->get();
            return view('book.book_list', compact(['books', 'filters']));
        } catch (\Throwable $th) {

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('book.add_book');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddBookRequest $request)
    {
        $book = $request->validated();
        book::create($book);
        return redirect()->route('book.index')->with('message',"Book added sucessfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $book = book::with('review.user')->rating()->orderBy('created_at', 'desc')->find($id);

            return view('book.book_details', compact('book'));

        } catch (\Throwable $th) {

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book =book::find($id);
        return view('book.update_book',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookFormRequest $request, string $id)
    {
        $book_details =$request->validated();
        $book = book::find($id);
        $book->name = $book_details['name'];
        $book->author = $book_details['author'];
        if($book->save())
        return redirect()->route('book.index')->with('message',"book updated sucessfully!!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $book = book::findOrFail($id);
            $book->delete();
            return redirect()->route('book.index')->with('message', 'Book deleted successfully.');
        } catch (\Throwable $th) {
        }
    }
}
