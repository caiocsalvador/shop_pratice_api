@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Awesome Shop
        @endcomponent
    @endslot

    # {{ $content['title'] }}

    Your products will arrive soon:

    @foreach($content['products'] as $product)
        {{$product['name']}}
    @endforeach


    {{-- Subcopy --}}
    @slot('subcopy')
        @component('mail::subcopy')
            <!-- subcopy here -->
        @endcomponent
    @endslot


    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
            © 2017 Awesome Shop. All rights reserved.            
        @endcomponent
    @endslot
@endcomponent
