@extends('layouts.admin')
@section('title', 'Lead Details | Admin')
@section('content')
<h2>Lead: {{ $lead->name }}</h2>
<div class="card">
  <p class="meta"><strong>Phone:</strong> {{ $lead->phone }}</p>
  <p class="meta"><strong>Email:</strong> {{ $lead->email ?: 'N/A' }}</p>
  <p class="meta"><strong>Service:</strong> {{ $lead->service_type }}</p>
  <p class="meta"><strong>Source:</strong> {{ $lead->source }}</p>
  <p class="meta"><strong>Message:</strong> {{ $lead->message ?: 'N/A' }}</p>
  <form method="POST" action="{{ route('admin.leads.update', $lead) }}">
    @csrf
    @method('PUT')
    <div class="form-row">
      <select name="status" required>
        @foreach(['new' => 'New', 'in_progress' => 'In Progress', 'closed' => 'Closed'] as $value => $label)
          <option value="{{ $value }}" @selected($lead->status === $value)>{{ $label }}</option>
        @endforeach
      </select>
    </div>
    <textarea name="admin_notes" placeholder="Internal Notes">{{ old('admin_notes', $lead->admin_notes) }}</textarea>
    <div style="margin-top:1rem;"><button class="btn btn-primary" type="submit">Update Lead</button></div>
  </form>
</div>
@endsection
