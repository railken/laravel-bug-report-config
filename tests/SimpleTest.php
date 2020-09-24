<?php

namespace Tests;

class SimpleTest extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
        ];
    }

    public function testConfigWithUnset()
    {   
        $cfg = $this->app->get('config');
        $this->assertEquals(3, $cfg->get('foo', 3));

        $cfg->set('foo', 5);

        $this->assertEquals(5, $cfg->get('foo'));

        unset($cfg->all()['foo']);

        $this->assertEquals(7, $cfg->get('foo', 7)); // fails, $cfg->get('foo') return null
    }

    public function testConfigWithoffsetUnset()
    {   
        $cfg = $this->app->get('config');
        $this->assertEquals(3, $cfg->get('foo', 3));

        $cfg->set('foo', 5);

        $this->assertEquals(5, $cfg->get('foo'));

        $cfg->offsetUnset('foo');

        $this->assertEquals(7, $cfg->get('foo', 7)); // fails, $cfg->get('foo') return null
    }

    
}
