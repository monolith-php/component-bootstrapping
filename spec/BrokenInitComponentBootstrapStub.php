<?php namespace spec\Monolith\ComponentBootstrapping;

use Monolith\ComponentBootstrapping\ComponentBootstrap;
use Monolith\DependencyInjection\Container;

final class BrokenInitComponentBootstrapStub implements ComponentBootstrap
{
    public function bind(Container $container): void
    {

    }

    public function init(Container $container): void
    {
        throw new \Exception("sorry");
    }
}