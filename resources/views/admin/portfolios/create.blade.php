@extends('layouts.admin')
@section('title', 'Create Portfolio Item')
@section('content')
<h2>Create Portfolio Item</h2>
<form class="card" method="POST" action="{{ route('admin.portfolios.store') }}" enctype="multipart/form-data">
  @include('admin.portfolios._form')
</form>
@endsection
