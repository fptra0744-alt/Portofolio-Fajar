<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9fafb; padding: 40px;">
    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; padding: 32px;">
        <h2 style="color: #2563eb; margin-bottom: 20px;">📬 Pesan Baru dari Portofolio</h2>
        
        <table style="width: 100%; font-size: 14px; color: #374151;">
            <tr>
                <td style="padding: 8px 0; font-weight: bold; width: 100px;">Nama</td>
                <td style="padding: 8px 0;">{{ $data['nama'] }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Email</td>
                <td style="padding: 8px 0;">
                    <a href="mailto:{{ $data['email'] }}" style="color: #2563eb;">
                        {{ $data['email'] }}
                    </a>
                </td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Subjek</td>
                <td style="padding: 8px 0;">{{ $data['subjek'] }}</td>
            </tr>
        </table>

        <hr style="margin: 24px 0; border: none; border-top: 1px solid #e5e7eb;">

        <p style="font-weight: bold; margin-bottom: 8px;">Pesan:</p>
        <p style="color: #4b5563; line-height: 1.6;">{{ $data['pesan'] }}</p>

        <hr style="margin: 24px 0; border: none; border-top: 1px solid #e5e7eb;">

        <p style="font-size: 12px; color: #9ca3af; text-align: center;">
            Email ini dikirim dari form contact portofolio Fajar Putra Eswan.
            Balas langsung untuk menghubungi {{ $data['nama'] }}.
        </p>
    </div>
</body>
</html>