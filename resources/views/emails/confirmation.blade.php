<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Potwierdzenie otrzymania wiadomości</title>
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
        <h1>Dziękujemy za wiadomość!</h1>
    </div>

    <div class="content">
        <p>Cześć {{ $name }},</p>
        
        <p>Otrzymaliśmy Twoją wiadomość. Skontaktujemy się z Tobą tak szybko, jak to możliwe.</p>

        <div class="details">
            <h3>Szczegóły zgłoszenia:</h3>
            <div class="field">
                <span class="field-label">Typ wydarzenia:</span>
                <span>{{ $type }}</span>
            </div>
            <div class="field">
                <span class="field-label">Data:</span>
                <span>{{ \Carbon\Carbon::parse($date)->format('d.m.Y') }}</span>
            </div>
            <div class="field">
                <span class="field-label">Lokalizacja:</span>
                <span>{{ $location }}</span>
            </div>
        </div>

        <p>W razie dodatkowych pytań, prosimy o kontakt pod adresem <a href="mailto:{{ config('mail.contact_email') }}">{{ config('mail.contact_email') }}</a> lub numerem telefonu {{ config('app.phone') }}.</p>

        <p>Pozdrawiamy,<br>Zespół {{ config('app.name') }}</p>
    </div>

    <div class="footer">
        © {{ date('Y') }} {{ config('app.name') }}. Wszelkie prawa zastrzeżone.
    </div>
</body>
</html>
