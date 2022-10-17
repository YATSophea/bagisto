{!! view_render_event('bagisto.shop.products.add_to_cart.before', ['product' => $product]) !!}

<button
    type="submit"
    class="btn btn-lg btn-primary addtocart"
    onclick="dataLayer.push({ 'ecommerce': null });dataLayer.push({
        'event': 'add_to_cart',
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
    {{ ! $product->isSaleable() ? 'disabled' : '' }}
>
    {{ $product->type == 'booking' ? __('shop::app.products.book-now') : __('shop::app.products.add-to-cart') }}
</button>

{!! view_render_event('bagisto.shop.products.add_to_cart.after', ['product' => $product]) !!}
