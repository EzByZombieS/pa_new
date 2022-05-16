<x-webLayout title="Home">
    <div class="intro11-slider-wrap section-2 mrl-50">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="intro11-section swiper-slide slide-4 slide-bg-2 bg-position">
                    <div class="intro11-content-2 text-center">
                        <h1 class="different-title">Welcome</h1>
                        <h2 class="title">2020 Flower Trend</h2>
                        <a href="product-details.html" class="btn flosun-button secondary-btn theme-color rounded-0">Shop Now</a>
                    </div>
                </div>
                <div class="intro11-section swiper-slide slide-3 slide-bg-2 bg-position">
                    <div class="intro11-content text-left">
                        <h3 class="title-slider text-uppercase">Top Trend</h3>
                        <h2 class="title">Flowers and Candle <br> Birthday Gift</h2>
                        <p class="desc-content">Lorem ipsum dolor sit amet, pri autem nemore bonorum te. Autem fierent ullamcorper ius no, nec ea quodsi invenire. </p>
                        <a href="product-details.html" class="btn flosun-button secondary-btn rounded-0">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="product-area mt-text-2 mb-text-3">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">Wonderful gift</span>
                        <h3 class="section-title-3">Our Product</h3>
                    </div>
                </div>
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
							@foreach ($collection as $item)
                            <div class="single-item swiper-slide">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="{{ route('product.show',$item->id) }}">
                                            <img src="{{ asset('asset/gambar/'.$item->image_product) }}" alt="" style="height: 300px" class="product-image-1 w-100">
                                            <img src="{{ asset('asset/gambar/'.$item->image_product) }}" alt="" style="height: 300px" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{ route('product.show',$item->id) }}">{{ $item->name_product }}</a></h4>
                                        </div>
                                        <div class="price-box">
											<span class="regular-price ">Rp. {{ $item->price_product }}</span>
                                        </div>
                                        <a href="{{ route('product.show',$item->id) }}" title="Quick View" class="btn product-cart">View...</a>
                                    </div>
                                </div>
                            </div>
							@endforeach
                        </div>
                        <div class="swiper-pagination default-pagination"></div>
						<br>
						<div class="section-title text-center mb-30"><a href="{{ route('product.index') }}">See More . . .</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-webLayout>