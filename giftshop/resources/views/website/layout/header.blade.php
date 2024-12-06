 
 <?php
 @include('sweetalert::alert')
 ?>
 
 <!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{url('website/images/favicon.png')}}" type="image/x-icon">

  <title>
    Gift Shop
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css  " />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{url('website/css/bootstrap.css')}}" />

  <!-- Custom styles for this template -->
  <link href="{{url('website/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{url('website/css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
 <!-- header section strats -->
 <div class="hero_area">
 <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="index">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shop">
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="why">
                Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testimonial">
                Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacts">Contact Us</a>
            </li>
            <?php
              if(session()->get('user_id'))
              {
                ?>
                  <li class="nav-item">
                    <a class="nav-link" href="profile">Profile</a>
                  </li>
                <?php
              }
              ?>
          </ul>
          <div class="user_option">

          <?php
              if(session()->get('user_id'))
              {
                ?>
                <a href="user_logout"><i class="fa fa-user" aria-hidden="true"></i><span>Logout</span></a>
              <?php
              }
              else
              {
                ?>
                 <a href="user_login"><i class="fa fa-user" aria-hidden="true"></i><span>Login</span></a>
              <?php
              }
          ?>
           
            <a href="">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    </div>
  <!-- end hero area -->
