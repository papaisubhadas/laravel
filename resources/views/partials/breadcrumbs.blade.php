@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

        @if (!is_null($breadcrumb->url) && !$loop->last)
            <li class="breadcrumb-item breadcrumb_fix " aria-current="page">
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            </li>
        @else
            <li class="breadcrumb-item breadcrumb_fix_active active " aria-current="page">{{ $breadcrumb->title }}</li>
        @endif

        @endforeach
    </ol>
@endunless