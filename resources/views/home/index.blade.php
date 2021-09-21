
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
    <link rel="icon" type="{{asset('images/'.optional($configweb)->picture)}}" href="{{asset('images/'.optional($configweb)->picture)}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('template_home/style.css')}}" type="text/css" />

    <!-- lightbox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
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
          <a href="#contact" class="btn btn-regular">Contact Me</a>
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
            <img src="{{asset('images/undraw/image1.png')}}" class="img-fluid" alt="Demo image">
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
        <div class="col-lg-3 col-md-4 col-12 mt-3">
            <div class="card mb-4">
                <a href="{{asset('images/'.$port->picture)}}" data-toggle="lightbox" class="card-img-top" data-footer="{{$port->port_info}}" data-max-width="600" data-gallery="example-gallery" data-title="{{$port->port_title}}">
                    <img class="img-fluid img-thumbnail" src="{{asset('images/'.$port->picture)}}" alt="{{$port->port_title}}" style="width: 100%; height: 200px;">
                </a>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$port->port_title}}</h5>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
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

  <footer id="contact">
    <div class="container">
        <h3>CONTACT ME</h3>
      <div class="row">
        <div class="col-md-6">
            @if (Session::get('message_sent'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message_sent')}}
                </div>
            @endif
            <form action="/sendmail"
            method="POST"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-12 mt-2">
                <input class="form-control" type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="col-12 mt-2">
                <input class="form-control" type="email" id="email" name="email" placeholder="Your Email" required>
                </div>
            </div>
            <div class="form-group mt-2">
                <textarea class="form-control" style="resize: none;" id="msg" name="msg" rows="4"  placeholder="Your Message" required></textarea>
            </div>
            <button class="btn btn-regular-footer" type="submit">Send</button>
        </form>
        </div>
        <div class="col-md-6">
          <h5>Address</h5>
          <h6>{{$user->address}}</h6>
          <h5>Phone</h5>
          <h6>+62{{$user->phone}}</h6>
          <h5>Email</h5>
          <h6>{{$user->email}}</h6>
          <h5>My Activity</h5>
          <a href="{{$user->akun_fb}}"><i class="icon ion-logo-facebook"></i></a>
            <a href="{{$user->akun_git}}"><i class="icon ion-logo-github"></i></a>
            <a href="{{$user->akun_linkedin}}"><i class="icon ion-logo-linkedin"></i></a>
        </div>
      </div> 
      <div class="divider"></div>
      <div class="row">
          <div class="col-md-12 col-xs-12">
            <small>&copy; 2021 | {{optional($configweb)->developer}}</small>
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
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
              event.preventDefault();
              $(this).ekkoLightbox();
        });
     </script>
  </body>
</html>