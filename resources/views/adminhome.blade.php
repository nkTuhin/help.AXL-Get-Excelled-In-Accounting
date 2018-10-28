<!DOCTYPE html>
<html>
<head>
  <title> Admin Page</title>
  <link rel="stylesheet" type="text/css" href="admin.css">
  <link href="{{ asset('css/admindashboardcss/admindashboardcss.css') }}" rel="stylesheet">
  <!-- Font link -->
  <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Megrim|Neucha|Nixie+One|Snippet|Tienne" rel="stylesheet">
  <!-- Font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
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
</div>

 @include('message.test2')

  <div class="urtext">
    <h1>User Request</h1>
  </div>
<div class="file-request">

  @foreach ($userrequest as $userrequest)
      <div class="file-request-body">
            <h3>Subject: ACCA</h3>
        
             <h3>Paper:{{ $userrequest['paper_name'] }}</h3>
             <h3>Request: {{ $userrequest['what_about'] }} </h3>
             <a href="{{ route('requestdelete', ['id'=>$userrequest->id]) }}" class="btn btn-primary btn-danger">Delete</a>
    
      </div>
  @endforeach

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
