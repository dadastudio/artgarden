<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ __('email.title') }}</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { text-align: center; padding: 20px 0; border-bottom: 1px solid #eee; margin-bottom: 20px; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; text-align: center; font-size: 12px; color: #777; }
        .field { margin-bottom: 10px; }
        .field-label { font-weight: bold; margin-right: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ __('email.header') }}</h1>
    </div>

    <div class="content">
        <div class="field">
            <span class="field-label">{{ __('email.name_label') }}:</span>
            <span>{{ $name }}</span>
        </div>

        <div class="field">
            <span class="field-label">{{ __('email.email_label') }}:</span>
            <span>{{ $email }}</span>
        </div>

        <div class="field">
            <span class="field-label">{{ __('email.phone_label') }}:</span>
            <span>{{ $phone }}</span>
        </div>

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

        <div class="field">
            <div class="field-label">{{ __('email.additional_info_label') }}:</div>
            <div>{{ $additional_info ?? __('email.no_additional_info') }}</div>
        </div>

        <div class="field">
            <span class="field-label">{{ __('email.survey_label') }}:</span>
            <span>{{ $survey }}</span>
        </div>
    </div>

    <div class="footer">
        {{ __('email.footer', ['year' => date('Y'), 'app_name' => config('app.name')]) }}
    </div>
</body>
</html>
