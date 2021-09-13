<!DOCTYPE html>
<html lang="en-US">
   <head>
      {{-- meta --}}
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      {{-- link internet --}}
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin"/>
      <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'"/>
      <noscript>
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap"/>
      </noscript>
      {{-- link public --}}
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link href="{{asset('template_home/css/aos.css?ver=1.2.0')}}" rel="stylesheet">
      <link href="{{asset('template_home/css/main.css?ver=1.2.0')}}" rel="stylesheet">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{asset('template_admin/plugins/fontawesome-free/css/all.min.css')}}">
      <noscript>
         <style type="text/css">
            [data-aos] {
            opacity: 1 !important;
            transform: translate(0) scale(1) !important;
            }
         </style>
      </noscript>
   </head>
   <body id="home">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#skill">Skill</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#experience">Experience</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <div class="cover shadow-lg bg-white card" style="margin-top: 65px;">
            <div class="cover-bg p-3 p-lg-4 text-dark">
                <div class="row" style="padding: 0 50px;">
                    <div class="col-md-4">
                    <div class="avatar hover-effect bg-white" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px;"><img src="{{asset('images/'.$user->picture)}}" width="200" height="200"/></div>
                    </div>
                    <div class="col-md-8 text-left text-md-start mb-4">
                    <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">{{$user->name}}</h2>
                    <h5 data-aos="fade-left" data-aos-delay="100" class="mb-3">{{$user->job}}</h5>
                    <div class="d-print-none" data-aos="fade-left" data-aos-delay="200"><a class="btn btn-dark text-wihte mr-2" href="right-resume.pdf" target="_blank">Download CV</a></div>
                    </div>
                </div>
            </div>
            <div class="about-section pt-4 px-3 px-lg-4 mt-5" id="about">
                <div class="row" style="padding: 0 50px;">
                    <div class="col-md-6">
                    <h2 class="h3 mb-4">About Me</h2>
                    <p>{!!$user->about!!}</p>
                    </div>
                    <div class="col-md-5 offset-md-1">
                    <div class="row mt-2">
                        <div class="col-sm-3 col-3">
                            <div class="pb-1"><b>Age</b></div>
                        </div>
                        <div class="col-sm-9 col-9">
                            <div class="pb-1 text-secondary"><?php echo date("Y")-date("Y",strtotime($user->birthday)); ?></div>
                        </div>
                        <div class="col-sm-3 col-3">
                            <div class="pb-1"><b>Email</b></div>
                        </div>
                        <div class="col-sm-9 col-9">
                            <div class="pb-1 text-secondary">{{$user->email}}</div>
                        </div>
                        <div class="col-sm-3 col-3">
                            <div class="pb-1"><b>Phone</b></div>
                        </div>
                        <div class="col-sm-9 col-9">
                            <div class="pb-1 text-secondary">+62{{$user->phone}}</div>
                        </div>
                        <div class="col-sm-3 col-3">
                            <div class="pb-1"><b>Address</b></div>
                        </div>
                        <div class="col-sm-9 col-9">
                            <div class="pb-1 text-secondary">{{$user->address}}</div>
                        </div>
                        <div class="col-sm-3 col-3">
                            <div class="pb-1"><b>Study</b></div>
                        </div>
                        <div class="col-sm-9 col-9">
                            <div class="pb-1 text-secondary">{{$user->education}}<br><?php echo date("Y",strtotime($user->edu_date_start)); ?>-<?php echo date("Y", strtotime($user->edu_date_finish)); ?></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="skills-section px-3 px-lg-4" id="skill">
                <div class="row" style="padding: 0 50px;">
                    <div class="col-md-12">
                    <h2 class="h3 mb-4">Skills</h2>
                    </div>
                    @foreach ($skills as $skill)
                    <div class="col-md-3 col-sm-6 col-6 mb-4">
                        <div class="card-content">
                            <div class="card" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;  background-image: url({{asset('images/skill_picture1.png')}}); background-repeat: no-repeat;
                                background-size: 50px 50px; background-color: #EAECF0;">
                                <div class="card-body">
                                <p class="card-title text-center"><b>{{$skill->skill_title}}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="work-experience-section px-3 px-lg-4" id="portfolio">
                <div class="row" style="padding: 0 50px;">
                    <div class="col-md-12">
                    <h2 class="h3 mb-4">Portfolio</h2>
                    </div>
                    @foreach ($ports as $port)
                    <div class="col-lg-3 col-md-4 col-6">
                    <div class="card mb-4">
                        <a href="{{asset('images/'.$port->picture)}}" data-toggle="lightbox" class="card-img-top" data-footer="{{$port->port_info}}" data-max-width="600" data-gallery="example-gallery" data-title="{{$port->port_title}}">
                            <img class="img-fluid img-thumbnail" src="{{asset('images/'.$port->picture)}}" alt="{{$port->port_title}}" style="width: 100%; height: 200px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{$port->port_title}}</h5>
                        </div>
                    </div>
                    </div>

                    {{-- <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox">
                    <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
                </a> --}}
                    @endforeach
                </div>
            </div>
            <hr class="d-print-none"/>
            <div class="work-experience-section px-3 px-lg-4" id="experience">
                <div class="row" style="padding: 0px 50px;">
                    <div class="col-md-12">
                    <h2 class="h3 mb-4">Experience</h2>
                    </div>
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
            <hr class="d-print-none"/>
            <div class="contact-section px-3 px-lg-4 pb-4" id="contact">
                <div class="row" style="padding: 0 50px;">
                    <div class="col-md-12">
                    <h2 class="h3 text mb-4">Contact</h2>
                    </div>
                    <div class="col-md-6 d-print-none">
                    <div class="my-2">
                        <form action="#"
                            method="POST">
                            <div class="row">
                                <div class="col-6">
                                <input class="form-control" type="text" id="name" name="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-6">
                                <input class="form-control" type="email" id="email" name="_replyto" placeholder="Your E-mail" required>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <textarea class="form-control" style="resize: none;" id="message" name="message" rows="4"  placeholder="Your Message" required></textarea>
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Send</button>
                        </form>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="mt-2">
                        <h3 class="h6">Address</h3>
                        <div class="pb-2 text-secondary">{{$user->address}}</div>
                        <h3 class="h6">Phone</h3>
                        <div class="pb-2 text-secondary">+62{{$user->phone}}</div>
                        <h3 class="h6">Email</h3>
                        <div class="pb-2 text-secondary">{{$user->email}}</div>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <h3 class="h6">Social Media</h3>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="{{$user->akun_fb}}"><i class="fab fa-facebook-f"></i></a></li>
                        <li class="list-inline-item"><a href="{{$user->akun_linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="{{$user->akun_git}}"><i class="fab fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
      <footer class="pt-4 pb-4 text-muted text-center d-print-none">
         <div class="container">
            <div class="text-small">
               <div class="mb-1">&copy; <?php echo date("Y"); ?> | {{optional($configweb)->developer}}</div>
            </div>
         </div>
      </footer>
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="{{asset('template_home/scripts/aos.js?ver=1.2.0')}}"></script>
      <script src="{{asset('template_home/scripts/main.js?ver=1.2.0')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
         $(document).on('click', '[data-toggle="lightbox"]', function(event) {
               event.preventDefault();
               $(this).ekkoLightbox();
         });
      </script>
   </body>
</html>