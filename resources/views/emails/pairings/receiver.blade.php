<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $receiver_name }},</h3>

<p>
    You've been matched to receive CFA {{ number_format($amount) }} from {{ $payer_name }}.<br><br>

    You can contact them via {{ $payer_email }} or {{ $payer_mobile }}<br>

    <a href="{{ route('login-form') }}">Login</a><br><br>

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>



