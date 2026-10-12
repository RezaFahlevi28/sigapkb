<?php

namespace App\Services;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class QrCodeService
{
    /**
     * Generate an SVG data URI or inline SVG for the given payload string.
     */
    public function generateSvgDataUri(string $data, int $scale = 6): string
    {
        $options = new QROptions;
        $options->scale = $scale;
        $options->outputBase64 = true;
        $options->svgAddXmlHeader = false;

        return (new QRCode($options))->render($data);
    }

    /**
     * Generate raw SVG string (ideal for printing and crisp vector display).
     */
    public function generateRawSvg(string $data, int $scale = 6): string
    {
        $options = new QROptions;
        $options->scale = $scale;
        $options->outputBase64 = false;
        $options->svgAddXmlHeader = false;

        return (new QRCode($options))->render($data);
    }
}
