<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch\Listeners;

use Chinstrap\Core\Listeners\BaseListener;
use League\Event\EventInterface;
use League\Route\Router;

final class RegisterSearchIndexRoute extends BaseListener
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle(EventInterface $event)
    {
        $this->router->get('/search/index', 'Chinstrap\Plugins\DynamicSearch\Http\Controllers\SearchController::index');
    }
}
