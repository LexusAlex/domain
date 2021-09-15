<?php

declare(strict_types=1);

namespace Domain\Test\Unit\Modules\Authentication\Domain\Command\JoinByEmail;

use Domain\Modules\Authentication\Domain\Entities\User\Types\Email;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use Domain\Modules\Authentication\Domain\Entities\User\User;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class RequestTest extends TestCase
{
    public function testSuccess(): void
    {
        $user = User::requestJoinByEmail(
            $id = Id::generate(),
            $date_create = new \DateTimeImmutable(),
            $email = new Email('mail@example.com'),
            $hash = 'hash',
        );

       // TODO Дописать тест
    }
}