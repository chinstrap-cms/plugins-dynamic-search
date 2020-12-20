<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch\Tests;

use Chinstrap\Core\Events\RegisterStaticRoutes;
use Chinstrap\Plugins\DynamicSearch\Listeners\RegisterSearchIndexRoute;
use Chinstrap\Plugins\DynamicSearch\Plugin;
use Chinstrap\Plugins\DynamicSearch\Tests\TestCase;
use Mockery as m;

final class PluginTest extends TestCase
{
    public function testSetup()
    {
        $router = m::mock('League\Route\Router');
        $listener = new RegisterSearchIndexRoute($router);
        $emitter = m::mock('Laminas\EventManager\EventManagerInterface');
        $emitter->shouldReceive('attach')
            ->with(RegisterStaticRoutes::class, $listener)
            ->once();
        $plugin = new Plugin($emitter, $listener);
        $plugin->register();
    }
}
