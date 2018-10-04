<?php namespace spec\Monolith\ComponentBootstrapping;

use Monolith\ComponentBootstrapping\ComponentBootstrap;
use Monolith\DependencyInjection\Container;

final class ComponentBootstrapStub implements ComponentBootstrap
{
    private $bindWasRun = false;
    private $initWasRun = false;

    public function bind(Container $container): void
    {
        $this->bindWasRun = true;
    }

    public function init(Container $container): void
    {
        $this->initWasRun = true;
    }

    public function bindWasRun(): bool
    {
        return $this->bindWasRun;
    }

    public function initWasRun(): bool
    {
        return $this->initWasRun;
    }
}