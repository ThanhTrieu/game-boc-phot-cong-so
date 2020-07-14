<?php

namespace App\Http\Controllers\GameCongSo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameBocPhotCongSoController extends Controller
{
    private $arrActions = [
        "1"  => "Ăn kem trong giờ làm việc nè.",
        "2"  => "Vừa ngủ vừa ngáy nhé!",
        "3"  => "xem thế giới động vật nè.",
        "4"  => "vừa bị bắt quả tang nè.",
        "5"  => "ngoáy mũi trong giờ làm",
        "6"  => "cười phớ lớ trong giờ làm việc nè.",
        "7"  => "chat chit vs bồ",
        "8"  => "xem thế giới động vật nè.",
        "9"  => "vừa bị bắt quả tang nè.",
        "10"  => "ngoáy mũi trong giờ làm",
        "11"  => "cười phớ lớ trong giờ làm việc nè.",
        "12"  => "chat chit vs bồ",
    ];

    public function index()
    {
        return view('game-cong-so.home.index');
    }

    public function game()
    {
        $arrActions = $this->arrActions;
        return view('game-cong-so.game.index', compact('arrActions'));
    }

    public function loadFrame2(Request $request)
    {
        if($request->ajax()){
            return view('game-cong-so.frame.frame-2');
        }
    }

    public function loadFrame5(Request $request)
    {
        if($request->ajax()){
            $nameImage = $request->post('content');
            return view('game-cong-so.frame.frame-5', compact('nameImage'));
        }
    }

    public function detail(Request $request)
    {
        $arrActions = $this->arrActions;
        $url = $request->url;
        $name = $request->title;
        $name = !empty($name) ? $name : 'Diệp Thu';
        $content = $request->contentImage;
        $content = !empty($content) ? $content : 'vừa bị “bóc phốt” vì uống trà sữa';
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        return view('game-cong-so.detail.index', compact(
            'arrActions',
            'url',
            'name',
            'content',
            'actual_link'
        ));
    }
}
