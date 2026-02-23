@extends('layouts.admin')
@section('title', 'Edit Portfolio Item')
@section('content')
<h2>Edit Portfolio Item</h2>
<form class="card" method="POST" action="{{ route('admin.portfolios.update', $portfolio) }}" enctype="multipart/form-data">
  @method('PUT')
  @include('admin.portfolios._form')
</form>
@endsection
