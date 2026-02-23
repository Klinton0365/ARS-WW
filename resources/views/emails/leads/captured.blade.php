<x-mail::message>
# New Lead Captured

You have received a new lead from the website.

**Name:** {{ $lead->name }}  
**Phone:** {{ $lead->phone }}  
**Email:** {{ $lead->email ?: 'Not provided' }}  
**Service:** {{ $lead->service_type }}  
**Source:** {{ $lead->source }}  
**Message:** {{ $lead->message ?: 'Not provided' }}

<x-mail::button :url="route('admin.leads.show', $lead)">
View Lead
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
