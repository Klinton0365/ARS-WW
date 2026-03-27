<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You - ARS Wood Works</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f6f8;padding:32px 16px;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.08);">

    <!-- Header with Logo -->
    <tr>
        <td style="background:linear-gradient(135deg,#1E5FAE,#2980D9);padding:40px;text-align:center;">
            <h1 style="margin:0;color:#ffffff;font-size:24px;font-weight:700;letter-spacing:0.5px;">ARS WOOD WORKS</h1>
            <p style="margin:8px 0 0;color:rgba(255,255,255,0.8);font-size:13px;letter-spacing:2px;">CRAFTING SPACES THAT INSPIRE</p>
        </td>
    </tr>

    <!-- Greeting -->
    <tr>
        <td style="padding:36px 40px 0;">
            <h2 style="margin:0;color:#1a1a1a;font-size:20px;font-weight:700;">Thank You, {{ $lead->name }}!</h2>
            <p style="margin:12px 0 0;color:#4b5563;font-size:15px;line-height:1.7;">
                We have received your enquiry and our team is already reviewing it. One of our specialists will get back to you shortly to discuss your requirements.
            </p>
        </td>
    </tr>

    <!-- Enquiry Summary -->
    <tr>
        <td style="padding:24px 40px;">
            <div style="background:#f0f7ff;border-left:4px solid #1E5FAE;border-radius:0 10px 10px 0;padding:20px 24px;">
                <p style="margin:0 0 4px;color:#1E5FAE;font-size:13px;font-weight:700;letter-spacing:1px;">YOUR ENQUIRY SUMMARY</p>
                <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:12px;">
                    <tr>
                        <td style="padding:6px 0;font-size:13px;color:#6b7280;width:120px;">Service</td>
                        <td style="padding:6px 0;font-size:14px;color:#1a1a1a;font-weight:600;">{{ $lead->service_type }}</td>
                    </tr>
                    @if($lead->message)
                    <tr>
                        <td style="padding:6px 0;font-size:13px;color:#6b7280;vertical-align:top;">Message</td>
                        <td style="padding:6px 0;font-size:14px;color:#1a1a1a;line-height:1.5;">{{ $lead->message }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td style="padding:6px 0;font-size:13px;color:#6b7280;">Submitted On</td>
                        <td style="padding:6px 0;font-size:14px;color:#1a1a1a;">{{ now()->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>

    <!-- What Happens Next -->
    <tr>
        <td style="padding:0 40px 28px;">
            <h3 style="margin:0 0 16px;color:#1a1a1a;font-size:16px;font-weight:700;">What Happens Next?</h3>
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="padding:10px 0;vertical-align:top;width:40px;">
                        <div style="width:32px;height:32px;border-radius:50%;background:#e8f4fd;color:#1E5FAE;font-size:14px;font-weight:700;text-align:center;line-height:32px;">1</div>
                    </td>
                    <td style="padding:10px 0;padding-left:12px;">
                        <p style="margin:0;color:#1a1a1a;font-size:14px;font-weight:600;">Review & Assessment</p>
                        <p style="margin:4px 0 0;color:#6b7280;font-size:13px;">Our team will review your requirements within 24 hours.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 0;vertical-align:top;width:40px;">
                        <div style="width:32px;height:32px;border-radius:50%;background:#e8f4fd;color:#1E5FAE;font-size:14px;font-weight:700;text-align:center;line-height:32px;">2</div>
                    </td>
                    <td style="padding:10px 0;padding-left:12px;">
                        <p style="margin:0;color:#1a1a1a;font-size:14px;font-weight:600;">Personal Consultation</p>
                        <p style="margin:4px 0 0;color:#6b7280;font-size:13px;">A specialist will call you to discuss design ideas, materials, and budget.</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px 0;vertical-align:top;width:40px;">
                        <div style="width:32px;height:32px;border-radius:50%;background:#e8f4fd;color:#1E5FAE;font-size:14px;font-weight:700;text-align:center;line-height:32px;">3</div>
                    </td>
                    <td style="padding:10px 0;padding-left:12px;">
                        <p style="margin:0;color:#1a1a1a;font-size:14px;font-weight:600;">Custom Proposal</p>
                        <p style="margin:4px 0 0;color:#6b7280;font-size:13px;">Receive a detailed quotation and project timeline tailored to your needs.</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- CTA -->
    <tr>
        <td style="padding:0 40px 32px;text-align:center;">
            <a href="{{ route('projects') }}" style="display:inline-block;background:#1E5FAE;color:#ffffff;padding:14px 36px;border-radius:8px;font-size:14px;font-weight:600;text-decoration:none;letter-spacing:0.3px;">
                View Our Projects
            </a>
        </td>
    </tr>

    <!-- Divider -->
    <tr>
        <td style="padding:0 40px;">
            <div style="border-top:1px solid #e8ecf0;"></div>
        </td>
    </tr>

    <!-- Contact Info -->
    <tr>
        <td style="padding:24px 40px;text-align:center;">
            <p style="margin:0;color:#6b7280;font-size:13px;font-weight:600;">Need immediate assistance?</p>
            <p style="margin:8px 0 0;color:#1a1a1a;font-size:15px;">
                Call us at <a href="tel:+919876543210" style="color:#1E5FAE;text-decoration:none;font-weight:600;">+91 98765 43210</a>
            </p>
            <p style="margin:4px 0 0;color:#6b7280;font-size:13px;">Mon - Sat : 08:00 AM - 06:00 PM</p>
        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#1a1a1a;padding:28px 40px;text-align:center;">
            <p style="margin:0;color:#ffffff;font-size:14px;font-weight:600;">ARS Wood Works</p>
            <p style="margin:6px 0 0;color:rgba(255,255,255,0.6);font-size:12px;">Professional Wood & Interior Services</p>
            <div style="margin-top:16px;">
                <a href="#" style="display:inline-block;width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.1);color:#fff;text-align:center;line-height:32px;margin:0 4px;text-decoration:none;font-size:13px;">f</a>
                <a href="#" style="display:inline-block;width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.1);color:#fff;text-align:center;line-height:32px;margin:0 4px;text-decoration:none;font-size:13px;">in</a>
                <a href="#" style="display:inline-block;width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,0.1);color:#fff;text-align:center;line-height:32px;margin:0 4px;text-decoration:none;font-size:13px;">ig</a>
            </div>
            <p style="margin:16px 0 0;color:rgba(255,255,255,0.4);font-size:11px;">&copy; {{ date('Y') }} ARS Wood Works. All rights reserved.</p>
        </td>
    </tr>

</table>
</td></tr>
</table>
</body>
</html>
