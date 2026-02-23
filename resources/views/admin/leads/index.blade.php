@extends('layouts.admin')
@section('title', 'Leads | Admin')
@section('content')
<h2>Leads</h2>
<div class="table-wrap card">
<table>
  <thead><tr><th>Name</th><th>Phone</th><th>Email</th><th>Service</th><th>Source</th><th>Status</th><th>Action</th></tr></thead>
  <tbody>
    @forelse($leads as $lead)
    <tr>
      <td>{{ $lead->name }}</td>
      <td>{{ $lead->phone }}</td>
      <td>{{ $lead->email }}</td>
      <td>{{ $lead->service_type }}</td>
      <td>{{ $lead->source }}</td>
      <td>{{ $lead->status }}</td>
      <td><a href="{{ route('admin.leads.show', $lead) }}">Open</a></td>
    </tr>
    @empty
    <tr><td colspan="7">No leads captured yet.</td></tr>
    @endforelse
  </tbody>
</table>
</div>
<div style="margin-top:1rem;">{{ $leads->links() }}</div>
@endsection
