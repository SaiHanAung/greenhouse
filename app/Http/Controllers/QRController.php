<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRController extends Controller
{
    public function generateQrCode()
    {
        \QrCode::size(500)
            ->format('png')
            ->generate('codingdriver.com', public_path('images/qrcode.png'));

        return view('test');
    }

    public function downloadQRCode(Request $request, $type)
    {
        $headers    = array('Content-Type' => ['png', 'svg', 'eps']);
        $type       = $type == 'jpg' ? 'png' : $type;
        $image      = \QrCode::format($type)
            ->size(200)->errorCorrection('H')
            ->generate('codingdriver');

        $imageName = 'qr-code';
        if ($type == 'svg') {
            $svgTemplate = new \SimpleXMLElement($image);
            $svgTemplate->registerXPathNamespace('svg', 'http://www.w3.org/2000/svg');
            $svgTemplate->rect->addAttribute('fill-opacity', 0);
            $image = $svgTemplate->asXML();
        }

        \Storage::disk('public')->put($imageName, $image);

        return response()->download('storage/' . $imageName, $imageName . '.' . $type, $headers);
    }
}
