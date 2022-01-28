@extends('layouts.app')

@section('title')
    Detail
@endsection
@section('content')
<main>
    <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <div class="row">
            <div class="col p-0">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    Paket Travel
                  </li>
                  <li class="breadcrumb-item active">
                     Detail
                  </li>
                </ol>
              </nav>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-8 pl-lg-0">
            <div class="card card-details">
              <h1>{{$item->title}}</h1>
              <p>
                {{$item->location}}
              </p>
              @if ($item->galleries->count())
              <div class="gallery">
                <div class="xzoom-container">
                  <img src="{{Storage::url($item->galleries->first()->image)}}" class="xzoom" id="xzoom-default" xoriginal="{{Storage::url($item->galleries->first()->image)}}">
                </div>
                <div class="xzoom-thumbs">
                  @foreach ($item->galleries as $gallery)
                    <a href="{{Storage::url($gallery->image)}}">
                    <img src="{{Storage::url($gallery->image)}}" class="xzoom-gallery" width="157" xpreview="{{Storage::url($gallery->image)}}">
                    </a>
                  @endforeach      
                 </div>
              </div>
              @endif
              <h2>About Mondstat</h2>
              <p>
                {!! $item->about !!}
              </p>
              <div class="features row">
                <div class="col-md-4 ">
                  <img src="{{url('frontend/image/Event Summer.jpg')}}" alt="" class="features-image">
                  <div class="description">
                    <h3>Featured Event</h3>
                    <p>{{$item->featured_event}}</p>
                  </div>
                </div>
                <div class="col-md-4 border-left">
                  <img src="{{url('frontend/image/Languagee.jpg')}}" alt="" class="features-image">
                  <div class="description">
                    <h3>Language</h3>
                    <p>{{$item->language}}</p>
                  </div>
                </div>
                <div class="col-md-4 border-left">
                  <img src="{{url('frontend/image/foods.jpg')}}" alt="" class="features-image">
                  <div class="description">
                    <h3>Food</h3>
                    <p>{{$item->foods}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-details card-right">
              <h2>Members Are Going</h2>
            <div class="members my-1">
                <img src="{{url('frontend/image/icon Noele.jpg')}}" alt="" class="member-image mr-1">
                <img src="{{url('frontend/image/icon Keqing.jpg')}}" alt="" class="member-image mr-1">
                <img src="{{url('frontend/image/Icon Xiao.jpg')}}" alt="" class="member-image mr-1">
                <img src="{{url('frontend/image/icon Diluc.jpg')}}" alt="" class="member-image mr-1">
              <hr>
              <h2>Information</h2>
              <table class="information" >
                <tr>
                  <th width="50%">Date of Depature</th>
                  <td width="50%" class="text-right">
                    {{\Carbon\Carbon::create($item->depature_date)->format('F n , Y')}}
                  </td>
                </tr>
                <tr>
                  <th width="50%">Duration</th>
                  <td width="50%" class="text-right">
                    {{$item->duration}}
                  </td>
                </tr>
                <tr>
                  <th width="50%">Type of trip</th>
                  <td width="50%" class="text-right">
                    {{$item->type}}
                  </td>
                </tr>
                <tr>
                  <th width="50%">Price</th>
                  <td width="50%" class="text-right">
                    ${{$item->price}}00 / person
                  </td>
                </tr>
              </table>
            </div>
            <div class="join-container">
              @auth
                <form action="{{route('checkout_process', $item->id)}}" method="POST">
                  @csrf
                  <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                    Join Now
                  </button>
                </form>
              @endauth
              @guest
              <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-4 py-2">
                Login or Register to Join
              @endguest
              </a>
            </div>
          </div>
        </div>
        </div>
      </section>
  </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
<script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          tint: '#333',
          xoffset: 15
        });
      });
    </script>
@endpush

