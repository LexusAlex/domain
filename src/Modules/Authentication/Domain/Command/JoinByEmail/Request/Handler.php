<?php

declare(strict_types=1);

namespace Domain\Modules\Authentication\Domain\Command\JoinByEmail\Request;

use DateTimeImmutable;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Email;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use Domain\Modules\Authentication\Domain\Entities\User\User;
use Domain\Modules\Authentication\Domain\Service\PasswordHash;
use DomainException;

final class Handler
{
    private UserRepository $users;
    private PasswordHash $hash;

    public function __construct(
        UserRepository $users,
        PasswordHash $hash,
    ) {
        $this->users = $users;
        $this->hash = $hash;
    }

    public function handle(Command $command): void
    {
        $email = new Email($command->email);

        if ($this->users->hasByEmail($email)) {
            throw new DomainException('User already exists.');
        }

        $date = new DateTimeImmutable();

        $user = User::requestJoinByEmail(
            Id::generate(),
            $date,
            $email,
            $this->hash->hash($command->password)
        );

        $this->users->add($user);
    }
}
