<?php

namespace Creasi\Tests;

use PHPUnit\Framework\Attributes\Test;

class PackageTest extends TestCase
{
    #[Test]
    public function it_should_be_true()
    {
        $package = $this->app->get('creasi.package');

        $this->assertEquals('Lorem ipsum', $package->lorem());
    }
}
