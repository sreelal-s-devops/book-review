@extends('layouts.app')
@section('content')
<div class="flex items-center justify-center p-4  rounded-lg">
    <form action="{{route('book.store')}}" method="post" class="w-full space-y-4">
        @csrf
        <input type="text" name="name" autocomplete="off" value="{{old('name')}}" class="input"
            placeholder="Enter Book Name">
        <span class="text-red-500 text-sm"> @error('name'){{$message}}@enderror</span>
        <input type="text" name="author" autocomplete="off" value="{{old('author')}}" class="input"
            placeholder="Enter Author Name">
        <span class="text-red-500 text-sm"> @error('author'){{$message}}@enderror</span><br>

        <button type="submit" class="btn">Submit</button>
        <button type="reset" class="btn">Clear</button>
        <a href="{{route('book.index')}}" class="btn">Go Back</a>
    </form>
</div>
@endsection