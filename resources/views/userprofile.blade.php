<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link href="{{ asset('css/userprofilecss/userprofilecss.css') }}" rel="stylesheet">
	<link href="{{ asset('js/parallax/parallax.min.js') }}" rel="stylesheet">
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan" rel="stylesheet">
	<!-- script -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	<script src="parallax.min.js"></script>
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
                        <li><a href="{{ route('createpostpage') }}" class="acca">Create Post</a></li>
                        
                    </ul>
                </div>
                <div class="logout">
                    {{-- <a href="{{ route('logout') }}" name="logout">Logout</a> --}}
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

    @include('message.test2')

    
	<div class="full-page">
		<div class="user-intro">
				<div class="user-intro-box">
					    
				    	@if($ProfileCount==0)
				    	   <div class="updateprofile">
				    		   <h3><a href="{{ route('profile') }}" class="acca">Insert profile</a></h3>
				    	  </div>
				    	@endif

				    	
				    	
				    <div class="card">
				    	
				      <img src="/uploads/avatar/{{ Auth::user()->avatar }}" alt="nk" style="width:100%">
				      	<div class="container">
				      		@if($ProfileCount>0)
					       	 	@foreach ($Profile as $profile)
					       	 		@if ($profile->user_id==Auth::user()->id)
					       	 		  <ul class="user-info">
					       	 			<li><i class="fas fa-user"></i>{{ $profile->name }}</li>
								        <li><i class="fas fa-at"></i> {{ $profile->email }}</li>
								        <li><i class="fas fa-transgender-alt"></i> {{ $profile->sex }}</li>
								        <li><i class="fas fa-map-marker-alt"></i> {{ $profile->city }}</li>
								        <li><i class="fas fa-phone"></i> {{ $profile->phone }}</li>
								        <hr>
								        <li><a style="color: #FFF" href="{{ route('updateview',['id'=>$profile->id]) }}" class="acca">Update Profile</a></li>
							           </ul>
					       	 		@endif
					       	 	@endforeach
					       	@endif
					       	@if($ProfileCount==0)
				    	      <ul class="user-info">
					       	 			<li> No data</li>
							   </ul>
				    	    @endif
							<div class="follow-on-social">
								<ul class="cus-social-li">
									<abbr title="Facebook"><li><a class="fb" href=""><i class="fab fa-facebook"></i> </a></li></abbr>
									<abbr title="Twitter"><li><a class="tw" href=""><i class="fab fa-twitter"></i> </a></li></abbr>
									<abbr title="Dribble"><li><a class="dri" href=""><i class="fab fa-dribbble"></i> </a></li></abbr>
									<abbr title="You Tube"><li><a class="yt" href=""><i class="fab fa-youtube"></i> </a></li></abbr>
									<abbr title="Google Plus"><li><a class="gp" href=""><i class="fab fa-google-plus-g"></i> </a></li></abbr>
									<abbr title="Github"><li><a class="git" href=""><i class="fab fa-github"></i> </a></li></abbr>
									<abbr title="Instagram"><li><a class="ins" href=""><i class="fab fa-instagram"></i> </a></li></abbr>
								</ul>
					      	</div>
				    	</div>
					</div>
					<div class="user-achievement-box">
						<h3>User Achievement -</h3>
						<div class="user-achievement-view">
							{{-- @foreach ($AddAchievement as $add_achievements)
								<img src="/achicon/{{ $add_achievements->achIcon }}" class="user-achievement-icon">
								
							@endforeach --}}
							@foreach($AddPostAchievement as $pa)
                               @if($pa->post_reqr==$countPost)
                                             
                                   <img src="/achicon/{{$pa->achIcon}}" class="user-achievement-icon">
                               @endif 

                                @if($pa->post_reqr<$countPost)
                                    <img src="/achicon/{{$pa->achIcon}}" class="user-achievement-icon">
                                @endif  

                            @endforeach

                            @foreach($AddCommentAchievement as $ca)
                                 @if($ca->comment_reqr==$countComment)
                                      <img src="/achicon/{{$pa->achIcon}}" class="user-achievement-icon">
                                 @endif 

                                 @if($ca->comment_reqr<$countComment)
                                       <img src="/achicon/{{$pa->achIcon}}" class="user-achievement-icon">
                                 @endif  
                            @endforeach
						</div>
					</div>
				</div>
@include('message.message_block')
			<div class="user-intro-info">
				<section class="user-intro-info1">
					<h3 id="username">{{ Auth::user()->name }}</h3>
					@foreach ($Profile as $profile)
					    @if ($profile->user_id==Auth::user()->id)
					    ({{ $profile->nickName }})
					     <p id="bio">{{ $profile->users_bio }}</p>
					     <h4 id="city">{{ $profile->city }}</h4>
					@endif
				@endforeach
				</section><br><hr>
				<section class="session-activity">
					
					<p>Active: {{ auth()->user()->current_sign_in_at->diffForHumans() }}</p>
					<p>Last Activity: {{ auth()->user()->last_sign_in_at->diffForHumans() }}</p>
						
				</section>
				<div class="user-all-activity">
					<div class="all-activity-list">
						<ul>
							<li>Post : {{$countPost}}</li>
							<li>Comment :{{$countComment}}</li>
						</ul>
					</div>	
				</div>
				{{-- <a href="{{route('admin-about.edit',['id'=>$about->id])}}" class="glyphicon glyphicon-pencil edit-ghost" style=" text-decoration:none;"> --}}
			</div>
			<!-- user information end here -->
			
		</div>	
			<!-- full page end here -->
	</div>


	<!-- Footer Parallaz -->
		<section class="footer-parallax">
			<div class="parallax-footer" data-parallax="scroll" data-image-src="/parallazimage/imgslider2.jpg" data-z-index="-1"></div>
		</section>
	<!-- Footer Parallax End -->

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




		<!-- Scroll to top -->
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
		<!-- Scroll to top section end -->

		


		<!-- Script Start From Here  -->

			<!-- script for scroll top buttons -->
				<script>
					// When the user scrolls down 20px from the top of the document, show the button
					
					window.onscroll = function() {scrollFunction()};

					function scrollFunction() {
					    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
					        document.getElementById("myBtn").style.display = "block";
					    } else {
					        document.getElementById("myBtn").style.display = "none";
					    }
					}

					// When the user clicks on the button, scroll to the top of the document
					function topFunction() {
					    document.body.scrollTop = 0;
					    document.documentElement.scrollTop = 0;
					}
				</script>
				<!-- script for scroll top buttons section end -->

	

</body>
</html>