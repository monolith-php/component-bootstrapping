<?php namespace Monolith\ComponentBootstrapping;

final class CanNotLoadComponent extends \Exception implements ComponentLoadingThrowable
{
    public static function receivedErrorLoadingComponentBootstrap(string $componentClass, \Throwable $throwable)
    {
        return new static(
            "Received an error while loading component bootstrap {$componentClass}.",
            0,
            $throwable
        );
    }

    public static function receivedErrorInstantiatingComponentBootstrap(\Throwable $throwable)
    {
        return new static(
            "Received an error while instantiating component bootstrap.",
            0,
            $throwable
        );
    }
}