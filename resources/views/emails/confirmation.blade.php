<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('email.confirmation_title') }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; padding: 20px 0; border-bottom: 1px solid #eee; margin-bottom: 20px; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; text-align: center; font-size: 12px; color: #777; }
        .field { margin-bottom: 10px; }
        .field-label { font-weight: bold; margin-right: 10px; }
        .details { background: #f9f9f9; padding: 15px; border-radius: 5px; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ __('email.confirmation_header') }}</h1>
    </div>

    <div class="content">
        <p>{{ __('email.greeting', ['name' => $name]) }},</p>
        
        <p>{{ __('email.confirmation_message') }}</p>

        <div class="details">
            <h3>{{ __('email.details_header') }}:</h3>
            <div class="field">
                <span class="field-label">{{ __('email.event_type_label') }}:</span>
                <span>{{ $type }}</span>
            </div>
            <div class="field">
                <span class="field-label">{{ __('email.date_label') }}:</span>
                <span>{{ \Carbon\Carbon::parse($date)->format('d.m.Y') }}</span>
            </div>
            <div class="field">
                <span class="field-label">{{ __('email.location_label') }}:</span>
                <span>{{ $location }}</span>
            </div>
        </div>

        <p>{{ __('email.contact_info', ['email' => config('mail.contact_email'), 'phone' => config('app.phone')]) }}</p>

        <p>{{ __('email.closing') }},<br>{{ __('email.team', ['app_name' => config('app.name')]) }}</p>
    </div>

    <div class="footer">
        {{ __('email.footer', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
    </div>
</body>
</html>
