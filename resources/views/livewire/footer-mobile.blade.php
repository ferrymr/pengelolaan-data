<div class="footer-device-mobile">
    <div class="wapper">
        <div class="footer-device-mobile-item device-home">
            <a href="{{ route('home') }}">
                <span class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </span>
                Home
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-cart">
            <a href="{{ route('mycart') }}">
                <span class="icon">
                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="count-icon">
                        {{ $cartTotal }}
                    </span>
                </span>
                <span class="text">Cart</span>
            </a>
        </div>
        <div class="footer-device-mobile-item device-home device-user">
            <a href="{{ route('profile.index') }}">
                <span class="icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                Account
            </a>
        </div>
    </div>
</div>