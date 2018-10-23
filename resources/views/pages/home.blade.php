@extends('layouts.master')
@section('styles')
<style>
      
</style>
@endsection
@section('contents')
 <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong style="color:#fcfdff;text-shadow: 5px 5px 20px #0b6aa8;">KSM CRYSTAL WATER<br> AT YOUR SERVICE</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="mb-5"  style="color:white!important;text-shadow: 5px 5px 5px #000000;padding-top:80px;">KSM Crystal Water help you with your small business.</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">KSM Crystal Water got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">KSM Crystal Water provides what you really need. We prioritize healthy and clean mineral water.</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started with our services!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">KSM Crystal Water At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Clean Water</h3>
              <p class="text-muted mb-0">Our facility make sure all product is  clean as crystals</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-truck text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Ready to Deliver</h3>
              <p class="text-muted mb-0">Just place an order online or Walk in. We'll proccess it right away</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Up to Date</h3>
              <p class="text-muted mb-0">We update you for our latest offers.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Made with Love</h3>
              <p class="text-muted mb-0">Our products keeps you fresh and healthy</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
           @if(count($products)>0)
               @foreach($products as $product)
            <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="img/portfolio/fullsize/{{$product->image}}">
              <img class="img-fluid rounded-circle" src="img/portfolio/thumbnails/{{$product->image}}" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                   {{$product->categorie}}
                  </div>
                  <div class="project-name">
                    {{$product->name}}
                  </div>
                </div>
              </div>
            </a>
          </div>
               @endforeach
           @endif
    
        </div>
      </div>
    </section>

    <section class="bg-primary text-white">
      <div class="container text-center">
        <h2 class="mb-4">Free Delivery at your doorsteps!</h2>
        <a class="btn btn-light btn-xl sr-button" href="{{ route('customer.register')}}">Register now!</a>
        <h3 class="">OR</h3>
        <a class="btn btn-light btn-xl sr-button" href="{{ route('customerLogin')}}">Login</a>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your  business with us? Be our reseller and accumulate a big discount and special items through our membership points system.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>09193317525</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">ksmcrystalwater@gmail.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>

@endsection