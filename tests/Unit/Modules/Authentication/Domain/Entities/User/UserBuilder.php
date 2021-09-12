<?php

declare(strict_types=1);

namespace Domain\Test\Unit\Modules\Authentication\Domain\Entities\User;

use DateTimeImmutable;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Email;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Name;

final class UserBuilder
{
    private Id $id;
    private Email $email;
    private Name $name;
    private string $passwordHash;
    private DateTimeImmutable $date_create;

    public function __construct()
    {
        $this->id = Id::generate();
        $this->email = new Email('mail@example.com');
        $this->passwordHash = 'secretHash';
        $this->date_create = new DateTimeImmutable();
    }

    public function withId(Id $id): self
    {
        $clone = clone $this;
        $clone->id = $id;
        return $clone;
    }

    public function build(): void
    {
    }
}
