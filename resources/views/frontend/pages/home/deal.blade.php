{{-- OFFER SECTION --}}
@if (isset($deal_data))
    @foreach ($deal_data as $deal)
        @if ($deal->deal_type == 'daily')
            @if (!empty($deal->image) && file_exists(public_path() . '/frontend/deals/' . $deal->image))
                {{ __('frontend.home.index.daily_car_rental_offers') }}
                {{ __('frontend.home.index.enjoy_daily_car') }}

                {{ route('frontend.get_deal', ['slug' => 'daily']) }}
                {{ asset('frontend/deals/' . $deal->image) }}" alt="{{ __('frontend.home.index.enjoy_daily_car') }}
            @endif
        @break
    @endif
@endforeach
@endif
