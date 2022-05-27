@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Catalog</h2>

        <form class="form-control" action="/sort" method="post">
        @csrf
            <select class="form-select" name="type">
            <option value="Sneakers">Sneakers</option>
            <option value="Boots">Boots</option>
            <option value="High heels">High heels</option>
        </select>
        <button class="btn btn-success" type="submit">Sort</button>
        </form>
                
        @foreach($shoes as $shoe)
        <div class="shoe">
            <img src={{'images/' . $shoe-> image}} height="200px">
            <p>{{$shoe -> brand}} {{$shoe -> model}}</p>
            <p>Type: {{$shoe -> type}} {{$shoe -> color}}</p>
            <p>Size: {{$shoe -> size}}</p>
            <small>Price: {{$shoe -> price}} £</small>
        <form action="/cart" method="POST">
            @csrf
            <input type="hidden" name="shoe_id" value={{$shoe -> id}}>
        
            <button class="btn btn-dark" type="submit">Add to Cart</button>
        </form>       
        </div>
                
        @endforeach
    </div>
</div>
@endsection
