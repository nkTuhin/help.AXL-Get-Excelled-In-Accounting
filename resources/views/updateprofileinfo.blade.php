<!DOCTYPE html>
<html>
<head>
    <title>Add Profile Info</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css?family=Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Special+Elite|Zilla+Slab+Highlight" rel="stylesheet">
    <!-- CSS Link -->

    <link href="{{ asset('css/addprofileinfocss/addprofileinfocss.css') }}" rel="stylesheet">
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
                <div class="dept">
                    <ul class="dept-list">
                        {{-- <li><a href="{{ route('home') }}" class="acca">ACCA</a></li>
                        <li><a href="{{ route('discusshome') }}" class="acca">Discussion Blog</a></li>
                        <li><a href="{{ route('createpostpage') }}" class="acca">Create Post</a></li>
                        <li><a href="{{route('userprofile')}}" class="acca">Your Profile</a></li>
                        <li><a href="{{ route('profile') }}" class="acca">Edit Profile</a></li> --}}
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

    <div class="full-page">
        <div class="profile-image-section">
            <div class="change-profile-image">
                <img src="/uploads/avatar/{{ Auth::user()->avatar }}" class="profile-image" >

                        <h2> {{ Auth::user()->name }}'s Profile</h2>

                            <form action="{{ route('updateavatar') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="label">
                                <label>Update Profile Image</label>
                            </div>
                            <div class="input-file">
                                <input type="file" name="avatar">
                            </div>
                            <div class="button">
                                <input type="submit" value="Change" class="submit-image-button">
                            </div>

                        </form>
            </div>
        </div>

        <!-- Add more profile info from here  -->
         @include('message.message_block')
        <div class="more-info">
 
            <div class="more-info-form">

                    <h2>Update Your Info -</h2>
  
                    <div>
                        <hr>
                    </div>

                <form method="POST" action="{{ route('updateprofileinfo') }}">
                        {{ csrf_field() }}
                    <div>
                        <input class="name" type="text" name="name" value="{{ $profile->name }} " readonly="readonly">
                    </div>
                    <div>
                        <input class="id" type="hidden" name="id" value="{{ $profile->id }}" readonly="readonly">
                    </div>
                    <div>
                        {{-- <input class="city" type="text" name="bio" placeholder="Write your bio ..."> --}}
                        <textarea class="bio" type="text" name="users_bio" >{{ $profile->users_bio }}</textarea>
                    </div>

                    <div>
                        <input class="city" type="text" name="nickName" value="{{ $profile->nickName }}">
                    </div>
                    <div>
                        <select class="sex" name="sex" class="sex-section" required>
                            @if($profile->sex=='Male')
                             <option selected>Sex...</option>
                             <option value="Male" selected>Male</option>
                             <option value="Female">Female</option>
                             <option value="Other">Other</option>
                            @endif

                            @if($profile->sex=='Female')
                             <option selected>Sex...</option>
                             <option value="Male">Male</option>
                             <option value="Female" selected>Female</option>
                             <option value="Other">Other</option>
                            @endif

                            @if($profile->sex=='Other')
                             <option selected>Sex...</option>
                             <option value="Male">Male</option>
                             <option value="Female" >Female</option>
                             <option value="Other" selected>Other</option>
                            @endif
                           
                        </select>
                    </div>
                    <div>
                        <input class="city" type="text" name="city" value="{{ $profile->city }}">
                    </div>
                    <div>
                        <input class="phone" type="text" name="phone" value="{{ $profile->phone }}">
                    </div>
                    <div>
                        <input class="email" type="email" name="email" value="{{ $profile->email }}" readonly="readonly">
                    </div>
                    <div>
                        <input class="info-submit-button" type="submit" value="Update">
                    </div>
                    <div>
                       
                    </div>
                    
                </form>

                
            </div>
        </div>

    </div>
</body>
</html>
