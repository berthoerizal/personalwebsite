<!doctype html>
<html lang="en-US">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="{{optional($configweb)->desc}}">
      <meta name="keywords" content="{{optional($configweb)->keywords}}">
      <meta name="author" content="{{optional($configweb)->developer}}">
      <meta name="type" content="{{optional($configweb)->type}}">
      <meta name="title" content="{{optional($configweb)->title}}">
      <meta name="profile" content="{{optional($configweb)->profile}}">
      <meta name="url" content="{{optional($configweb)->url}}">
      <meta name="site_name" content="{{optional($configweb)->site_name}}">
      <meta name="metadata" content="{{optional($configweb)->metadata}}">
      {{-- title and logo --}}
      <title>{{optional($configweb)->site_name}}</title>
	  <link href="{{ asset('images/'.optional($configweb)->picture)}}" rel="icon">
    <link href="{{ asset('images/'.optional($configweb)->picture)}}" rel="icon">
	   
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <!-- Custom Css -->
      <link rel="stylesheet" href="{{asset('template_home/style.css')}}" type="text/css" />
      <!-- lightbox -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Ionic icons -->
      <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">
      <!-- fontawesome -->
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
   </head>
   <body id="home">
      <nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="icon ion-md-menu"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="container">
               <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#home">Home <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#about">About <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#skill">Skill <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#portfolio">Portfolio <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#experience">Experience <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#certificate">Certificate <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
                  <li class="nav-item nav-custom-link">
                     <a class="nav-link" href="#contact">Contact <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <section id="hero">
         <div class="container">
            <div class="row">
               <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                  <img src="{{asset('images/'.$user->picture)}}" class="img-fluid" alt="Demo image">
               </div>
               <div class="col-md-7 content-box hero-content">
                  <h1> <b>{{$user->name}}</b><br>{{$user->job}}</h1>
                  <p>This is my personal website.</p>
                  <a href="/downloadcv" class="btn btn-regular">Download CV</a>
               </div>
            </div>
         </div>
      </section>
      <section id="about">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="content-box">
                     <h2>ABOUT ME</h2>
                     <p>{!!$user->about!!}</p>
                     <div class="row mt-2">
                        <div class="col-sm-4 col-4">
                           <div class="pb-1"><b>Age</b></div>
                        </div>
                        <div class="col-sm-8 col-8">
                           <div class="pb-1 text-secondary"><?php echo date("Y")-date("Y",strtotime($user->birthday)); ?></div>
                        </div>
                        <div class="col-sm-4 col-4">
                           <div class="pb-1"><b>Email</b></div>
                        </div>
                        <div class="col-sm-8 col-8">
                           <div class="pb-1 text-secondary">{{$user->email}}</div>
                        </div>
                        <div class="col-sm-4 col-4">
                           <div class="pb-1"><b>Phone</b></div>
                        </div>
                        <div class="col-sm-8 col-8">
                           <div class="pb-1 text-secondary">+62{{$user->phone}}</div>
                        </div>
                        <div class="col-sm-4 col-4">
                           <div class="pb-1"><b>Address</b></div>
                        </div>
                        <div class="col-sm-8 col-8">
                           <div class="pb-1 text-secondary">{{$user->address}}</div>
                        </div>
                        <div class="col-sm-4 col-4">
                           <div class="pb-1"><b>Study</b></div>
                        </div>
                        <div class="col-sm-8 col-8">
                           <div class="pb-1 text-secondary">{{$user->education}}<br><?php echo date("Y",strtotime($user->edu_date_start)); ?>-<?php echo date("Y", strtotime($user->edu_date_finish)); ?></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <img src="{{asset('images/undraw/undraw_Developer_activity_re_39tg.png')}}" class="img-fluid" alt="Demo image">
               </div>
            </div>
         </div>
      </section>
      <section id="skill">
         <div class="container">
            <div class="title-block">
               <h2>MY SKILLS</h2>
            </div>
            <div class="row">
               @foreach ($skills as $skill)
               <div class="col-md-4 col-sm-6 col-6">
                  <div class="testimonial-box">
                     <div class="row personal-info">
                        <div class="col-md-2 col-xs-2">
                           <div class="profile-picture review-one"></div>
                        </div>
                        <div class="col-md-10 col-xs-10">
                           <h6>{{$skill->skill_title}}</h6>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </section>
      <section id="portfolio">
         <div class="container">
            <div class="title-block">
               <h2>MY PORTFOLIO</h2>
            </div>
            <div class="row">
                @foreach ($ports as $port)
               <!-- Gallery item -->
               <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="testimonial-box">
                     <a href="{{asset('images/'.$port->picture)}}" data-toggle="lightbox" class="card-img-top" data-footer="{{$port->port_info}}" data-max-width="800" data-gallery="example-gallery" data-title="{{$port->port_title}}">
						 <div class="d-flex justify-content-center">
                     <img src="{{asset('images/'.$port->picture)}}" alt="{{$port->port_title}}" class="img-fluid card-img-top" style="width: auto; height: 200px;">
						 </div>
                     </a>
                     <div class="p-4">
                        <h5> <a href="#" class="text-dark">{{$port->port_title}}</a></h5>
                     </div>
                  </div>
               </div>
               <!-- End -->
               @endforeach
            </div>
         </div> <!-- / container -->
      </section>
      <section id="experience">
         <div class="container">
            <div class="title-block">
               <h2>MY EXPERIENCE</h2>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="timeline">
                     @foreach ($exps as $exp)
                     <div class="timeline-card timeline-card-primary card shadow-sm">
                        <div class="card-body">
                           <div class="h5 mb-1">{{$exp->exp_title}}<span class="text-muted h6"> | <?php echo date("m/Y", strtotime($exp->exp_date_start)); ?>-<?php echo date("m/Y", strtotime($exp->exp_date_finish)); ?></span></div>
                           <div class="text-muted text-small mb-2">{{$exp->exp_place}}</div>
                           <div>{{$exp->exp_info}}</div>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section id="certificate">
         <div class="container">
            <div class="title-block" style="margin-bottom: 70px;">
               <h2>MY CERTIFICATE</h2>
            </div>
            <div class="row photos">
               @foreach ($certifs as $certif)
                <div class="col-sm-6 col-md-4 col-lg-3 item"><a href="{{asset('images/'.$certif->picture)}}" data-lightbox="photos"><img class="img-fluid" src="{{asset('images/'.$certif->picture)}}" alt="{{$certif->cer_title}}"></a></div>
                @endforeach
            </div>
         </div> <!-- / container -->
      </section>
      <footer class="footer" id="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <h5><i class="fa fa-road"></i> GET IN TOUCH.</h5>
                  <div class="row">
                     <div class="col-4">
                        <ul class="list-unstyled">
                           <li>Address</li>
                           <li>Phone</li>
                           <li>Email</li>
                        </ul>
                     </div>
                     <div class="col-8">
                        <ul class="list-unstyled">
                           <li>{{$user->address}}</li>
                           <li>+62{{$user->phone}}</li>
                           <li>{{$user->email}}</li>
                        </ul>
                     </div>
                  </div>
                  <ul class="nav">
                     <li class="nav-item"><a href="{{$user->akun_fb}}" class="nav-link pl-0"><i class="fa fa-facebook fa-lg"></i></a></li>
                     <li class="nav-item"><a href="{{$user->akun_git}}" class="nav-link"><i class="fa fa-github fa-lg"></i></a></li>
                     <li class="nav-item"><a href="{{$user->akun_linkedin}}" class="nav-link"><i class="fa fa-linkedin-square fa-lg"></i></a></li>
                     <li class="nav-item"><a href="https://api.whatsapp.com/send?phone=6281266096662" class="nav-link"><i class="fa fa-whatsapp fa-lg"></i></a></li>
                  </ul>
                  <br>
               </div>
               <div class="col-md-2">
                  <h5 class="text-md-right">CONTACT ME</h5>
                  <hr>
               </div>
               <div class="col-md-5">
                  @if (Session::get('message_sent'))
                  <div class="alert alert-light" role="alert">
                     {{Session::get('message_sent')}}
                  </div>
                  @endif
                  <form action="/sendmail" method="POST" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <fieldset class="form-group">
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Name" required>
                     </fieldset>
                     <fieldset class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter email" required>
                     </fieldset>
                     <fieldset class="form-group">
                        <textarea class="form-control" name="msg" id="exampleMessage" placeholder="Message" required></textarea>
                     </fieldset>
                     <fieldset class="form-group text-xs-right">
                        <button type="submit" class="btn btn-secondary-outline btn-lg">Send</button>
                     </fieldset>
                  </form>
               </div>
            </div>
         </div>
      </footer>
      <!-- External JavaScripts -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
      <script>
         $(document).on('click', '[data-toggle="lightbox"]', function(event) {
               event.preventDefault();
               $(this).ekkoLightbox();
         });
      </script>
   </body>
</html>