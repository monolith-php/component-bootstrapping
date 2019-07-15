<?php namespace spec\Monolith\ComponentBootstrapping;

use Monolith\ComponentBootstrapping\ComponentBootstrap;
use Monolith\DependencyInjection\Container;

final class BrokenBindComponentBootstrapStub implements ComponentBootstrap
{
    public function bind(Container $container): void
    {
        throw new \Exception("sorry");
    }

    public function init(Container $container): void
    {

    }
}