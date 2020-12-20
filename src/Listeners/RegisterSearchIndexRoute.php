<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch\Listeners;

use Chinstrap\Core\Listeners\BaseListener;
use Laminas\EventManager\EventInterface;
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

    public function __invoke(EventInterface $event): void
    {
        $this->router->get('/search/index', 'Chinstrap\Plugins\DynamicSearch\Http\Controllers\SearchController::index');
    }
}
