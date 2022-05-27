@extends('layouts.app')

@section('content')
<div class="container">
 <h2>Delete</h2>
 <hr>
 @foreach ($shoes as $shoe) 
 <div>
     <p>{{$shoe->brand}} {{$shoe->model}} {{$shoe->price}}</p>
     <a class="btn btn-danger" href="/delete/{{$shoe->id}}">Delete</a>

     <form action="/catalog" method="POST">
    @method('DELETE')
    @csrf 
    <input type="hidden" name="id" value={{$shoe -> id}}> 
    <button type="submit" class="btn btn-outline-danger">Delete</button>

    </form>
 </div>
 @endforeach
</div>
@endsection
