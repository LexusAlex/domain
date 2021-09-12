<?php

declare(strict_types=1);

namespace Domain\Test\Unit\Modules\Authentication\Domain\Entities\User;

use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * @internal
 */
final class IdTest extends TestCase
{
    public function testSuccess(): void
    {
        $uuid = Uuid::uuid4()->toString();
        $id = new Id($uuid);

        self::assertEquals($uuid, $id->getValue());
    }

    public function testIncorrect(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Id('12345');
    }

    public function testGenerate(): void
    {
        $id = Id::generate();

        self::assertNotEmpty($id->getValue());
    }

    public function testEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $id = new Id('');
    }
}
