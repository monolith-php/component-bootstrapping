<?php namespace Monolith\ComponentBootstrapping;

use Monolith\Collections\Collection;
use Monolith\DependencyInjection\Container;
use Throwable;

final class ComponentLoader
{
    /** @var Container */
    private $container;
    /** @var Collection */
    private $registered;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->registered = new Collection;
    }

    public function register(ComponentBootstrap ...$bootstrap)
    {
        $this->registered = $this->registered->merge(new Collection($bootstrap));
    }

    public function load(): Container
    {
        // bind components to container
        $this->bindComponents($this->registered);

        // Initialize the components
        $this->initializeComponents($this->registered);

        return $this->container;
    }

    private function bindComponents($components): void
    {
        /** @var ComponentBootstrap $component */
        foreach ($components as $component) {
            try {
                $component->bind($this->container);
            } catch (Throwable $e) {
                throw CanNotLoadComponent::receivedExceptionLoadingComponentBootstrap(get_class($component), $e);
            }
        }
    }

    private function initializeComponents($components): void
    {
        /** @var ComponentBootstrap $bootstrap */
        foreach ($components as $component) {
            try {
                $component->init($this->container);
            } catch (Throwable $e) {
                throw CanNotLoadComponent::receivedExceptionLoadingComponentBootstrap(get_class($component), $e);
            }
        }
    }
}
