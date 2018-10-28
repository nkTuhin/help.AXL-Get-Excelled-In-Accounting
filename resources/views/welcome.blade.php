<!DOCTYPE html>
<html>
<head>
    <title>help.AXL - Excelled in Accounting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css?family=Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Special+Elite|Zilla+Slab+Highlight" rel="stylesheet">
    <!-- CSS Link -->
    <link href="{{ asset('css/welcomecss/welcomecss.css') }}" rel="stylesheet">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body>
    <div class="header">
        <div class="single-post-page-nav">
            <nav>
                <div class="logo">
                    <a href="{{ url('/') }}">help.AXL</a>
                </div>

                @if (Route::has('login'))
                <div class="top-right links">
                    <div class="dept">
                    <ul class="dept-list">
                        <li><a href="{{ url('/home') }}" class="acca">ACCA</a></li>
                        
                    </ul>
                </div>
                    @auth
                        <ul class="dept-list">

                        </ul>
                    @else
                        <div class="login">
                    <a href="{{ route('login') }}" name="login">Login</a>
                </div>
                <div class="register">
                    <a href="{{ route('register') }}" name="register">Register</a>
                </div>
                    @endauth
                </div>
            @endif




            </nav>
        </div>
    </div>

    <div class="full-page">

        <div class="org-name">
            <div class="org-name-body">
                <!-- <h2>help.AXL</h2>
                <h3>Excelled in Accounting</h3> -->
                <h4>FREE online learning</h4>
                <p>for accountancy student</p>
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

    </div>


</body>
</html>
