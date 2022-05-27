@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Dashboard</h2>
    <a class="text-dark" href={{route('create')}}>Create</a>
    <a class="text-dark" href={{route('catalog')}}>Read</a>
    <a class="text-dark" href={{route('update')}}>Update</a>
    <a class="text-dark" href={{route('delete')}}>Delete</a>
</div>

@endsection
