<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
    <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-53CV677');
        </script>
    <!-- End Google Tag Manager -->

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-H69M84JED2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
    
            gtag('config', 'G-H69M84JED2');
        </script>
        
        {{-- title --}}
        <title>@yield('page_title')</title>

        {{-- meta data --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="base-url" content="{{ url()->to('/') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {!! view_render_event('bagisto.shop.layout.head') !!}

        {{-- for extra head data --}}
        @yield('head')

        {{-- seo meta data --}}
        @yield('seo')

        {{-- fav icon --}}
        @if ($favicon = core()->getCurrentChannel()->favicon_url)
            <link rel="icon" sizes="16x16" href="{{ $favicon }}" />
        @else
            <link rel="icon" sizes="16x16" href="{{ asset('/themes/velocity/assets/images/static/v-icon.png') }}" />
        @endif

        {{-- all styles --}}
        @include('shop::layouts.styles')
    </head>

    <body @if (core()->getCurrentLocale() && core()->getCurrentLocale()->direction === 'rtl') class="rtl" @endif>
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-53CV677"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        {!! view_render_event('bagisto.shop.layout.body.before') !!}

        {{-- main app --}}
        <div id="app">
            <product-quick-view v-if="$root.quickView"></product-quick-view>

            <div class="main-container-wrapper">

                @section('body-header')
                    {{-- top nav which contains currency, locale and login header --}}
                    @include('shop::layouts.top-nav.index')

                    {!! view_render_event('bagisto.shop.layout.header.before') !!}

                        {{-- primary header after top nav --}}
                        @include('shop::layouts.header.index')

                    {!! view_render_event('bagisto.shop.layout.header.after') !!}

                    <div class="main-content-wrapper col-12 no-padding">

                        {{-- secondary header --}}
                        <header class="row velocity-divide-page vc-header header-shadow active">

                            {{-- mobile header --}}
                            <div class="vc-small-screen container">
                                @include('shop::layouts.header.mobile')
                            </div>

                            {{-- desktop header --}}
                            @include('shop::layouts.header.desktop')

                        </header>

                        <div class="">
                            <div class="row col-12 remove-padding-margin">
                                <sidebar-component
                                    main-sidebar=true
                                    id="sidebar-level-0"
                                    url="{{ url()->to('/') }}"
                                    category-count="{{ $velocityMetaData ? $velocityMetaData->sidebar_category_count : 10 }}"
                                    add-class="category-list-container pt10">
                                </sidebar-component>

                                <div class="col-12 no-padding content" id="home-right-bar-container">
                                    <div class="container-right row no-margin col-12 no-padding">
                                        {!! view_render_event('bagisto.shop.layout.content.before') !!}

                                            @yield('content-wrapper')

                                        {!! view_render_event('bagisto.shop.layout.content.after') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @show

                <div class="container">
                    {!! view_render_event('bagisto.shop.layout.full-content.before') !!}

                        @yield('full-content-wrapper')

                    {!! view_render_event('bagisto.shop.layout.full-content.after') !!}
                </div>
            </div>

            {{-- overlay loader --}}
            <velocity-overlay-loader></velocity-overlay-loader>

            <go-top bg-color="#26A37C"></go-top>
        </div>

        {{-- footer --}}
        @section('footer')
            {!! view_render_event('bagisto.shop.layout.footer.before') !!}

                @include('shop::layouts.footer.index')

            {!! view_render_event('bagisto.shop.layout.footer.after') !!}
        @show

        {!! view_render_event('bagisto.shop.layout.body.after') !!}

        {{-- alert container --}}
        <div id="alert-container"></div>

        {{-- all scripts --}}
        @include('shop::layouts.scripts')
    </body>
</html>
