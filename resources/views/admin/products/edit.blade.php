@extends('layouts.admin')
@section('title', 'Edit Product')
@section('content')
    <h2>Edit Product</h2>
    <form class="card" method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.products._form')
    </form>
@endsection
