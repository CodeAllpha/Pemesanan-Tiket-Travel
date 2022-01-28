@extends('layouts.app')


@section('title')
Traveler
@endsection


@section('content')
     <!--Header-->
     <header class="text-center">
        <h1>
          <span>Explore</span> The World
          <br>
          As Easy <span>One Click</span>
        </h1>
        <p class="mt-4">You Will see beautiful
          <br>
          moment you never see before
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">
          Get Started
        </a>
      </header>
      <!--Akhir Header-->
  
      <!--Main Content-->
      <main>
        <div class="container">
          <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3   stats-detail">
              <h2>1M MEMBERS</h2>
            </div>
            <div class="col-3  stats-detail">
              <h2>7 COUNTRIES</h2>
            </div>
            <div class="col-3  stats-detail">
              <h2>5K HOTELS</h2>
            </div>
            <div class="col-3  stats-detail">
              <h2>2 PARTNERS</h2>
            </div>
          </section>
        </div>
  
        <section class="section-popular" id="popular">
          <div class="container">
            <div class="row">
              <div class="col text-center section-popular-heading">
                <h2>Wisata Popular</h2>
                <p>Something that you never try
                  <br>
                  before this world 
                </p>
              </div>
            </div>
          </div>
        </section>
  
        <section class="section-popular-content" id="popular-content">
          <div class="container">
            <div class="section-popular-travel row justify-content-center">
             @foreach ($items as $item)
             <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card-travel text-center d-flex flex-column"
              style="background-image: url('{{$item->galleries->count()? Storage::url($item->galleries->first()->image) : ''}}');">
                <div class="travel-country">{{$item->location}}</div>
                <div class="travel-location">{{$item->title}}</div>
                <div class="travel-button mt-auto">
                  <a href="{{route('Detail',$item->slug)}}" class="btn btn-travel-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
            
             @endforeach
            </div>
          </div>
        </section>
  
        <section class="section-networks">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <h2>Our Networks</h2>
                <p>Companies are trusted us
                  <br>
                  more than just a trip
                </p>
              </div>
              <div class="col md-8 text-center">
                <img src="frontend/image/partner.jpg" alt="Logo Partner" class="img-partner">
              </div>
            </div>
          </div>
        </section>
        
        <section class="section-testimonial-heading" id="testimonial heading">
          <div class="container">
            <div class="row">
              <div class="col text-center">
                <h2>They are Loving us</h2>
                <p>Moment were giving them
                  <br>
                  the best experience
                </p>
              </div>
            </div>
          </div>
        </section>
  
        <section class="section section-testimonial-content"id="testimonial Content">
          <div class="container">
            <div class="section-popular-travel row justify-content-center">
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                  <div class="testimonial-content">
                    <img src="frontend/image/Ganyu.jpg" alt="user"
                    class="mb-4 rounded-cirlce">
                    <h3 class="mb-4">Ganyu</h3>
                    <p class="testimonial">
                      it was glorious and i could
                      not stop to say wohooo for
                      every single moment
                      Dankeeee
                    </p>
                  </div>
                  <hr>
                  <p class="trip-to mt-2">
                    Trip to Dragonspine
                  </p>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                  <div class="testimonial-content">
                    <img src="frontend/image/Hutao.jpg" alt="user"
                    class="mb-4 rounded-cirlce">
                    <h3 class="mb-4">Hutao</h3>
                    <p class="testimonial">
                      it was glorious and i could
                      not stop to say wohooo for
                      every single moment
                      Dankeeee
                    </p>
                  </div>
                  <hr>
                  <p class="trip-to mt-2">
                    Trip to Inazuma
                  </p>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                  <div class="testimonial-content">
                    <img src="frontend/image/Eula.jpg" alt="user"
                    class="mb-4 rounded-cirlce">
                    <h3 class="mb-4">Eula</h3>
                    <p class="testimonial">
                      it was glorious and i could
                      not stop to say wohooo for
                      every single moment
                      Dankeeee
                    </p>
                  </div>
                  <hr>
                  <p class="trip-to mt-2">
                    Trip to Liyue
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 text-center">
                <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                  I Need Help
                </a>
                <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">
                  Get Started
                </a>
              </div>
            </div>
          </div>
        </section>
      </main>
  
      <!--Akhir Main Content-->
@endsection