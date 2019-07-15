<?php namespace spec\Monolith\ComponentBootstrapping;

use Monolith\ComponentBootstrapping\CanNotLoadComponent;
use Monolith\ComponentBootstrapping\ComponentLoader;
use Monolith\DependencyInjection\Container;
use PhpSpec\ObjectBehavior;

class ComponentLoaderSpec extends ObjectBehavior
{
    /** @var Container */
    private $container;
    /** @var ComponentBootstrapStub */
    private $bootstrap;

    function let()
    {
        $this->bootstrap = new ComponentBootstrapStub;
        $this->container = new Container;

        $this->beConstructedWith($this->container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ComponentLoader::class);
    }

    function it_can_register_component_bootstraps()
    {
        $this->register($this->bootstrap);

        expect($this->bootstrap->bindWasRun())->shouldBe(false);
        expect($this->bootstrap->initWasRun())->shouldBe(false);

        $this->load();

        expect($this->bootstrap->bindWasRun())->shouldBe(true);
        expect($this->bootstrap->initWasRun())->shouldBe(true);
    }

    function it_throws_a_component_loading_exception_if_bind_fails()
    {
        $this->register(new BrokenBindComponentBootstrapStub);

        $this->shouldThrow(CanNotLoadComponent::class)->during('load', []);
    }

    function it_throws_a_component_loading_exception_if_init_fails()
    {
        $this->register(new BrokenInitComponentBootstrapStub());

        $this->shouldThrow(CanNotLoadComponent::class)->during('load', []);
    }
}
