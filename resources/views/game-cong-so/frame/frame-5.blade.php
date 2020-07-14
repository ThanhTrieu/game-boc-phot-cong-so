<div id="result-container">
    <button type="button" class="btnclose" onclick="closeFrame5(this)">
        <img src="{{url('image/icon/btn-close.png')}}" alt="">
    </button>
    <div id="result-form">
        <div class="result-form-img">
            <img src="{{url('image/pic/rs-1.jpg')}}" alt="">
        </div>
        <div class="result-form-content">
            <h3>"Nạn nhân" của bạn cần một cái tên</h3>
            <h4>* tối đa 20 ký tự</h4>
        </div>
        <form action="{{route('game-cong-so.detail')}}" method="post" id="form-frame5-submit">
            @csrf
            <input type="text"  name="title" id="title" required/>
            <p id="error-name"></p>
            <input type="hidden" value="" name="url" id="image-url"/>
            <input type="hidden" value="{!! $nameImage !!}" name="contentImage" id="image-content"/>
            <button type="button" class="form-btn-submit" onclick="regexErrForm()">Xác nhận</button>
        </form>
    </div>

</div>
