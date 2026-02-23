@extends('layouts.admin')
@section('title', 'Edit Catalog Item')
@section('content')
<h2>Edit Catalog Item</h2>
<form class="card" method="POST" action="{{ route('admin.catalogs.update', $catalog) }}" enctype="multipart/form-data">
  @method('PUT')
  @include('admin.catalogs._form')
</form>
@endsection
