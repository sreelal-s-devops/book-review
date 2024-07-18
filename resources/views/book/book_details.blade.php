@extends('layouts.app')

@section('content')
<div class="mb-4">
  <h1 class="mb-2 text-2xl">{{ $book->name }}</h1>

  <div class="book-info">
    <div class="book-author mb-4 text-lg font-semibold">by {{ $book->author }}</div>
    <div class="book-rating flex items-center">
      <div class="mr-2 text-sm font-medium text-slate-700">
        <x-star :rating="number_format($book->review_avg_rating, 1)" />
      </div>
      <span class="book-review-count text-sm text-gray-500">
        {{ $book->review_count }} {{ Str::plural('review', $book->review_count) }}
      </span>
    </div>
  </div>
</div>

<div>
  <div class="flex flex-col">

    <h2 class="mb-4 text-xl font-semibold">Reviews</h2>
    <div class="flex flex-cols">

      <a href="{{route('book.review.create', $book)}}"
        class="btn w-1/4 mb-5">Add Review</a>
        <a href="{{route('book.index', $book)}}"
        class="btn w-1/6 ml-5 mb-5">Back</a>
    </div>
  </div>

  <ul>
    @forelse ($book->review as $review)
    <li class="book-item mb-4">
      <div>
      <div class="mb-2 flex items-center justify-between">
        <div class="font-semibold">
        <x-star :rating="number_format($review->rating)" />
        </div>
        <div class="book-review-count">
        {{ $review->created_at->format('M d, Y h:i A') }}

        </div>
      </div>
      <p class="text-gray-700">{{ $review->review }}</p>
      <p class="text-gray-700 ">Commented By </p><p class="italic">{{ $review->user->name }}</p>

      </div>
    </li>
  @empty
  <li class="mb-4">
    <div class="empty-book-item">
    <p class="empty-text text-lg font-semibold">No reviews yet</p>
    </div>
  </li>
@endforelse
  </ul>
</div>

@endsection