@extends('layouts.admin')
@section('title', 'Catalog | Admin')
@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;">
  <h2>Catalog</h2>
  <a class="btn btn-primary" href="{{ route('admin.catalogs.create') }}">Add Catalog Item</a>
</div>
<div class="table-wrap card">
<table>
  <thead><tr><th>Name</th><th>Category</th><th>Published</th><th>Actions</th></tr></thead>
  <tbody>
    @forelse($catalogs as $catalog)
    <tr>
      <td>{{ $catalog->name }}</td>
      <td>{{ $catalog->category }}</td>
      <td>{{ $catalog->is_published ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.catalogs.edit', $catalog) }}">Edit</a>
        <form method="POST" action="{{ route('admin.catalogs.destroy', $catalog) }}" style="display:inline;">
          @csrf @method('DELETE')<button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="4">No catalog items yet.</td></tr>
    @endforelse
  </tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $catalogs->links() }}</div>
@endsection
