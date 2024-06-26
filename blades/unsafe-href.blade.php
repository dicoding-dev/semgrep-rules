<!-- ok: unsafe-href -->
<a href="{{{ urlize($url) }}}" class="dashboard-nav__link"></a>

<!-- ok: unsafe-href -->
<div value="{{{ $url }}}" class="dashboard-nav__link"></div>

<!-- ok: unsafe-href -->
<a href="{{{ route('users.show', ['id' => $userId]) }}}"></a>

<!-- ruleid: unsafe-href -->
<a href="{{{ $url }}}" class="dashboard-nav__link"></a>

<!-- ok: unsafe-href -->
<a href="#{{{ $url }}}"></a>

<!-- ok: unsafe-href -->
<a href=" #{{{ $url }}}"></a>

<!-- ok: unsafe-href -->
<a href="#-{{{ $url }}}"></a>

<!-- ruleid: unsafe-href -->
<a href="{{{ $url . '#' . $something }}}"></a>