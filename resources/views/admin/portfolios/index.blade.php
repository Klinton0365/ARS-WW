@extends('layouts.admin')
@section('title', 'Portfolio | Admin')
@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;">
  <h2>Portfolio</h2>
  <a class="btn btn-primary" href="{{ route('admin.portfolios.create') }}">Add Item</a>
</div>
<div class="table-wrap card">
<table>
  <thead><tr><th>Title</th><th>Service Type</th><th>Order</th><th>Published</th><th>Actions</th></tr></thead>
  <tbody>
    @forelse($portfolios as $portfolio)
    <tr>
      <td>{{ $portfolio->title }}</td>
      <td>{{ $portfolio->service_type }}</td>
      <td>{{ $portfolio->sort_order }}</td>
      <td>{{ $portfolio->is_published ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.portfolios.edit', $portfolio) }}">Edit</a>
        <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio) }}" style="display:inline;">
          @csrf @method('DELETE')<button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="5">No entries yet.</td></tr>
    @endforelse
  </tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $portfolios->links() }}</div>
@endsection
