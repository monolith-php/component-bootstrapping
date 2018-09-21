<?php namespace Monolith\ComponentBootstrapping;

use Monolith\DependencyInjection\Container;

interface ComponentBootstrap {
    public function bind(Container $container): void;
    public function init(Container $container): void;
}