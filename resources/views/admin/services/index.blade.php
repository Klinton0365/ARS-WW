@extends('layouts.admin')
@section('title', 'Services | Admin')
@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;">
  <h2>Services</h2>
  <a class="btn btn-primary" href="{{ route('admin.services.create') }}">Add Service</a>
</div>
<div class="table-wrap card">
<table>
  <thead><tr><th>Name</th><th>Slug</th><th>Order</th><th>Active</th><th>Actions</th></tr></thead>
  <tbody>
    @forelse($services as $service)
    <tr>
      <td>{{ $service->name }}</td><td>{{ $service->slug }}</td><td>{{ $service->sort_order }}</td>
      <td>{{ $service->is_active ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.services.edit', $service) }}">Edit</a>
        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="display:inline;">
          @csrf @method('DELETE')<button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="5">No services yet.</td></tr>
    @endforelse
  </tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $services->links() }}</div>
@endsection
