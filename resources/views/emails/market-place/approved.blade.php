<img src="{{ asset('images/unfantome_logo.png') }}" width="100">

<h3>Dear {{ $name }},</h3>

<p>
    @if($approved)
        Your product, <strong>{{ $product_name }}</strong> has been published.<br>
        It's now available in the marketplace

        <a href="{{ route('login-form') }}">Login</a><br><br>
    @else
        Your product, <strong>{{ $product_name }}</strong> has been blocked.<br>
        It's no more available at the marketplace.<br> Please contact info@unfantome.com.
    @endif

    Best regards,<br>
    The Team
</p>

<p align="center">contact <strong>info@unfantome.com</strong> for more info.</p>
