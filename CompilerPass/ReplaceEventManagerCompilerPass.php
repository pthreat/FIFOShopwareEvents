<?php declare(strict_types=1);

namespace FIFOShopwareEvents\CompilerPass;

use FIFOShopwareEvents\Components\ExtendedEventManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class CustomEventManagerCompilerPass
 */
class ReplaceEventManagerCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('events');
        $definition->setClass(ExtendedEventManager::class);
    }
}
