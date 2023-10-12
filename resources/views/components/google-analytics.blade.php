@if ($google_analytics)
@php
$google_analytics = ($google_analytics->val) ?? '';
@endphp
<!-- Google tag (gtag.js) -->
<link rel="preload" href="https://www.googletagmanager.com/gtag/js?id={{ $google_analytics }}" as="script">
<script src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytics }}" as="script"></script>

{{-- <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytics }}"></script> --}}
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $google_analytics }}');
</script>
@endif
