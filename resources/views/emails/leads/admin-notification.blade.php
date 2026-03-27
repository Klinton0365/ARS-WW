<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Lead Notification</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8;padding:32px 16px;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);">

    <!-- Header -->
    <tr>
        <td style="background:linear-gradient(135deg,#1E5FAE,#2980D9);padding:32px 40px;text-align:center;">
            <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:700;letter-spacing:0.5px;">ARS WOOD WORKS</h1>
            <p style="margin:6px 0 0;color:rgba(255,255,255,0.85);font-size:13px;letter-spacing:1px;">NEW LEAD NOTIFICATION</p>
        </td>
    </tr>

    <!-- Alert Badge -->
    <tr>
        <td style="padding:28px 40px 0;text-align:center;">
            <div style="display:inline-block;background:#e8f4fd;color:#1E5FAE;padding:8px 20px;border-radius:20px;font-size:13px;font-weight:600;">
                New enquiry received on {{ now()->format('d M Y, h:i A') }}
            </div>
        </td>
    </tr>

    <!-- Lead Details -->
    <tr>
        <td style="padding:24px 40px;">
            <table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #e8ecf0;border-radius:10px;overflow:hidden;">
                <tr style="background:#f8fafb;">
                    <td style="padding:14px 20px;font-size:13px;color:#6b7280;font-weight:600;width:140px;border-bottom:1px solid #e8ecf0;">Customer Name</td>
                    <td style="padding:14px 20px;font-size:14px;color:#1a1a1a;font-weight:600;border-bottom:1px solid #e8ecf0;">{{ $lead->name }}</td>
                </tr>
                <tr>
                    <td style="padding:14px 20px;font-size:13px;color:#6b7280;font-weight:600;border-bottom:1px solid #e8ecf0;">Phone</td>
                    <td style="padding:14px 20px;font-size:14px;color:#1a1a1a;border-bottom:1px solid #e8ecf0;">
                        <a href="tel:{{ $lead->phone }}" style="color:#1E5FAE;text-decoration:none;">{{ $lead->phone }}</a>
                    </td>
                </tr>
                <tr style="background:#f8fafb;">
                    <td style="padding:14px 20px;font-size:13px;color:#6b7280;font-weight:600;border-bottom:1px solid #e8ecf0;">Email</td>
                    <td style="padding:14px 20px;font-size:14px;color:#1a1a1a;border-bottom:1px solid #e8ecf0;">
                        @if($lead->email)
                            <a href="mailto:{{ $lead->email }}" style="color:#1E5FAE;text-decoration:none;">{{ $lead->email }}</a>
                        @else
                            <span style="color:#9ca3af;">Not provided</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="padding:14px 20px;font-size:13px;color:#6b7280;font-weight:600;border-bottom:1px solid #e8ecf0;">Service Required</td>
                    <td style="padding:14px 20px;font-size:14px;color:#1a1a1a;border-bottom:1px solid #e8ecf0;">
                        <span style="background:#fef3c7;color:#92400e;padding:4px 12px;border-radius:12px;font-size:12px;font-weight:600;">{{ $lead->service_type }}</span>
                    </td>
                </tr>
                <tr style="background:#f8fafb;">
                    <td style="padding:14px 20px;font-size:13px;color:#6b7280;font-weight:600;border-bottom:1px solid #e8ecf0;">Source</td>
                    <td style="padding:14px 20px;font-size:14px;color:#1a1a1a;border-bottom:1px solid #e8ecf0;">{{ ucfirst(str_replace('_', ' ', $lead->source)) }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:14px 20px;font-size:13px;color:#6b7280;font-weight:600;border-bottom:1px solid #e8ecf0;">Message</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding:14px 20px;font-size:14px;color:#1a1a1a;line-height:1.6;">
                        {{ $lead->message ?: 'No message provided.' }}
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- CTA Button -->
    <tr>
        <td style="padding:8px 40px 32px;text-align:center;">
            <a href="{{ route('admin.leads.show', $lead) }}" style="display:inline-block;background:#1E5FAE;color:#ffffff;padding:14px 36px;border-radius:8px;font-size:14px;font-weight:600;text-decoration:none;letter-spacing:0.3px;">
                View Lead in Dashboard
            </a>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#f8fafb;padding:20px 40px;border-top:1px solid #e8ecf0;text-align:center;">
            <p style="margin:0;color:#9ca3af;font-size:12px;">This is an automated notification from your website contact form.</p>
            <p style="margin:6px 0 0;color:#9ca3af;font-size:12px;">ARS Wood Works &mdash; Professional Wood & Interior Services</p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
