<?php

namespace Creasi\Tests;

use Creasi\Laravel\FooBar;

class FooBarTest extends TestCase
{
    /** @test */
    public function it_should_be_true()
    {
        $fooBar = new FooBar();

        $this->assertEquals('Lorem ipsum', $fooBar->lorem());
    }
}
