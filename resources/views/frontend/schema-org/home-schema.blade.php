{{-- <script type="application/ld+json">
      @if(!empty(home_page_schema()))
            "<?php echo home_page_schema(); ?>";
      @endif
</script> --}}
@php $faq_schema = faq_schema(); @endphp
@if(!empty($faq_schema))

<script type="application/ld+json">
    {{ $faq_schema }};
</script>
@endif

{{--  <script type="application/ld+json">
      @if(!empty(home_page_image_schema()))
            "<?php echo home_page_image_schema(); ?>";
      @endif
</script>  --}}
