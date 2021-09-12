<?php

declare(strict_types=1);

namespace Domain\Test\Unit\Modules\Authentication\Domain\Entities\User;

use Domain\Modules\Authentication\Domain\Entities\User\Types\Name;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class NameTest extends TestCase
{
    public function testSuccess(): void
    {
        $name = new Name($value = 'Иван Петрович');

        self::assertEquals($value, $name->getValue());
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Name('');
    }
}
