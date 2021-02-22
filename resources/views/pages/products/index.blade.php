@extends('layouts.admin')
@section('content')
<h3>Product List</h3>

<div class="row my-4">
    <div class="col-md-4 offset-md-8 text-right">
        <a href="{{ route('products.create') }}">
            <button class="btn btn-primary">Add Product</button>
        </a>
    </div>
</div>

@if(session()->has('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "type": "POST",
                "dataType": "json",
                "url": "/products/list",
                "data": {  _token: $('meta[name="csrf-token"]').attr('content') }
            },
            "columns": [
                { "data": "image" },
                { "data": "name" },
                { "data": "price" },
                { "data": "quantity" },
                { "data": "id" }
            ]   
        });
    });
</script>
@endpush
@endsection