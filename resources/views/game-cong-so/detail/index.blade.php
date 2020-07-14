<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Game Bóc phốt công sở">
    <meta property="og:description" content="Game Bóc phốt công sở được phát triển bởi Creative Studio Athena">
    <meta property="og:url" content="https://creativestudioa.admicro.vn/game-boc-phot-cong-so/">
    <meta property="og:site_name" content="Game Bóc phốt công sở">
    <meta property="og:image" content="https://creativestudioa.admicro.vn/game-boc-phot-cong-so/image/pic/cover-fb.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Game Bóc phốt công sở được phát triển bởi Creative Studio Athena">
    <meta name="twitter:title" content="Game bóc phốt công sở">
    <title>Game bóc phốt công sở</title>
    <link rel="icon" href="{{asset('favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <link rel="canonical" href="https://creativestudioa.admicro.vn/game-boc-phot-cong-so/">
</head>

<body>
<script>
    var img_link = localStorage.getItem("img-link");
    window.fbAsyncInit = function() {
        FB.init({
            appId: '1359102264479606',
            autoLogAppEvents: true,
            xfbml: true,
            version: 'v7.0'
        });

    };
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
<main id="detail-wrapper">
    <audio id="btnsound" src="{{asset('audio/button-sound.mp3')}}"></audio>
    <section id="section-content">
        <div class="section-left">
            <div id="img2download" class="section-image">
                @if($url)
                <img src="{{url('/image/pic/')}}/{{$url}}" alt="">
                @else
                    <img src="{{url('/image/pic/')}}/rs-1.jpg" alt="">
                @endif
                <h2>
                    {!! $name !!} vừa bị bóc phốt vì {!! $content !!} trong giờ làm
                </h2>
            </div>
            <div class="section-btn">
                <a id="continue-btn" href="{{route('game-cong-so.game')}}" onclick="continueBtn()">Bóc phốt tiếp</a>
            </div>
        </div>
        <div class="section-right">
            <h1>"Bóc phốt" công sở</h1>
            <h3>Share luôn với 500 anh em thôi chứ đợi gì nữa!</h3>
            <div class="section-social">
                <ul>
                    <li>
                        <a id="share-fb" class="ico ico-fb" target="_blank" title="Share Facebook"></a>

                    </li>
                    <li>
                        <a href="#" class="ico ico-mess"></a>
                    </li>
                    <li>
                        <a href="#" class="ico ico-ins"></a>
                    </li>
                    <li>
                        <a target="_blank" id="btn-download" class="ico ico-download" title="Download"></a>
                    </li>
                </ul>
            </div>
            <h4><a href="https://creativestudioa.admicro.vn">Tham khảo các dịch vụ của Creative Studio
                    Athena</a></h4>
        </div>
    </section>
</main>

<!--Script-->
<script src="{{asset('plugin/jQuery/jquery.min.js')}}"></script>
<script src="{{asset('plugin/html2canvas.min.js')}}"></script>

<script>
    function continueBtn() {
        document.getElementById('btnsound').play();
    }

    html2canvas(document.getElementById('img2download')).then(function(canvas) {
        var image = canvas.toDataURL("image/png");
        //var newImage = image.replace(/^data:image\/png/, "data:application/octet-stream");
        $('#btn-download').attr('href', image);
        localStorage.setItem("img-link", image);
    });

    $("#btn-download").click(function() {
        $('#btn-download').attr("download", "{!! $name !!}.jpg");
    });
    $("#share-fb").click(function() {
        FB.ui({
            method: 'feed',
            link: 'https://creativestudioa.admicro.vn/game-boc-phot-cong-so/',
            picture: img_link,
            description: 'Description',
            actions: [{
                name: 'Game bóc phốt',
                link: 'https://creativestudioa.admicro.vn/game-boc-phot-cong-so/'
            }],
            display: 'popup'
        }, function(response) {
            if (response && response.post_id) {
                // handle response
                console.log("almost done");
            }
        });
    });
</script>
</body>
</html>
