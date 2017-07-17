<?php namespace Monolith\ComponentFramework;

interface ComponentBootstrap {
    public function bind(Container $container): void;
    public function start(Container $container): void;
}