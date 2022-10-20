@inject ('wishListHelper', 'Webkul\Customer\Helpers\Wishlist')

@auth('customer')
    {!! view_render_event('bagisto.shop.products.wishlist.before') !!}

    <form id="wishlist-{{ $product->product_id }}" action="{{ route('customer.wishlist.add', $product->product_id) }}" method="POST">
        @csrf
    </form>

    {{-- @dd($product) --}}

    <a
        @if ($wishListHelper->getWishlistProduct($product))
            class="add-to-wishlist already"
            title="{{ __('shop::app.customer.account.wishlist.remove-wishlist-text') }}"
        @else
            class="add-to-wishlist"
            title="{{ __('shop::app.customer.account.wishlist.add-wishlist-text') }}"
        @endif
        id="wishlist-changer"
        style="margin-right: 15px;"
        href="javascript:void(0);"
        onclick="document.getElementById('wishlist-{{ $product->product_id }}').submit();
                dataLayer.push({ 'ecommerce': null });dataLayer.push({
                'event': 'add_to_wishlist',
                'currency': 'USD',
                'ecommerce': {
                        'items': [{
                        'item_id': '{{ $product->id }}',
                        'item_name': '{{ $product->name }}',
                        'item_brand': '',
                        'item_category': '',
                        'item_variant': '',
                        'currency': 'USD',
                        'price': '{{ $product->price }}'
                        }]
                    }
                });"
        >

        <span class="icon wishlist-icon" ></span>
    </a>

    {!! view_render_event('bagisto.shop.products.wishlist.after') !!}
@endauth
