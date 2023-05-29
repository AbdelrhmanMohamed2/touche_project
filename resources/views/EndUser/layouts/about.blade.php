<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 ">
                <div class="about-img"><img src="{{ asset('EndUser') }}/img/about.jpg"
                        class="{{ asset('EndUser') }}/img-responsive" alt=""></div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>Our Restaurant</h2>
                    <hr>
                    <p>{{ $settings[0]->value }}</p>
                    <h3>Awarded Chefs</h3>
                    <p>{{ $settings[1]->value }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
