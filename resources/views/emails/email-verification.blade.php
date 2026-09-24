<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Verify Your Email – Soulmate India</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f8;font-family:'Segoe UI',Arial,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f8;padding:40px 0;">
  <tr>
    <td align="center">
      <table width="600" cellpadding="0" cellspacing="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:20px;overflow:hidden;box-shadow:0 10px 40px rgba(0,0,0,0.12);">

        <!-- Header -->
        <tr>
          <td style="background:linear-gradient(135deg,#E91E63 0%,#9c27b0 100%);padding:50px 40px;text-align:center;">
            <div style="display:inline-block;background:rgba(255,255,255,0.15);border-radius:50%;width:80px;height:80px;line-height:80px;font-size:36px;margin-bottom:20px;">
              💌
            </div>
            <h1 style="color:#ffffff;margin:0;font-size:28px;font-weight:700;letter-spacing:-0.5px;">Verify Your Email</h1>
            <p style="color:rgba(255,255,255,0.85);margin:12px 0 0;font-size:16px;">One more step to complete your Soulmate India profile</p>
          </td>
        </tr>

        <!-- Body -->
        <tr>
          <td style="padding:48px 48px 32px;">
            <p style="font-size:17px;color:#374151;margin:0 0 16px;font-weight:600;">Hi {{ $userName }} 👋</p>
            <p style="font-size:15px;color:#6b7280;line-height:1.7;margin:0 0 32px;">
              Thank you for joining <strong style="color:#E91E63;">Soulmate India</strong>! To activate your account and become discoverable by other members, please verify your email address by clicking the button below.
            </p>

            <!-- CTA Button -->
            <div style="text-align:center;margin:0 0 36px;">
              <a href="{{ $verificationUrl }}"
                 style="display:inline-block;background:linear-gradient(135deg,#E91E63,#9c27b0);color:#ffffff;text-decoration:none;font-size:17px;font-weight:700;padding:18px 48px;border-radius:50px;letter-spacing:0.5px;box-shadow:0 8px 24px rgba(233,30,99,0.35);">
                ✅ &nbsp; Verify My Email
              </a>
            </div>

            <p style="font-size:13px;color:#9ca3af;line-height:1.6;margin:0 0 8px;">
              If the button doesn't work, copy and paste this link into your browser:
            </p>
            <p style="font-size:12px;color:#E91E63;word-break:break-all;background:#fdf2f8;padding:12px 16px;border-radius:8px;border-left:3px solid #E91E63;margin:0 0 32px;">
              {{ $verificationUrl }}
            </p>

            <!-- Divider -->
            <hr style="border:none;border-top:1px solid #f0f0f0;margin:0 0 28px;"/>

            <!-- Info box -->
            <div style="background:#fdf9ff;border-radius:12px;padding:20px 24px;border:1px solid #f3e8ff;">
              <p style="margin:0 0 8px;font-size:14px;color:#6b21a8;font-weight:600;">⚠️ This link expires in 24 hours</p>
              <p style="margin:0;font-size:13px;color:#9ca3af;line-height:1.6;">If you didn't create an account on Soulmate India, you can safely ignore this email. No action is needed.</p>
            </div>
          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td style="background:#fafafa;padding:28px 48px;text-align:center;border-top:1px solid #f0f0f0;">
            <p style="margin:0 0 6px;font-size:20px;font-weight:800;color:#E91E63;letter-spacing:-0.5px;">
              💞 Soulmate India
            </p>
            <p style="margin:0;font-size:12px;color:#9ca3af;">
              Finding your perfect companion, one connection at a time.
            </p>
            <p style="margin:16px 0 0;font-size:11px;color:#d1d5db;">
              © {{ date('Y') }} Soulmate India. All rights reserved.
            </p>
          </td>
        </tr>

      </table>
    </td>
  </tr>
</table>

</body>
</html>
