<?php

class ServerTest extends RocketeerTests
{

	////////////////////////////////////////////////////////////////////
	//////////////////////////////// TESTS /////////////////////////////
	////////////////////////////////////////////////////////////////////

	public function testCanGetValueFromDeploymentsFile()
	{
		$this->assertEquals('bar', $this->app['rocketeer.server']->getValue('foo'));
	}

	public function testCanSetValueInDeploymentsFile()
	{
		$this->app['rocketeer.server']->setValue('foo', 'baz');

		$this->assertEquals('baz', $this->app['rocketeer.server']->getValue('foo'));
	}

	public function testCandeleteRepository()
	{
		$this->app['rocketeer.server']->deleteRepository();

		$this->assertFalse($this->app['files']->exists(__DIR__.'/meta/deployments.json'));
	}

	public function testCanFallbackIfFileDoesntExist()
	{
		$this->app['rocketeer.server']->deleteRepository();

		$this->assertEquals(null, $this->app['rocketeer.server']->getValue('foo'));
	}

	public function testCanGetLineEndings()
	{
		$this->app['rocketeer.server']->deleteRepository();

		$this->assertEquals(PHP_EOL, $this->app['rocketeer.server']->getLineEndings());
	}

	public function testCanGetSeparators()
	{
		$this->app['rocketeer.server']->deleteRepository();

		$this->assertEquals(DIRECTORY_SEPARATOR, $this->app['rocketeer.server']->getSeparator());
	}
}
