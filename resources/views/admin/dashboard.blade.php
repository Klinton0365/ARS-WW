@extends('layouts.admin')

@section('title', 'Dashboard | ARS Admin')

@section('content')
<h2>Dashboard</h2>
<div class="grid grid-3" style="margin-bottom:1rem;">
  <div class="card"><strong>{{ $stats['services'] }}</strong><p class="meta">Services</p></div>
  <div class="card"><strong>{{ $stats['projects'] }}</strong><p class="meta">Projects</p></div>
  <div class="card"><strong>{{ $stats['portfolio'] }}</strong><p class="meta">Portfolio</p></div>
  <div class="card"><strong>{{ $stats['catalog'] }}</strong><p class="meta">Catalog</p></div>
  <div class="card"><strong>{{ $stats['new_leads'] }}</strong><p class="meta">New Leads</p></div>
</div>

<div class="card">
  <h3>Latest Leads</h3>
  <div class="table-wrap">
    <table>
      <thead><tr><th>Name</th><th>Phone</th><th>Service</th><th>Status</th><th>Action</th></tr></thead>
      <tbody>
        @forelse($latestLeads as $lead)
        <tr>
          <td>{{ $lead->name }}</td>
          <td>{{ $lead->phone }}</td>
          <td>{{ $lead->service_type }}</td>
          <td>{{ $lead->status }}</td>
          <td><a href="{{ route('admin.leads.show', $lead) }}">View</a></td>
        </tr>
        @empty
        <tr><td colspan="5">No leads yet.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
