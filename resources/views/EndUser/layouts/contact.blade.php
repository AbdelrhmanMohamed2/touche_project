<div id="contact" class="text-center">
    <div class="container">
        <div class="section-title text-center">
            <h2>Contact Form</h2>
            <hr>
            <p>{{ $settings[6]->value }}</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <form   method="POST" action="{{route('home.message')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="@auth{{ auth()->user()->name }}@endauth"
                                required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" id="email" class="form-control" placeholder="Email" name="email" value="@auth{{ auth()->user()->email }}@endauth"
                                required="required">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <div id="success"></div>
                <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
            </form>
        </div>
    </div>
</div>
