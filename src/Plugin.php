<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch;

use Chinstrap\Core\Contracts\Plugin as PluginContract;
use Chinstrap\Core\Events\RegisterStaticRoutes;
use Chinstrap\Plugins\DynamicSearch\Listeners\RegisterSearchIndexRoute;
use Laminas\EventManager\EventManagerInterface;

final class Plugin implements PluginContract
{
    /**
     * @var EventManagerInterface
     */
    private $manager;

    /**
     * @var RegisterSearchIndexRoute
     */
    private $listener;

    public function __construct(EventManagerInterface $manager, RegisterSearchIndexRoute $listener)
    {
        $this->manager = $manager;
        $this->listener = $listener;
    }

    public function register(): void
    {
        $this->manager->attach(
            RegisterStaticRoutes::class,
            $this->listener
        );
    }
}
