<!DOCTYPE html>
<html>
<head>
    <title>User Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Love+Ya+Like+A+Sister|East+Sea+Dokdo|Marck+Script|Goudy+Bookletter+1911|Satisfy" rel="stylesheet">
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="acca.css">
    <link href="{{ asset('css/userrequestcss/userrequestcss.css') }}" rel="stylesheet">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="parallax.min.js"></script>
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
                    </ul>
                </div>
                <div class="logout">
                    <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                          Logout
         </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="     display: none;">
                {{ csrf_field() }}
                </form>
                </div>
            </nav>
        </div>
    </div>

    <div class="full-page">
        

        <div class="acca-paper-nav">
            <div class="paper-nav-list">
                <nav>
                    <ul class="ul-list">
                        <li><a class="acca" href="{{ route('home') }}">ACCA<!-- <i class="fas fa-arrow-right"></i> --></a></li>
                        <li><a class="f1" href="{{ route('home') }}">F1</a></li>
                        <li><a class="f2" href="">Coming Soon ...</a></li>
                        {{-- <li><a class="f3" href="">F3</a></li>
                        <li><a class="f4" href="">F4</a></li>
                        <li><a class="f5" href="">F5</a></li>
                        <li><a class="f6" href="">F6</a></li>
                        <li><a class="f7" href="">F7</a></li>
                        <li><a class="f8" href="">F8</a></li>
                        <li><a class="f9" href="">F9</a></li>
                        <li><a class="sbl" href="">SBL</a></li>
                        <li><a class="sbr" href="">SBR</a></li>
                        <li><a class="p4" href="">P4</a></li>
                        <li><a class="p5" href="">P5</a></li>
                        <li><a class="p6" href="">P6</a></li>
                        <li><a class="p7" href="">P7</a></li> --}}
                    </ul>
                </nav>
            </div>
        </div>
        <div class="parallax">
            <div class="parallax-x" data-parallax="scroll" data-image-src="/userhomeimage/imagslider2.jpg" data-z-index="-1"></div>
        </div>

        <div class="another-nav">
            <nav>
                <ul class="f1-nav-list">
                    <li><a class="f1" href="{{ route('home') }}">F1</a></li>
                    <li><a class="blog" href="{{ route('discusshome') }}">Discussion Section</a></li>
                    <li><a class="textbook" href="{{ route('user-request') }}">Request</a></li>
                    {{-- <li><a class="testcenter" href="">Test Center</a></li>
                    <li><a class="guideline" href="">Guide Line</a></li> --}}
                </ul>
            </nav>
        </div>
        <div class="f1-tag">
            <h2>Accountant In Business</h2>
        </div>

        <div class="main-content">
            <div class="right-content">
                
                <form class="request-form" action="{{ route('userrequest.submit') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="req-paper-name">
                        <input type="text" name="paper_name" placeholder="Paper Name" autofocus required>
                    </div>
                    <div class="req-paper-about">
                        <textarea name="what_about" placeholder="Write about requeted file"></textarea>
                    </div>
                    <div class="req-submit">
                        <input type="submit" class="req-btn" value="Add Request">
                    </div>
                
                </form>

            </div>
        </div>
    </div>

    <!-- Footer Parallaz -->
        <section class="footer-parallax">
            <div class="parallax-footer" data-parallax="scroll" data-image-src="imgslider2.jpg" data-z-index="-1"></div>
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

</body>
</html>