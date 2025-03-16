<?php

namespace OncologySupport\Sparkline\Twig\Runtime;

use Davaxi\Sparkline;
use Twig\Extension\RuntimeExtensionInterface;

class AppExtensionRuntime implements RuntimeExtensionInterface
{
    public function sparkline(array $data, ?int $width = null, ?int $height = null): string
    {
        ob_start();
        $sparkline = new Sparkline();
        $width ??= 80;  // sparkline default is 80
        $height ??= 20; // sparkline default is 20
        $sparkline->setWidth($width);
        $sparkline->setHeight($height);

        // if data length * 2 > width + 20, then data gets truncated.
        // address this by sampling every other data point, and setting min width of plot
        $data_len = count($data);
        if ($data_len * 2 + 20 > $width) {
            $sampledData = [];
            $dataToSample = array_values($data);
            for ($i = 0; $i < $data_len; $i += 2) {
                $sampledData[] = $dataToSample[$i];
            }
            $data = $sampledData;
            $sparkline->setWidth(max(80, 2 * count($data) + 20));
        }

        // optimize data visualization by shifting data down; has effect of smaller y-axis range
        // and therefore magnified view of data
        $dataMax = max($data);
        $dataMin = min($data);
        if (0.20 * $dataMax > 20) {
            $offset = max(0, $dataMin - 0.10 * $dataMax);
            for ($i = 0; $i < count($data); ++$i) {
                $data[$i] -= $offset;
            }
        }

        $sparkline->setData($data);

        $sparkline->display();
        $sparkline->destroy();

        return '<img src="data:image/png;base64,'.base64_encode(ob_get_clean()).'" alt="sparkline"/>';
    }
}
