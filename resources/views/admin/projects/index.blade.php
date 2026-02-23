@extends('layouts.admin')
@section('title', 'Projects | Admin')
@section('content')
<div style="display:flex;justify-content:space-between;align-items:center;">
  <h2>Projects</h2>
  <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Add Project</a>
</div>
<div class="table-wrap card">
<table>
  <thead><tr><th>Title</th><th>Category</th><th>Featured</th><th>Published</th><th>Actions</th></tr></thead>
  <tbody>
    @forelse($projects as $project)
    <tr>
      <td>{{ $project->title }}</td>
      <td>{{ $project->category }}</td>
      <td>{{ $project->is_featured ? 'Yes' : 'No' }}</td>
      <td>{{ $project->is_published ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" style="display:inline;">
          @csrf @method('DELETE')<button type="submit">Delete</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="5">No projects yet.</td></tr>
    @endforelse
  </tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $projects->links() }}</div>
@endsection
