<!DOCTYPE html>
<html>
<head>
    <title>Update Post</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Link -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Bellefair|Berkshire+Swash|Bungee+Inline|Cabin+Condensed|Cabin+Sketch|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Slab|Julius+Sans+One|Jura|MedievalSharp|Megrim|Merienda|Neucha|Nixie+One|Pompiere|Righteous|Satisfy|Snippet|Tienne|Voltaire|Berkshire+Swash|Dosis|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Megrim|Nanum+Gothic|Neucha|Nixie+One|Poiret+One|Poor+Story|Satisfy|Snippet|Source+Code+Pro|Tienne|Barlow+Semi+Condensed|Berkshire+Swash|Cairo:300|Fanwood+Text|Fontdiner+Swanky|IM+Fell+DW+Pica|Josefin+Sans|Josefin+Slab|Julius+Sans+One|Jura|Megrim|Neucha|Nixie+One|Noto+Sans|Poiret+One|Quicksand|Righteous|Roboto|Satisfy|Snippet|Tienne|Merienda|Yanone+Kaffeesatz|Comfortaa|Caveat|Farsan|Faster+One|Frijole|Eater|Nova+Mono|Poiret+One|Raleway|Rock+Salt|Love+Ya+Like+A+Sister|East+Sea+Dokdo|Marck+Script|Goudy+Bookletter+1911|Satisfy" rel="stylesheet">
    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="createpost.css">
    <link href="{{ asset('css/createpostcss/createpostcss.css') }}" rel="stylesheet">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Jquery Link -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="parallax.min.js"></script>
    {{-- editor script --}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
           selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>
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
                      
                        <li><a href="" class="acca">ACCA</a></li>
                        <li><a href="" class="acca">Discussion Blog</a></li>

                    </ul>
                </div>
                <div class="logout">
                    <a href="#" name="logout">Logout</a>
                </div>
            </nav>
        </div>
    </div>

    <div class="full-page">
        <div class="create-post">
            <div class="form">

                    <form class="create-post-form" method="POST" action="{{ route('post.update', [$post->id]) }}" enctype="multipart/form-data">
                      {{ method_field('PUT') }}
                      {{ csrf_field() }}
                    <h2>Update Post -</h2>
                    <div class="post-title">
                        <input type="text" name="postTitle" placeholder="Post Title Here ..." value="{{ $post->postTitle }}">
                    </div>
                    <div class="post-tag">
                        <input type="text" name="postTag" placeholder="Post Tag Here ..." value="{{ $post->postTag }}">

                          {{-- <select class="form-control select2Multiple" name="postTag[]" multiple="multiple"> --}}
                              {{-- @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                              @endforeach --}}
                          {{-- </select> --}}
                    </div>
                    <div class="post-body">
                        <textarea name="postBody" placeholder="Post Body Here ...">{{ $post->postBody }}</textarea>
                    </div>
                    <div class="post-image">
                        <input type="file" name="postImage" value="{{ $post->postImage }}">
                    </div>
                    <div class="post-submit">
                        <input type="submit" name="postsubmit" value="Update Post">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
