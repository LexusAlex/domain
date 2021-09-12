<?php

declare(strict_types=1);

namespace Domain\Modules\Authentication\Domain\Entities\User\Types;

use Webmozart\Assert\Assert;

final class Name
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
