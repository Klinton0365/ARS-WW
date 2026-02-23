@extends('layouts.admin')
@section('title', 'Create Service')
@section('content')
<h2>Create Service</h2>
<form class="card" method="POST" action="{{ route('admin.services.store') }}">
  @include('admin.services._form')
</form>
@endsection
