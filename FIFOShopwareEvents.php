<?php declare(strict_types=1);

namespace FIFOShopwareEvents;

use FIFOShopwareEvents\CompilerPass\ReplaceEventManagerCompilerPass;
use Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class FroshProfiler
 */
class FIFOShopwareEvents extends Plugin
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ReplaceEventManagerCompilerPass());
    }
}
