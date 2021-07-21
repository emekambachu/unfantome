<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $receiver_name }},</h3>

<p>
    {{ $payer_name }} is unable to make payment, you will be matched to another payer.<br><br>

    <a href="{{ route('login-form') }}">Login</a><br><br>

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>



