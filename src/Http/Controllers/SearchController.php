<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch\Http\Controllers;

use Chinstrap\Core\Contracts\Sources\Source;
use Laminas\Diactoros\Response\JsonResponse;

final class SearchController
{
    /**
     * @var Source
     */
    private $source;

    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    public function index(): JsonResponse
    {
        $searchable = $this->source->all();
        return new JsonResponse(
            $searchable->toArray(),
            200,
            ['Content-Type' => ['application/hal+json']]
        );
    }
}
