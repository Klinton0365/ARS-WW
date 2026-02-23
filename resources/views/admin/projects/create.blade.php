@extends('layouts.admin')
@section('title', 'Create Project')
@section('content')
<h2>Create Project</h2>
<form class="card" method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
  @include('admin.projects._form')
</form>
@endsection
