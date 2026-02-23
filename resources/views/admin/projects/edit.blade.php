@extends('layouts.admin')
@section('title', 'Edit Project')
@section('content')
<h2>Edit Project</h2>
<form class="card" method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
  @method('PUT')
  @include('admin.projects._form')
</form>
@endsection
