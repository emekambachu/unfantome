<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $payer_name }},</h3>

<p>
    {{ $receiver_name }} has approved this payment, thank you for completing your investment.<br>
    You will be paired to receive yours immediately.

    <a href="{{ route('login-form') }}">Login</a><br><br>

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>
