<?php

namespace OncologySupport\Sparkline\Twig\Extension;

use OncologySupport\Sparkline\Twig\Runtime\AppExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('sparkline', [AppExtensionRuntime::class, 'sparkline']),
        ];
    }
}
