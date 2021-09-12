<?php

declare(strict_types=1);

namespace Domain\Test\Unit\Modules\Authentication\Domain\Service;

use Domain\Modules\Authentication\Domain\Service\PasswordHash;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class PasswordHashTest extends TestCase
{
    public function testHash(): void
    {
        $hash = new PasswordHash(16);
        $hash = $hash->hash($password = 'new-password');

        self::assertNotEmpty($hash);
        self::assertNotEquals($password, $hash);
    }

    public function testHashEmpty(): void
    {
        $hash = new PasswordHash(16);

        $this->expectException(InvalidArgumentException::class);
        $hash->hash('');
    }

    public function testValidate(): void
    {
        $hash = new PasswordHash(16);

        $string = $hash->hash($password = 'new-password');

        self::assertTrue($hash->validate($password, $string));
        self::assertFalse($hash->validate('wrong-password', $string));
    }
}
