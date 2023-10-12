{{-- About Us SECTION --}}
@if (!empty($cms_section_about_us->page_body))
    <section class="fix_about_scroll" style="padding: 60px 0">
        <div class="container">
            <div class="row justify-content-center fix_scroll">
                {!! $cms_section_about_us->page_body !!}
            </div>
        </div>
    </section>
@endif
