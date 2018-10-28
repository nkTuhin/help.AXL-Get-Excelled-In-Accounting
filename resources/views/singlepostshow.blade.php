<!DOCTYPE html>
<html>
<head>
  <title>Single Post</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Link -->
  <link href="https://fonts.googleapis.com/css?family=Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt" rel="stylesheet">
  <!-- CSS Link -->
  <link rel="stylesheet" type="text/css" href="singlepost.css">

  <link href="{{ asset('css/singlepostcss/singlepostcss.css') }}" rel="stylesheet">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- Jquery Link -->
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <!-- Parallax Script Link -->
  <script src="parallax.min.js"></script>
  <!--  -->
  {{-- Toster message --}}
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body id="body">
  <div class="header">
    <div class="single-post-page-nav">
      <nav>
        <div class="logo">
          <a href="{{ url('/') }}">help.AXL</a>
        </div>
        <div class="dept">
            <ul class="dept-list">
                <li><a href="{{ route('home') }}" class="acca">ACCA</a></li>
                <li><a href="{{ route('discusshome') }}" class="acca">Discussion Blog</a></li>
            </ul>
        </div>
        <div class="logout">
          {{-- <a href="#" name="logout">Logout</a> --}}

          <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                          Logout
         </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
        </div>
      </nav>
    </div>
  </div>

  <!-- <div class="parallax">
    <div class="top-page-parallax">
      
      <div class="top-parallax" data-parallax="scroll" data-image-src="topparallax1.jpg" data-z-index="-1"></div>
    </div>
  </div> -->

  

  <div class="full-page">

    <div class="clear">
      
    </div>
  @include('message.test2')
    <div class="post-box">
      <div class="single-post">
        <div class="single-post-body">
          <img src="{{ asset('postimage/' . $post->postImage) }}" class="single-post-body-image">

          <p class="posted-author-info"><img src="/uploads/avatar/{{ $post->user->avatar }}" class="author-image">{{ $post->user->name }} on {{ date('M j, Y', strtotime($post->created_at)) }}</p>
          <h3 class="single-post-title">{{ $post->postTitle }}</h3>
          
          <p class="single-post-detail">{!! $post->postBody !!}</p>

          <div class="post-function">
            
            <a href="{{$post->id}}/edit" class="edit-post">Edit</a><a href="{{ route('post.delete', [$post->id]) }}" class="delete-post">Delete</a>

          </div>
        </div>

        

        <div class="comment-section">
          <div class="comment-section-header">
            <h3>{{ $post->comment()->count() }}</h3>
          </div>
          <div class="comment-box">
            @foreach ($post->comment as $comment)
              <div class="comment">
                
                  @foreach($user as $use)
                     @if ($use->email==$comment->email)
                        <img src="/uploads/avatar/{{ $use->avatar }} " class="user-image">  
                     @endif
                  @endforeach

              <h3 class="user-name">{{ $comment->name }}</h3>
              <p class="created_at">{{ $comment->created_at }}</p>
              <p class="user-comment">{{ $comment->comment }}</p>
              <div class="comment-function">
               
               {{--  <a href="{{ route('comment.delete', [$comment->id]) }}" class="delete-button">Delete</a> --}}

              </div>
            </div>

            @endforeach
            
          </div>
        </div>
        <!-- Submit Comment Section -->
        <div class="comment-form">
          <div class="form">
            <h3>What do you wanna say ?</h3>

            <form method="POST" action="{{ route('createcomment.create', $post->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

              <div class="user-name">
                <input type="text" name="name" value="{{ Auth::user()->name }}" readonly="readonly">
              </div>
              <div class="user-email">
                <input type="email" name="email" value="{{ Auth::user()->email }}" readonly="readonly">
              </div>
              <div class="user-comment-area">
                <textarea name="comment" placeholder="Your Comment" required ></textarea>
              </div>
              <div class="comment-submit-button">
                <input type="submit" name="submit-comment">
              </div>
              
            </form>
          </div>
        </div>
      </div>
      <!-- <div class="single-recent-post">
        <h3>Recent Post-</h3>
        <div class="recent-post-body">
          <h3 class="recent-post-title">This is second post</h3>
          <p class="recent-post-author-info">Nk on 29 July - 2018</p>
          <div class="middle">
            <div ><button class="text">View</button></div>
        </div>
        </div>
        
      </div> -->
    </div>

    
    
  </div>

  
    <!-- Footer Start -->

  <div class="before-footer-parallax">
    <section class="footer-parallax">
      <div class="parallax-footer" data-parallax="scroll" data-image-src="bottomparallax.jpg" data-z-index="-1"></div>
    </section>
  </div>  

  <div id="footer">
    <section class="cus-footer">
      <footer id="cus-footer">
        <div class="cus-footer-sec">
          <div class="cus-footer-logo">
            <h1>NKT</h1>
            <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
            <p type="arr"> © 2018 - All Rights Reserved </p>
          </div>
        </div>
        <div class="cus-footer-sec">
          <div class="cus-footer-link">
            <h1>Menu -</h1>
            <ul class="cus-footer-menu">
              <li><a href="">Plan</a></li>
              <li><a href="">Blog</a></li>
              <li><a href="">Explore</a></li>
              <li><a href="">More</a></li>
            </ul>
          </div>
        </div>

        <div class="cus-footer-sec">
          <div class="cus-footer-social">
            <h1>FOLLOW US </h1>
            <ul class="cus-footer-social-li">
              <li><a class="fb" href=""><i class="fab fa-facebook"></i> Facebook</a></li>
              <li><a class="tw" href=""><i class="fab fa-twitter"></i> Twitter</a></li>
              <li><a class="dri" href=""><i class="fab fa-dribbble"></i> Dribble</a></li>
              <li><a class="yt" href=""><i class="fab fa-youtube"></i> Youtube</a></li>
              <li><a class="gp" href=""><i class="fab fa-google-plus-g"></i> Google Plus</a></li>
              <li><a class="git" href=""><i class="fab fa-github"></i> Github</a></li>
              <li><a class="ins" href=""><i class="fab fa-instagram"></i> Instagram</a></li>
            </ul>
          </div>
        </div>
        
        <div class="cus-footer-sec">
          <div class="cus-footer-sub">
            <h1>Newsletter</h1>
            <p>You will get every new updates of our <a class="newsletter" href="">NEWSLETTER</a>  so SUBSCRIBE now ! </p>
            <form class="sub-form">
              <input type="email" placeholder="Your Email ..." name="sub-email"><br>
              <button class="sub-btn" type="submit">Subscribe</button>
            </form>
          </div>
        </div>
      </footer>
    </section>
    </div>
</body>
</html>