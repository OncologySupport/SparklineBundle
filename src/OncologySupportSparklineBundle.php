<?php

namespace OncologySupport\Sparkline;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Ernest Hymel
 */
class OncologySupportSparklineBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
