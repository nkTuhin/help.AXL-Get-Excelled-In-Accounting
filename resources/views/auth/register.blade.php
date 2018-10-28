<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css?family=Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Mouse+Memoirs|Monofett|Zilla+Slab+Highlight" rel="stylesheet">
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="register.css">

    <link href="{{ asset('css/registercss/registercss.css') }}" rel="stylesheet">
    
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>
<body class="body-background-animation">
    <div class="header">
        
    </div>

    <div class="full-page">
        <div class="reg-section">
            <div class="reg-box">
                <h2>Register here </h2>
                
                    <form class="reg-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                    <div class="reg-name">
                        <div class="name-label">
                            <label>Name</label>
                        </div>
                        
                        <input id="name" type="text" name="name" value=" " required autofocus>

                                <!-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif -->
                    </div>

                    <div class="reg-email">
                        <div class="email-label">
                            Email
                        </div>

                        <input id="email" type="email" name="email" value=" " required>

                               <!--  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif -->
                    </div>

                    <div class="reg-password">
                        <div class="password-label">
                            <label>Password</label>
                        </div>
                        <input id="password" type="password" name="password" required>

                                <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif -->
                    </div>

                    <div class="reg-confirm-password">
                        <div class="confirm-password-label">
                            <label>Confirm Password</label>
                        </div>
                        <input id="password-confirm" type="password" name="password_confirmation" required>
                    </div>


                    <div class="reg-button">
                          <button type="submit" class="reg-submit-button">
                                    Register
                          </button>
                    </div>
                </form>
                <div class="or">
                    <p>or</p>
                </div>
                <div class="sign-in-link">
                    <a href="{{ route('login') }}">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>