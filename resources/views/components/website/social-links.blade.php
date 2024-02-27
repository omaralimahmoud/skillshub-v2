<ul class="footer-social">
    @if ($facebook->value !== null)
        <li><a href="{{ $facebook->value }}" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
    @endif

    @if ($instagram->value !== null)
        <li><a href="{{ $instagram->value }}" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
    @endif

</ul>
