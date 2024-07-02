<?php

namespace App\Http\Controllers;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class QrCodeController extends Controller
{
    public function show()
    {
        $data = "Hello, World!";

        // レンダラーの設定
        $renderer = new ImageRenderer(
            new RendererStyle(400),
            new SvgImageBackEnd()
        );

        // QRコードの生成
        $writer = new Writer($renderer);
        $outputImage = $writer->writeString($data);

        // ブラウザに画像として出力
        return response($outputImage)->header('Content-Type', 'image/svg+xml');
    }
}




