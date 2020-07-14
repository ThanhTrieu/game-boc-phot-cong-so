<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Game Bóc phốt công sở">
    <meta property="og:description"
          content="Game Bóc phốt công sở được phát triển bởi Creative Studio Athena">
    <meta property="og:url" content="https://creativestudioa.admicro.vn/game-boc-phot-cong-so/">
    <meta property="og:site_name" content="Game Bóc phốt công sở">
    <meta property="og:image" content="https://creativestudioa.admicro.vn/game-boc-phot-cong-so/image/pic/cover-fb.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description"
          content="Game Bóc phốt công sở được phát triển bởi Creative Studio Athena">
    <meta name="twitter:title" content="Game Bóc phốt công sở">
    <title>Game bóc phốt công sở</title>
    <link rel="icon" href=" {{asset('favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/mainstyle.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/swiper/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/paranoma/panoramix.min.css')}}">
    <!--Script-->
    <script src="{{asset('plugin/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('plugin/jQuery/Tweenmax.js')}}"></script>
    <script src="{{asset('plugin/jQuery/draggable.js')}}"></script>
    <script src="{{asset('plugin/niceScroll/nicescroll.min.js')}}"></script>
    <script src="{{asset('plugin/swiper/swiper.min.js')}}"></script>
    <script>

        $(function () {
            $(document).keydown(function (objEvent) {
                if (objEvent.ctrlKey) {
                    if (objEvent.keyCode == 65) {

                        return false;
                    }
                }

            });

        });
        var url_img_global = "";
        var content_global = "";


        function panoramix() {

            var draggable = Draggable.create($("#drag"), {
                bounds: $("#imgwrapper"),
                edgeResistance:1,
                type:"y,x",
                cursor: 'http://channel.mediacdn.vn/2020/6/8/icon-mouse-15916041285931269026525.png',
            })

        }

        function ClickBtn() {
            document.getElementById('btnsound').play();
        }

        function loadFrame2() {
            ClickBtn();
            $.ajax({
                url: "{{route('game-cong-so.frame2')}}",
                success: function (data) {
                    $('#section-content-1').remove();
                    $('#section-1').append(data);
                },
                dataType: 'html'
            });
        }

        function changetype() {
            $(document).on("click",".type-btn", function() {
                var type = $(this).attr("data-type");
                // Check browser support
                if (typeof(Storage) !== "undefined") {
                    // Store
                    localStorage.setItem("key-type", type);
                } else {
                    console.log("Sorry, your browser does not support Web Storage...");
                };
                window.location.href="{{route('game-cong-so.game')}}";
            });
        }

    </script>
</head>
<body>

<main>
    <audio id="audiogame" src="{{asset('audio/audiogame.mp3')}}" autoplay loop></audio>
    <audio id="btnsound" src="{{asset('audio/button-sound.mp3')}}"></audio>

    <section id="section-1">
        <header>
            <div class="col-left">
                <h1><a href="https://creativestudioa.admicro.vn">Creative <br>Studio <br>Athena</a></h1>
            </div>
            <div class="col-right">
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://creativestudioa.admicro.vn/game-boc-phot-cong-so/">
                    <img src="{{asset('image/icon/icon-share.png')}}" alt="">
                    <span>Share</span>
                </a>
            </div>


        </header>
        <div id="section-content-1">
            <div class="section-content">
                <div class="section-content-title">
                    <span>
                        "Bóc phốt"
                    </span>Công sở
                </div>
                <div class="section-content-subtitle">
                    Game được phát triển <br>
                    bởi <a href="https://creativestudioa.admicro.vn/" title="Creative Studio Athena">Creative
                        Studio
                        Athena</a>
                </div>
                <div class="section-content-btn">
                    <button type="button" onclick="loadFrame2()">Tham gia ngay</button>
                </div>
            </div>
        </div>

        <button type="button" id="btn-mute">
            <img src="{{asset('image/icon/icon-volume.png')}}" alt="">
        </button>
    </section>
</main>



</body>
<script>
    $('#btn-mute').click(function () {
        $(this).toggleClass('disabled');
        $("#audiogame").prop('muted', !$("#audiogame").prop('muted'));
    });
</script>
<script>
    $(document).ready(function() {
        localStorage.removeItem("key-type");
        localStorage.removeItem("is-actived");
        $(document).on( "click", "#result-wrapper", function(){
            var windowWidth = $(window).width();
            if(windowWidth < 768){
                $("#result-wrapper").toggleClass("collapse");
            }
        } );
    });

</script>
</html>
