<?php

namespace App\Resolvers\PerPage;

use App\Resolvers\Resolver;

class PerPageResolver extends Resolver implements PerPageResolverInterface
{
    /**
     * @inheritDoc
     */
    public function resolve($value): int
    {
        $strict = config('pagination.strict');

        $allowed = config('pagination.allowed');

        if (in_array($value, $allowed)) {
            return $value;
        }

        if ($strict === false) {
            return config('pagination.per_page');
        }

        $this->handleInvalidArgument($value);
    }
}
