<?php

namespace Creasi\Tests\Models;

use Creasi\Package\Models\Sample;
use Creasi\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class SampleTest extends TestCase
{
    #[Test]
    public function should_be_exists()
    {
        $model = Sample::factory()->createOne();

        $this->assertModelExists($model);

        $this->assertEquals(env('DB_CONNECTION', 'sqlite'), $model->getConnectionName(), 'Should runs on the same connection');
    }
}
