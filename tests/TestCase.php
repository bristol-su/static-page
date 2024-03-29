<?php

namespace BristolSU\Module\Tests\StaticPage;

use BristolSU\Module\StaticPage\ModuleServiceProvider;
use BristolSU\Support\Testing\AssertsEloquentModels;
use BristolSU\Support\Testing\CreatesModuleEnvironment;
use BristolSU\Support\Testing\TestCase as BaseTestCase;
use Prophecy\PhpUnit\ProphecyTrait;

abstract class TestCase extends BaseTestCase
{
    use AssertsEloquentModels, CreatesModuleEnvironment, ProphecyTrait;

    public function setUp(): void
    {
        parent::setUp();
        $this->createModuleEnvironment('static-page');
    }

    protected function getPackageProviders($app)
    {
        return array_merge(parent::getPackageProviders($app), [
            ModuleServiceProvider::class
        ]);
    }

}
