<?php declare(strict_types=1);

namespace FIFOShopwareEvents\Components;

use Shopware\Components\ContainerAwareEventManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ExtendedEventManager extends ContainerAwareEventManager
{
    private $fifo;

    public function __construct(
        ContainerInterface $container
    ) {
        parent::__construct($container);
        $this->fifo = new FIFOWriter();
    }

    public function notify($event, $eventArgs = null)
    {
        $this->fifo->write($event);
        return parent::notify($event, $eventArgs);
    }

    public function notifyUntil($event, $eventArgs = null)
    {
        $this->fifo->write($event);
        return parent::notifyUntil($event, $eventArgs);
    }

    public function filter($event, $value, $eventArgs = null)
    {
        $this->fifo->write($event);
        return parent::filter($event, $value, $eventArgs);
    }

}
