@extends('layouts.admin')
@section('title', 'Edit Service')
@section('content')
<h2>Edit Service</h2>
<form class="card" method="POST" action="{{ route('admin.services.update', $service) }}">
  @method('PUT')
  @include('admin.services._form')
</form>
@endsection
