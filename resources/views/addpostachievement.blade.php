<!DOCTYPE html>
<html>
<head>
  <title> Add Post Achievement</title>

  <link href="{{ asset('css/addpostachievementcss/addpostachievementcss.css') }}" rel="stylesheet">
  <!-- Font link -->
 <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Open+Sans+Condensed:300" rel="stylesheet">
  <!-- Font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- Toster Message --}}
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ route('addpostachievement') }}" class="PA"> Post Achievement </a>
  <a href="{{ route('addcommentachievement') }}" class="CA"> Comment Achievement </a>
  <a href="{{ route('tags.index') }}" class="TAG"> Tag </a>
  <a href="{{ route('document.index') }}" class="TAG"> Document </a>
  {{-- <a href="{{ route('addpostachievement') }}" class="UL"> User Level </a> --}}
</div>

<div id="main">

  <!-- Top nav bar start from here -->


<div class="topnav" id="myTopnav">
  <a href="{{ route('admin.dashboard') }}" class="active">Admin Home</a>
   <a><span style="font-size:15px;float: right;color: #fff;height: auto;cursor:pointer" onclick="openNav()">&#9776; Dashboard</span></a>
  <!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a> -->

  <!-- Logout section -->

<div class="navbar">
  <div class="dropdown">
    <button class="dropbtn">Admin 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      {{-- <a href="#">Logout</a> --}}

      <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                          Logout
         </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
    </div>
  </div> 
</div>

<!-- Top nav bar end here -->

  <!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Dashboard</span> -->

  @include('message.test2')
  
</div>
    <div class="full-page">
        <div class="post-achievement">
            <div class="form">
                <form class="post-achievement-form" action="{{ route('addpostachievement.create') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                    <h2>Add Post Achievement -</h2>
                    <div class="post-achievement-title">
                        <input type="text" name="title" placeholder="Post Achievement Title Here ...">
                    </div>
                    <div class="post-achievement-detail">
                        <textarea name="detail" placeholder="Achievement details here ..."></textarea>
                    </div>
                    <div class="post-achievement-requirement">
                        <input type="number" name="post_reqr" placeholder="Requirement number ...">
                    </div>
                    <div class="post-achievement-icon">
                        <input type="file" name="achIcon">
                    </div>
                    <div class="post-achievement-submit">
                        <input type="submit"  value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>



<!-- Script start from here -->

<script>
  <!-- sidenav code start here -->
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}

// side nav code end here 

// top nav bar code start here 
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// top nav code end here

</script>

<!-- Script end here -->
     
</body>
</html> 
