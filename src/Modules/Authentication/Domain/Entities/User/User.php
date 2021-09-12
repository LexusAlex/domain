<?php

declare(strict_types=1);

namespace Domain\Modules\Authentication\Domain\Entities\User;

use DateTimeImmutable;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Email;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Name;
use JetBrains\PhpStorm\Pure;

final class User
{
    private Id $id;
    private Email $email;
    private Name $name;
    private DateTimeImmutable $date_create;
    private DateTimeImmutable $date_update;
    private ?string $passwordHash = null;

    private function __construct(Id $id, Name $name, DateTimeImmutable $date_create, Email $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date_create = $date_create;
        $this->email = $email;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): ?string
    {
        return $this->passwordHash;
    }

    public function getDateCreate(): DateTimeImmutable
    {
        return $this->date_create;
    }

    #[Pure]
 public static function requestJoinByEmail(
     Id $id,
     DateTimeImmutable $date_create,
     Email $email,
     string $passwordHash,
 ): self {
     $user = new self($id, $date_create, $email);
     $user->passwordHash = $passwordHash;
     return $user;
 }
}
