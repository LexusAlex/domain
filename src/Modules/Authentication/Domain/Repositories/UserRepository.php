<?php

declare(strict_types=1);

namespace Domain\Modules\Authentication\Domain\Repositories;

use Domain\Modules\Authentication\Domain\Entities\User\Types\Email;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use Domain\Modules\Authentication\Domain\Entities\User\User;
use DomainException;

class UserRepository implements UserRepositoryInterface
{
    private $users;

    public function get(Id $id): User
    {
        if (!isset($this->users[$id->getValue()])) {
            throw new DomainException('User is not found.');
        }
        return clone $this->users[$id->getValue()];
    }

    public function save(User $user): void
    {
        $this->users[$user->getId()->getValue()] = $user;
    }

    public function add(User $user): void
    {
        $this->users[$user->getId()->getValue()] = $user;
    }

    public function remove(User $user): void
    {
        if ($this->users[$user->getId()->getValue()]) {
            unset($this->users[$user->getId()->getValue()]);
        }
    }

    public function hasByEmail(Email $email): void
    {
        // TODO: Implement hasByEmail() method.
    }
}