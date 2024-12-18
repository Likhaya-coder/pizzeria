<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZERIAN</title>

    <!--Bootstrap Files-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!--CSS Styling-->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/gallery.css">

    <!--Javascript files-->
    <script src="/js/FoodOrder.js"></script>
    <script src="/js/checkout.js"></script>

    <!--Font-Awesome-->
    <link rel="stylesheet" href="/fontawesome/css/all.min">
    <link rel="stylesheet" href="/fontawesome/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-danger" aria-label="Fourth navbar example">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="/"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item d-flex">
                <a class="nav-link active" data-bs-toggle="tooltip" data-bs-placement="top" title="Home" aria-current="page" href="/"><i class="fas fa-home me-2"></i></a> <span class="d-md-none d-block text-light pt-2"> Home</span>
              </li>
              <li class="nav-item d-flex">
                <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="top" title="Food" href="/orders/gallery/"><i class="fas fa-utensils me-2"></i></a> <span class="d-md-none d-block text-light pt-2"> Food</span>
              </li>
              <li class="nav-item  d-flex">
                <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="top" title="News" href="/orders/news/"><i class="fas fa-newspaper me-2"></i></a> <span class="d-md-none d-block text-light pt-2"> News</span>
              </li>
              <li class="nav-item d-flex">
                <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="top" title="AboutUs" href="/orders/about/"><i class="fas fa-question me-2"></i></a> <span class="d-md-none d-block text-light pt-2"> About</span>
              </li>
              <li class="nav-item d-flex">
                <a class="nav-link" data-bs-toggle="tooltip" data-bs-placement="top" title="ContactUs" href="/orders/contact/"><i class="fas fa-phone me-2"></i></a> <span class="d-md-none d-block text-light pt-2"> Contact</span>
              </li>

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            @if (Route::has('login'))
                <li class="d-flex">
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Sign-in" href="{{ route('login') }}" class="text-lg text-light mt-2 me-3"><i class="fas fa-sign-in-alt"></i></a> <span class="d-md-none d-block text-light pt-2"> Log-in</span>
                </li>
                <li class="d-flex pt-2 pt-none">
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Register" href="{{ route('register') }}" class="text-lg text-light me-3"><i class="fas fa-user-plus"></i></a> <span class="d-md-none d-block text-light"> Sign-up</span>
                </li>
            @endif
        </ul>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <form class="d-flex" action="'searchOrder')}}" method="GET">
              @csrf
              <input class="form-control me-2" name="search" type="text" placeholder="Search" aria-label="Search">
              <button type="submit" class="btn btn-dark btn-lg">Search</button>
            </form>
          </div>
        </div>
      </nav>

      @yield('content')

      <div id="footer" class="container-fluid pt-5 bg-dark">
          <div class="container">
              <div class="row text-center text-light">
                <div class="col-12 col-md-6 offset-md-3">
                    <h1 class="text-danger"><strong>Pizzeria</strong></h1>
                    <p>Lorem ipsum dolor sit amet, Cumque dolorum enim, excepturi consequuntur omnis optio at
                    incidunt aperiam expedita, ullam quae cupiditate ipsa nobis veritatis, voluptate voluptatem
                    necessitatibus.</p>
                </div>
              </div>
                <div class="row text-center text-light">
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="contact pt-3">
                            <h4 class="pb-3"><strong>Contact Us</strong></h4>
                            <a href="#"><i class="fas fa-phone"></i> +27 80 000 0000</a><br>
                            <a class="d-block" href="/orders/contact/"><i class="fas fa-envelope"></i> pizzzeria.admin@accounts.com</a>
                            <a href="#"><i class="fab fa-internet-explorer"></i> www.pizzeria.com</a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="links pt-3">
                            <h4 class="pb-3"><strong>Quick Links</strong></h4>
                            <p><a href="#">Our T&Cs</a></p>
                            <p><a href="#">Policy</a></p>
                            <p><a href="#">Privacy</a></p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="Social cursor-pointer pt-3">
                            <h4 class="pb-3"><strong>Get in touch</strong></h4>
                            <p><a class="p-0" href="#"><i class="fab fa-facebook"></i> Facebook</a></p>
                            <p><a class="p-0" href="#"><i class="fab fa-twitter"></i> Twitter</a></p>
                            <p><a class="p-0" href="#"><i class="fab fa-whatsapp"></i> Whatsapp</a></p>
                            <p><a class="p-0" href="#"><i class="fab fa-linkedin"></i> Linkedin</a></p>
                            <p><a class="p-0" href="#"><i class="fab fa-google"></i> Google</a></p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="Social cursor-pointer pt-3">
                            <h4 class="pb-3"><strong>Hours</strong></h4>
                            <p>Mon-Fri: 6AM-11PM</p>
                            <p>Sat-Sun: 6AM-1PM</p>
                            <p>Pub Holiday: 6AM-12PM</p>
                        </div>
                    </div>
                </div>
                <div class="row pt-3 text-center text-light border-top border-light w-100">
                    <div class="col-12">
                        <p class="lead"><strong>&copy 2022 Pizzeria. All rights reserved | Developed by <span class="text-danger">Likhaya Kulati</span></strong></p>
                    </div>
                </div>
            </div>
        </div>
    <script src="/js/gallery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
