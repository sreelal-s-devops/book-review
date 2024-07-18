@extends('layouts.app')
@section('content')
@if (session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-5" role="alert">
        <strong class="font-bold">Success!!!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
@endif
<form action="{{route('book.index')}}" class="flex mb-5  " >
  @csrf
    <input type="text" name="title" id="" placeholder="Search Book By Name" class="input flex" value="{{request('title')}}">
    <input type="hidden" name="filter" value="{{request('filter')}}">
    <button type="submit" class="btn flex mx-3">search </button>
    <a href="" type="reset" class="btn flex">clear</a>
    @if(Auth::user()->is_admin=='1')
    @method('get')
    <a href="{{route('book.create')}}" class="btn flex ml-4 w-1/4 ">Add Book</a>
    @endif
</form>
<div class="filter-container">
@foreach ($filters as $key => $value)
    <a href="{{ route('book.index', ['filter' => $key]) }}" 
       class="{{ request('filter') === $key || request('filter')===NULL && $key==='All Books' ? 'filter-item-active' : 'filter-item' }}">
       {{ $value }}
    </a>
@endforeach
</div>
<ul>
    @forelse ($books as $book)
      <li class="mb-4 shadow-2xl" >
        <div class="book-item">
          <div
            class="flex flex-wrap items-center justify-between ">
            <div class="w-full flex-grow ">
              <a href="{{route('book.show',$book->id)}}" class="book-title capitalize">{{ $book->name }}</a>
              <span class="book-author capitalize">by {{ $book->author }}</span>
              
            </div>
            <div>
              <div class="book-rating">
              <x-star :rating="number_format($book->review_avg_rating, 1)"></x-star>
              </div>
              <div class="book-review-count">
                out of {{ $book->review_count }} {{ Str::plural('review', $book->review_count) }}
              </div>
              @if (Auth::user()->is_admin=='1')
              <form action="{{route('book.destroy',$book)}}" method="post">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('are you sure to delete?')" class="btn mt-5">Delete Book</button>
                @method('get')
                <a class="btn mt-5" href="{{route('book.edit',$book)}}">Update Book</a>
                </form>
              @endif
            </div>
          </div>
        </div>
      </li>
    @empty
      <li class="mb-4">
        <div class="empty-book-item">
          <p class="empty-text">No books found</p>
          <a href="{{route('book.index')}}" class="reset-link">Refresh Here</a>
        </div>
      </li>
    @endforelse
  </ul>
@endsection