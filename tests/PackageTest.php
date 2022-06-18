<?php

namespace Creasi\Tests;

use Creasi\Laravel\Package;

class PackageTest extends TestCase
{
    /** @test */
    public function it_should_be_true()
    {
        $package = $this->app->get('package');

        $this->assertInstanceOf(Package::class, $package);

        $this->assertEquals('Lorem ipsum', $package->lorem());
    }
}
