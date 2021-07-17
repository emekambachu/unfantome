<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $payer_name }},</h3>

<p>
    You've been matched to pay {{ $receiver_name }} CFA {{ number_format($amount) }} in {{ $time_limit }} hours.<br><br>

    You can contact them via {{ $receiver_email }} or {{ $receiver_mobile }}<br>

    <a href="{{ route('login-form') }}">Login</a><br><br>

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>



