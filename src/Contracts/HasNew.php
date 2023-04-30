<?php

namespace Illegal\LaravelUtils\Contracts;

trait HasNew
{
    /**
     * Return a new instance of the class
     */
    public static function new(): self
    {
        return new static();
    }
}
