@extends('layouts.app')
@section('content')
@if (session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!!!</strong>
        <span class="block sm:inline">{{ session('message') }}</span>
    </div>
@endif

<h1 class="mb-2 text-2xl">{{ $book->name }}</h1> <span>By {{$book->author}}</span>
<div class="flex items-center justify-center p-4  rounded-lg shadow-md">
    <form action="{{route('book.review.store',$book)}}" method="post" class="w-full space-y-4">
        @csrf
        <input type="text" name="review" autocomplete="off" value="{{old('review')}}" class="inpt w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none" placeholder="Enter Review">
     <span class="text-red-500 text-sm">  @error('review'){{$message}}@enderror</span>
    
        <select name="rating" id="" class="inpt w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none">
            <option value="">Select a rating</option>
            @for ($i=1;$i<=5;$i++)
            <option value="{{$i}}">{{$i}}</option>          
          @endfor
        </select>
        <span class="text-red-500 text-sm">  @error('rating'){{$message}}@enderror</span><br>
        <button type="submit" class="bg-transparent  font-semibold  py-2 px-4 border border-grey-500  rounded">Submit</button>
        <button type="reset" class="bg-transparent  font-semibold  py-2 px-4 mx-3 border border-grey-500  rounded :hover border-black-900">Clear</button>
<a href="{{route('book.show',$book)}}" class="bg-transparent  font-semibold  py-2 px-4 mx-3 border border-grey-500  rounded :hover border-black-900">Go Back</a>
    </form>
</div>



@endsection