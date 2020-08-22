<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch;

use League\Route\Router;
use Chinstrap\Core\Contracts\Plugin as PluginContract;

final class Plugin implements PluginContract
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function register(): void
    {
        $this->registerRoute();
    }

    private function registerRoute(): void
    {
        $this->router->get('/search/index', 'Chinstrap\Plugins\DynamicSearch\Http\Controllers\SearchController::index');
    }
}
