<!DOCTYPE html>
<html>
<head>
	<title>Blog Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Link -->
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Love+Ya+Like+A+Sister|Text+Me+One|Open+Sans+Condensed:300|Lato" rel="stylesheet">
	<!-- CSS Link -->

	<link href="{{ asset('css/discussionhomecss/discussionhomecss.css') }}" rel="stylesheet">
	<!-- Font Awesome Link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<!-- Jquery Link -->
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	{{-- Toster message --}}
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>

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
            			<li><a href="{{ route('createpostpage') }}" class="acca">Create Post</a></li>
            			<li><a href="{{route('userprofile')}}" class="acca">Your Profile</a></li>
					</ul>
				</div>
				<div class="logout">
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

	

	<div class="full-page">
		<div class="blog-intro">
			<div class="blog-intro-body">

			</div>
		</div>

		<div class="main-content">
			<div class="content-box">
				<div class="left-content">
					<div class="blog-header-title">
						<h1>help.AXL BLOG</h1>
					</div>

					 @include('message.test2')

					<div class="blog-post">
						<h2>Recent Post-</h2>
						@forelse($Post as $post)
						<div  class="blog-post-content">
							<h2><a href="{{route('post.show',['post'=>$post->id])}}">{{ $post->postTitle }}</a></h2>
							<ul class="post-time-info">
								<li><p class="date"><span class="publish">Published:</span> {{ $post->created_at }}</p></li>
								<li><p class="person"><span class="by">BY:</span>{{ $post->user->name }}</p></li>
							</ul>
							 <div>
							 	<ul class="post-tag-info">
									<li>{{ $post->postTag }}</li>
								</ul>
							 </div>

							<p class="post-text">{!!$post->postBody!!}</p>
						</div>
						@empty
						  <p>Empty</p>
						@endforelse
					</div>
				</div>
				<div class="right-content">
					{{-- <div class="search-section">
						<div class="search-box">
							<h3>SEARCH</h3>
							<p>For more information ! </p>
							<form class="search-form">
								<div class="search-body">
									<input type="text" name="searchtext" placeholder="Search here">
								</div>
								<div class="search-button">
									<input type="submit" name="searchbutton" value="GO">
								</div>
							</form>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>

	<!-- Footer section -->
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

		<!-- End footer section -->
</body>
</html>
