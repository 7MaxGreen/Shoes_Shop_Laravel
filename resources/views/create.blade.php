@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Add a new pair of shoes</h2>

    <form action="/catalog" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
          <label for="brand"> Brand</label>
          <input type="text" class="form-control" name="brand" id="brand">
        </div>
        <div class="form-group">
            <label for="model"> Model</label>
            <input type="text" class="form-control" name="model" id="model">
          </div>
          <div class="form-group">
            <label for="type"> Type</label>
            <input type="text" class="form-control" name="type" id="type">
          </div>  
          <div class="form-group">
            <label for="color"> Color</label>
            <input type="text" class="form-control" name="color" id="color">
          </div> 
          <div class="form-group">
            <label for="size"> Size</label>
            <input type="number" class="form-control" name="size" id="size" min=5 max=100 step="0.25">
          </div>
          <div class="form-group">
            <label for="price"> Price</label>
            <input type="number" class="form-control" name="price" id="price">
          </div>

          <div class="form-group">
            <label for="image">Import image</label>
            <input type="file" class="form-control" name="image" id="image">
          </div>
          <br>
        <button id="submit" type="submit" class="btn btn-outline-primary">Submit</button>
      </form>

</div>

<script src="{{ asset("js/create_validate.js") }}"></script>
@endsection
