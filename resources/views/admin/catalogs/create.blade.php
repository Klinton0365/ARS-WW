@extends('layouts.admin')
@section('title', 'Create Catalog Item')
@section('content')
<h2>Create Catalog Item</h2>
<form class="card" method="POST" action="{{ route('admin.catalogs.store') }}" enctype="multipart/form-data">
  @include('admin.catalogs._form')
</form>
@endsection
