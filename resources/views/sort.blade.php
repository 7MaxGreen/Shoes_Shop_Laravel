@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <a href="/catalog">&larr; Back</a>
        <h2>{{$type}}</h2>
                
        @foreach($shoes as $shoe)
        <div class="shoe">
            <img src={{'images/' . $shoe-> image}} height="200px">
            <p>{{$shoe -> brand}} {{$shoe -> model}}</p>
            <p>Type: {{$shoe -> type}} {{$shoe -> color}}</p>
            <p>Size: {{$shoe -> size}}</p>
            <small>Price: {{$shoe -> price}} £</small>
        </div>
        <hr>

                
        @endforeach
    </div>
</div>
@endsection
