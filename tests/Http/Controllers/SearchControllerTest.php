<?php

declare(strict_types=1);

namespace Chinstrap\Plugins\DynamicSearch\Tests\Http\Controllers;

use Chinstrap\Plugins\DynamicSearch\Http\Controllers\SearchController;
use Chinstrap\Plugins\DynamicSearch\Tests\TestCase;
use Mockery as m;
use PublishingKit\Utilities\Collections\Collection;

final class SearchControllerTest extends TestCase
{
    public function testIndex()
    {
        $response = Collection::make([['foo']]);
        $source = m::mock('Chinstrap\Core\Contracts\Sources\Source');
        $source->shouldReceive('all')->once()->andReturn($response);
        $controller = new SearchController($source);
        $result = $controller->index();
        $this->assertInstanceOf('Laminas\Diactoros\Response\JsonResponse', $result);
        $this->assertEquals('[["foo"]]', $result->getBody()->getContents());
    }
}
