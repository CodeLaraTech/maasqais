<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Job Application</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f3f4f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    
                    <!-- Banner -->
                    <tr>
                        <td style="background-color: #3b82f6; padding: 30px; text-align: center;">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" width="80" alt="Application Icon" style="margin-bottom: 10px;">
                            <h2 style="margin: 0; color: #ffffff; font-size: 24px;">New Job Application Received</h2>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <p style="margin: 0 0 10px; color: #374151;"><strong>Name:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
                            <p style="margin: 0 0 10px; color: #374151;"><strong>Email:</strong> {{ $application->email }}</p>
                            <p style="margin: 0 0 10px; color: #374151;"><strong>Phone:</strong> {{ $application->phone }}</p>
                            <p style="margin: 0 0 10px; color: #374151;"><strong>Subject:</strong> {{ $application->subject }}</p>

                            <div style="margin-top: 20px;">
                                <p style="margin: 0 0 6px; color: #1f2937;"><strong>Message:</strong></p>
                                <p style="background-color: #f9fafb; padding: 15px; border-left: 4px solid #3b82f6; color: #111827; border-radius: 6px;">{{ $application->message }}</p>
                            </div>

                            @if ($application->resume)
                            <div style="margin-top: 20px;">
                                <p style="margin: 0 0 6px; color: #1f2937;"><strong>Resume:</strong> Attached</p>
                            </div>
                            @endif
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f3f4f6; text-align: center; padding: 20px; color: #6b7280; font-size: 12px;">
                            You received this message from your website job application form.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
