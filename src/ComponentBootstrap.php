<?php namespace Monolith\ComponentFramework;

use Monolith\DependencyInjection\Container;

interface ComponentBootstrap {
    public function bind(Container $container): void;
    public function start(Container $container): void;
}