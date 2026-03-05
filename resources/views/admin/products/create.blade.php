@extends('layouts.admin')
@section('title', 'Create Product')
@section('content')
    <h2>Create Product</h2>
    <form class="card" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @include('admin.products._form')
    </form>
@endsection
