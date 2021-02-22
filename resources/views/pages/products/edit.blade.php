@extends('layouts.admin')
@section('content')
<h3>Edit Product</h3>

@if(session()->has('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="row my-4">
    <div class="col-md-4 offset-md-8 text-right">
        <a href="{{ route('products') }}">
            <button class="btn btn-primary">Back to List</button>
        </a>
    </div>
</div>


<form action="{{ route('products.update') }}" method="POST" >
@csrf
<input type="hidden" name="id" value="{{ $product->id }}">
  <div class="mb-3">
    <label for="name" class="form-label">Produt Name</label>
    <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control"  aria-describedby="name">
    @error('name')
    <div class="text-small">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" id="price" name="price" value="{{ $product->price }}"  class="form-control"  aria-describedby="price">
    @error('price')
    <div class="text-small">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="quantity" class="form-label">Quantity</label>
    <input type="text" id="quantity" name="quantity" value="{{ $product->quantity }}"  class="form-control" aria-describedby="quantity">
    @error('quantity')
    <div class="text-small">{{ $message }}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection