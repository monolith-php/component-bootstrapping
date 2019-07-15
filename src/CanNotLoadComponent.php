<?php namespace Monolith\ComponentBootstrapping;

final class CanNotLoadComponent extends ComponentLoadingException
{
    public static function receivedExceptionLoadingComponentBootstrap(string $componentClass, \Throwable $exception)
    {
        return new static(
            "Received an exception while loading component bootstrap {$componentClass}.",
            0,
            $exception
        );
    }
}