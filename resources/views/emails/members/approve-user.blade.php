<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $name }},</h3>

<p>
    @if($approved)
    Your account has been approved, you are now able to login.

    <a href="{{ route('login-form') }}">Login</a><br><br>
    @else
    Your account has been deactivated, you are unable to login.<br> Please contact info@unfantome.com.
    @endif

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>
