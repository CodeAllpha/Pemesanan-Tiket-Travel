@extends('layouts.success')

@section('title')
    Success    
@endsection


@section('content')
<main>
    <div class="section-success d-flex align-items-center">
      <div class="col text-center">
        <img src="{{url('frontend/image/success.png')}}" alt="" />
        <h1>Yay! Success</h1>
        <p>
          We’ve sent you email for trip
          <br />
          instruction please read it well
        </p>
        <a href="/" class="btn btn-home-page"> Home Page </a>
      </div>
    </div>
  </main>
@endsection
