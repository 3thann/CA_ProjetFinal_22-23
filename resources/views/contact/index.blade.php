@extends('layout.app')

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Contact</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="{{ route('generics.home') }}">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Contact</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contact Us</h4>
                <h1 class="display-4">Feel Free To Contact</h1>
            </div>
            <div class="row px-3 pb-2">
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Address</h4>
                    <p><a href="https://goo.gl/maps/nSwBZ4hWMmX9poP87">Champ de Mars, 5 Av. Anatole France, 75007 Paris, France</a></p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Phone</h4>
                    <a href="tel:+33102030405">+33 1 02 03 04 05</a>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Email</h4>
                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 pb-5">
                    <iframe style="width: 100%; height: 443px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10499.966498430253!2d2.2944813!3d48.8583701!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8ddca9ee380ef7e0!2sTour%20Eiffel!5e0!3m2!1sfr!2sfr!4v1670506614320!5m2!1sfr!2sfr"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                
                    </div>
                <div class="col-md-6 pb-5">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="control-group">
                                <input type="text" class="form-control bg-transparent p-4" name="name" placeholder="Your Name"
                                    required="required"/>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control bg-transparent p-4" name="email" placeholder="Your Email"
                                    required="required"/>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control bg-transparent p-4" name="subject" placeholder="Subject"
                                    required="required"/>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control bg-transparent py-3 px-4" rows="5" name="message" placeholder="Message"
                                    required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary font-weight-bold py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection