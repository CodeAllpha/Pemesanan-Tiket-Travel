 
 <!--Navbar-->
 <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="index.html"> <img src="{{url('frontend/image/logo Traveler.png')}}" alt="Logo" /> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item active">
          <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tiket Travel</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Link</a>
            <a class="dropdown-item" href="#">Link</a>
            <a class="dropdown-item" href="#">Link</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Testimonial</a>
        </li>
      
        @guest
         <!--Mobile Button-->
         <form class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0 "type="button"
          onclick="event.preventDefault(); location.href='{{url('login')}}';">
            Masuk
          </button>
         </form>

        <!--Dekstop Button-->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block">
          <button class="btn btn-login my-2 my-sm-0 px-4"type="button"
          onclick="event.preventDefault(); location.href='{{url('login')}}';">
            Masuk
          </button>
        </form>
      @endguest

      @auth
         <!--Mobile Button-->
         <form class="form-inline d-sm-block d-md-none"action="{{url('logout')}}"
          method="POST">
          @csrf
          <button class="btn btn-login my-2 my-sm-0 " type="submit">
            Keluar
          </button>
        </form>

        <!--Dekstop Button-->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block"action="{{url('logout')}}" 
        method="POST">
        @csrf
          <button class="btn btn-login  my-2 my-sm-0 px-4" type="submit">
            Keluar
          </button>
        </form>
      @endauth
    </ul>
      


    </div>
  </nav>
</div>
<!--Akhir Navbar-->