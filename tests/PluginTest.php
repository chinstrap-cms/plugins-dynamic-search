<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch\Tests;

use Chinstrap\Plugins\DynamicSearch\Plugin;
use Chinstrap\Plugins\DynamicSearch\Tests\TestCase;
use Mockery as m;

final class PluginTest extends TestCase
{
    public function testSetup()
    {
        $router = m::mock('League\Route\Router');
        $plugin = new Plugin($router);
        $router->shouldReceive('get')
            ->with('/search/index', 'Chinstrap\Plugins\DynamicSearch\Http\Controllers\SearchController::index')
            ->once();
        $plugin->register();
    }
}
