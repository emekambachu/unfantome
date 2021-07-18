<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $receiver_name }},</h3>

<p>
    {{ $payer_name }} has made payment, kindly login, view the proof and approve.<br><br>

    <a href="{{ route('login-form') }}">Login</a><br><br>

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>



