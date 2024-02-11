<?php

require_once "vendor/autoload.php";


use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

$black = new \BaconQrCode\Renderer\Color\Cmyk(0,0,0,100);
$white = new \BaconQrCode\Renderer\Color\Cmyk(0,0,0,0);
$red = new \BaconQrCode\Renderer\Color\Cmyk(0,100,100,0);

$ef = new \BaconQrCode\Renderer\RendererStyle\EyeFill($black, $red);

$fill = \BaconQrCode\Renderer\RendererStyle\Fill::withForegroundColor(
    $white,
    $black,
    $ef,
    $ef,
    $ef
);

$rs = new RendererStyle(size: 400, fill: $fill);

$renderer = new ImageRenderer(
    $rs,
    new SvgImageBackEnd()
);
$writer = new Writer($renderer);
$writer->writeFile('Hello World!', 'qrcode.svg');
