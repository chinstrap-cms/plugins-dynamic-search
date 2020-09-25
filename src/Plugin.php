<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch;

use Chinstrap\Core\Contracts\Plugin as PluginContract;
use Chinstrap\Core\Events\RegisterStaticRoutes;
use Chinstrap\Plugins\DynamicSearch\Listeners\RegisterSearchIndexRoute;
use League\Event\EmitterInterface;

final class Plugin implements PluginContract
{
    /**
     * @var EmitterInterface
     */
    private $emitter;

    /**
     * @var RegisterSearchIndexRoute
     */
    private $listener;

    public function __construct(EmitterInterface $emitter, RegisterSearchIndexRoute $listener)
    {
        $this->emitter = $emitter;
        $this->listener = $listener;
    }

    public function register(): void
    {
        $this->emitter->addListener(
            RegisterStaticRoutes::class,
            $this->listener
        );
    }
}
