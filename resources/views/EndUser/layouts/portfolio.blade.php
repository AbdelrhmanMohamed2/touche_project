<div id="portfolio">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Gallery</h2>
            <hr>
            <p>{{ $settings[3]->value }}</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="categories">
                <ul class="cat">
                    <li>
                        <ol class="type">
                            <li><a href="{{ route('home.gallery') }}"
                                    class="{{ request()->route('id') ?? 'active' }}">All</a></li>
                            @foreach ($categories as $category)
                                <li><a class="{{ request()->route('id') == $category->id ? 'active' : '' }}"
                                        href="{{ route('home.gallery', $category->id) }}">{{ $category->name }}</a></li>
                            @endforeach

                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="portfolio-items">

                @foreach ($categories as $category)
                    @if (request()->route('id') && request()->route('id') == $category->id)
                        @foreach ($category->products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg">
                                        {{-- < href="{{ asset('uploads/products/' .  $product->image ) }}" title="{{ $product->name}}"
                                            data-lightbox-gallery="gallery1"> --}}
                                        <div class="hover-text">
                                            <h4>{{ $product->name }}</h4>
                                        </div>
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            class="{{ asset('EndUser') }}/img-responsive" alt="Project Title">
                                        {{-- </a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @elseif(!request()->route('id'))
                        @foreach ($category->products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
                                <div class="portfolio-item">
                                    <div class="hover-bg">
                                        {{-- <a href="{{ asset('uploads/products/' .  $product->image ) }}" title="{{ $product->name}}"
                                            data-lightbox-gallery="gallery1"> --}}
                                        <div class="hover-text">
                                            <h4>{{ $product->name }}</h4>
                                        </div>
                                        <img src="{{ asset('uploads/products/' . $product->image) }}"
                                            class="{{ asset('EndUser') }}/img-responsive" alt="Project Title">
                                        {{-- </a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach



            </div>
        </div>
    </div>
</div>
