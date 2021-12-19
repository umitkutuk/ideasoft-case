<?php

namespace App\Resolvers;

interface ResolverInterface
{
    /**
     * Resolve entity by the given value
     *
     * @param mixed $value
     * @return mixed
     * @throws \App\Exceptions\InvalidResolverValueException
     */
    public function resolve($value);
}