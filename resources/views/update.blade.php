@extends('layouts.app')

@section('content')
<div class="container">
 <h2>Update</h2>
<hr>


@if(!isset($sent)) 
<form action="/update" method="POST">
    @csrf
<select class="form-item" name="selected_shoe">
    @foreach($shoes as $shoe)
     <option value={{$shoe -> id}}> {{$shoe -> brand}}  {{$shoe -> model}}</option>
    @endforeach
</select>
<button class="btn btn-primary" type="submit">Update</button>
</form>

    @else
    <a href={{route('update')}}> back</a>
    <br>
    <form action="/catalog" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <input type="hidden" name="id" value={{$shoe -> id}}>
    <label for="price">Price</label>
    <input type="number" name="price" value={{$shoe->price}}>
    <input type="file" name="image" >
    <button type="submit">Save</button>
    </form>
    @endif
</div>
@endsection
