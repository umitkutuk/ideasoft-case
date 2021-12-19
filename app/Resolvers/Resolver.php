<?php

namespace App\Resolvers;

use App\Exceptions\InvalidResolverValueException;

class Resolver
{
    /**
     * @param $value
     * @param null $message
     * @throws \App\Exceptions\InvalidResolverValueException
     */
    public function handleInvalidArgument($value, $message = null)
    {
        $type = gettype($value);

        if ($type == 'object') {
            $value = 'object';
        }

        if ($type == 'array') {
            $value = 'array';
        }

        $message = $message ?? sprintf('Invalid type of argument (%s -> %s) given for %s resolver', $type, $value, get_called_class());

        throw new InvalidResolverValueException($message);
    }
}
