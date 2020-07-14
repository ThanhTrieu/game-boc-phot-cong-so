<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Game bóc phốt công sở</title>
    <link rel="icon" href="{{asset('favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/game.css')}}">
    <link rel="stylesheet" href="{{asset('plugin/swiper/swiper.min.css')}}">
    <!--Script-->
    <script src="{{asset('plugin/jQuery/jquery.min.js')}}"></script>
    <script src="{{asset('plugin/jQuery/Tweenmax.js')}}"></script>
    <script src="{{asset('plugin/jQuery/draggable.js')}}"></script>
    <script src="{{asset('plugin/niceScroll/nicescroll.min.js')}}"></script>
    <script src="{{asset('plugin/swiper/swiper.min.js')}}"></script>


    <script>
        function panoramix() {

            var draggable = Draggable.create($("#drag"), {
                bounds: $("#imgwrapper"),
                edgeResistance: 1,
                type: "y,x",
                cursor: 'http://channel.mediacdn.vn/2020/6/8/icon-mouse-15916041285931269026525.png',
            })

        }

        function ClickBtn() {
            document.getElementById('btnsound').play();
        }

        function loadFrame4(elm) {
            ClickBtn();
            var data_url_video = $(elm).attr('data-url_video');
            var data_url_img = $(elm).attr('data-url_img');
            var url_image = "{{asset('image/pic')}}" +"/"+ data_url_video;
            var storage = localStorage.getItem("key-type");
            $('.result-img img').attr('src', url_image);
            if (storage == "image") {
                console.log("download image");
                $('.result-form-img img').attr('src', "{{asset('image/pic')}}" +"/"+ data_url_img);
                $('#image-url').val(data_url_img);
            } else {
                console.log("download video");
                $('.result-form-img img').attr('src', "{{asset('image/pic')}}" +"/"+ data_url_video);
                $('#image-url').val(data_url_video);
            }
        }

        function loadFrame5(elm) {

            ClickBtn();
            var data_url_video = $(elm).attr('data-url_video');
            var data_url_img = $(elm).attr('data-url_img');
            var data_content = $(elm).attr("data-content");
            var storage = localStorage.getItem("key-type");
            var content_global = $(elm).attr('data-content-id');
            $.ajax({
                url: "{{route('game-cong-so.frame5')}}",
                method: "POST",
                data: {
                    content: data_content
                },
                success: function(data) {
                    localStorage.setItem("is-actived", "actived");
                    $('#section-2').addClass("overllay").append(data);
                    if (storage == "image") {
                        console.log("download image");
                        $('.result-form-img img').attr('src', "{{asset('image/pic')}}" +"/"+ data_url_img);
                        $('#image-url').val(data_url_img);
                    } else {
                        console.log("download video");
                        $('.result-form-img img').attr('src', "{{asset('image/pic')}}" +"/"+ data_url_video);
                        $('#image-url').val(data_url_video);
                    };

                    $(document).on('keyup', function(evt) {
                        if (evt.keyCode == 27) {
                            console.log('Esc key pressed.');
                            $('#section-2').removeClass('overllay');
                            $('#result-form').remove();
                            $('#result-container').remove();
                        }
                    });

                },
                dataType: 'html'
            });
        }

        function closeTutorial() {
            $('#tutorial-wrapper').remove();
            ClickBtn();
        }

        function closeFrame5(elm) {
            ClickBtn();
            $('#section-2').removeClass('overllay');
            $('#result-form').remove();
            $('#result-container').remove();
            elm.remove();
        }

        function regexErrForm() {
            var name = $.trim($('#title').val());
            var patt1 = /\s/g;
            var result = name.match(patt1);
            if (!result && name.length <= 10 && name !== '') {
                $('#form-frame5-submit').submit();
            } else if (name === '') {
                $('#error-name').removeClass('hidden');
                $('#error-name').html('Name ko duoc rong');
            } else if (result) {
                $('#error-name').removeClass('hidden');
                $('#error-name').html('Name ko duoc rong');
            }
        }

        function setwidth() {
            $("#map-bg").on("load", function() {
                var widthbg = $(this).width();
                console.log(widthbg);
                $("#drag").css("width", widthbg + 'px');
                $("#overlay-wrapper").css("width", widthbg + 'px');
            });
        }

        function randOrder() {
            return (Math.round(Math.random()) - 0.5);
        }
    </script>
</head>

<body>
<main>
    <audio id="audiogame" src="{{asset('audio/audiogame.mp3')}}" autoplay loop></audio>
    <audio id="btnsound" src="{{asset('audio/button-sound.mp3')}}"></audio>

    <div class="preload">
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
        <div id="preload-content">
            <div class="preload-content-inner">
                <div class="preload-content-inner-title">
                        <span>
                            "Bóc phốt"
                        </span>Công sở
                </div>
                <div class="preload-content-inner-icon">
                    <img src="{{asset('image/icon/preload.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    <section id="section-2">

        <div id="imgwrapper">
            <div id="drag">
                <img id="map-bg" src="{{asset('image/pic/background-min.png')}}" alt="">
                <div id="overlay-wrapper">
                    <div class="overlay-gr" id="gr1">
                        <img class="npc" src="{{asset('image/pic/char5.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nv5.gif')}}" alt="" data-content="trang điểm" data-url_video="nv5.gif" data-url_img="nv5.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr2">
                        <img class="npc" src="{{asset('image/pic/char4.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nv4.gif')}}" alt="" data-content="ngủ gật" data-url_video="nv4.gif" data-url_img="nv4.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr3">
                        <img class="gif" src="{{asset('image/pic/nv10.gif')}}" alt="" data-content="cày phim" data-url_video="nv10.gif" data-url_img="nv10.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr4">
                        <img class="npc" src="{{asset('image/pic/char1.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nv1.gif')}}" alt="" data-content="uống trà sữa" data-url_video="nv1.gif" data-url_img="nv1.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr5">
                        <img class="npc" src="{{asset('image/pic/nvp3.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nvp3.gif')}}" alt="" data-content="brainstorm" data-url_video="nvp3.gif" onclick="loadFrame4(this)">
                    </div>
                    <div class="overlay-gr" id="gr6">
{{--                        <img class="npc" src="{{asset('image/pic/nv7.png')}}" alt="">--}}
                        <img class="gif" src="{{asset('image/pic/nv7.gif')}}" alt="" data-content="tự sướng" data-url_video="nv7.gif" data-url_img="nv7.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr7">
{{--                        <img class="npc" src="{{asset('image/pic/nv9.png')}}" alt="">--}}
                        <img class="gif" src="{{asset('image/pic/nv9.gif')}}" alt="" data-content="tám" data-url_video="nv9.gif" data-url_img="nv9.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr8">
                        <img class="npc" src="{{asset('image/pic/nvp4.gif')}}" alt="" data-url_video="nvp4.gif" onclick="loadFrame4(this)">
                        <img class="gif" src="{{asset('image/pic/nv8.gif')}}" alt="" data-content="live stream bán hàng" data-url_video="nv8.gif" data-url_img="nv8.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr9">
                        <img class="npc" src="{{asset('image/pic/nvp5.gif')}}" alt="" data-url_video="nvp5.gif" onclick="loadFrame4(this)">
                        <img class="gif" src="{{asset('image/pic/nv6.gif')}}" alt="" data-content="lướt Facebook thả thính" data-url_video="nv6.gif" data-url_img="nv6.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr10">
                        <img class="npc" src="{{asset('image/pic/char2.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nv3.gif')}}" alt="" data-content="quẹt Tinder" data-url_video="nv3.gif" data-url_img="nv3.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr11">
                        <img class="npc" src="{{asset('image/pic/char2.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nv2.gif')}}" alt="" data-content="ăn quà vặt" data-url_video="nv2.gif" data-url_img="nv2.png" onclick="loadFrame5(this)">
                    </div>
                    <div class="overlay-gr" id="gr12">
                        <img class="npc" src="{{asset('image/pic/nvp2.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nvp2.gif')}}" alt="" data-content="nghiên cứu tài liệu" data-url_video="nvp2.gif" onclick="loadFrame4(this)">
                    </div>
                    <div class="overlay-gr" id="gr13">
                        <img class="npc" src="{{asset('image/pic/nvp1.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nvp1.gif')}}" alt="" data-content="gọi điện cho khách hàng" data-url_video="nvp1.gif" onclick="loadFrame4(this)">
                    </div>
                    <div class="overlay-gr" id="gr14">
                        <img class="npc" src="{{asset('image/pic/nvp6.png')}}" alt="">
                        <img class="gif" src="{{asset('image/pic/nvp6.gif')}}" alt="" data-content="lau dọn chỗ ngồi" data-url_video="nvp6.gif" onclick="loadFrame4(this)">
                    </div>
                </div>
            </div>
        </div>

        <div id="tutorial-wrapper">
            <div class="tutorial-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item">
                                <img class="pc-img" src="{{asset('image/pic/tutorial-1.jpg')}}" alt="">
                                <img class="mb-img" src="{{asset('image/pic/mbtutorial-1.png')}}" alt="">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="item">
                                <img class="pc-img" src="{{asset('image/pic/tutorial-2.jpg')}}" alt="">
                                <img class="mb-img" src="{{asset('image/pic/mbtutorial-2.png')}}" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                    <ul class="tutorial-text">
                        <li>
                            <button type="button" onclick="closeTutorial()">Bỏ qua</button>
                        </li>
                        <li>
                            <button type="button" class="btn-next-slider" id="slide-next">Tiếp theo</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="result-wrapper">

            <div class="result-img">
                <img src="" alt="">
            </div>

            <h3>Xem ai vừa bị bắt quả tang nào</h3>
            <div class="result-group">
                <ul>
                    @foreach ($arrActions as $key => $value)
                    <li data-content="{{$value}}" data-content-id="{{$key}}">
                        {{$value}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>


    </section>
</main>


</body>

<script>
    $(window).on("load", function() {
        console.log("ready");
        $(".preload").css("display", "none");
    });
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var active = localStorage.getItem("is-actived");
        if (active == "actived") {
            $("#tutorial-wrapper").remove();
        } else {}

        $(document).on("click", "#result-wrapper", function() {
            var windowWidth = $(window).width();
            if (windowWidth < 768) {
                $("#result-wrapper").toggleClass("collapse");
            }
        });

        // load success
        setwidth();
        panoramix();
        $('.overlay-gr').removeClass('active').sort(randOrder).slice(0, 3).addClass('active');
        var swiperTutorial = new Swiper('.tutorial-slider .swiper-container', {
            pagination: {
                el: '.swiper-pagination',
            },
            effect: 'fade',
            navigation: {
                nextEl: '.btn-next-slider',
            },
            on: {
                reachEnd: function() {
                    $("#slide-next").click(function() {
                        console.log("last slide");
                        closeTutorial();
                    });
                }
            }
        });
        $(".result-group").niceScroll({
            cursorwidth: "5px",
            cursorcolor: '#b0cb88',
        });
        TweenMax.staggerFrom($(".result-group ul li"), 1, {
            opacity: 0,
            autoAlpha: 0,
            y: "+=20px"
        }, 1);
    });
</script>

</html>

