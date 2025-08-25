<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nowa wiadomość z formularza kontaktowego</title>
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
        <h1>Nowa wiadomość z formularza kontaktowego</h1>
    </div>

    <div class="content">
        <div class="field">
            <span class="field-label">Imię i nazwisko:</span>
            <span>{{ $name }}</span>
        </div>

        <div class="field">
            <span class="field-label">Email:</span>
            <span>{{ $email }}</span>
        </div>

        <div class="field">
            <span class="field-label">Telefon:</span>
            <span>{{ $phone }}</span>
        </div>

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

        <div class="field">
            <div class="field-label">Dodatkowe informacje:</div>
            <div>{{ $additional_info ?? 'Brak dodatkowych informacji' }}</div>
        </div>

        <div class="field">
            <span class="field-label">Jak się dowiedział/a o nas:</span>
            <span>{{ $survey }}</span>
        </div>
    </div>

    <div class="footer">
        © {{ date('Y') }} {{ config('app.name') }}. Wszelkie prawa zastrzeżone.
    </div>
</body>
</html>
