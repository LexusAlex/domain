<?php

declare(strict_types=1);

namespace Domain\Modules\Authentication\Domain\Repositories;

use Domain\Modules\Authentication\Domain\Entities\User\Types\Email;
use Domain\Modules\Authentication\Domain\Entities\User\Types\Id;
use Domain\Modules\Authentication\Domain\Entities\User\User;

interface UserRepositoryInterface
{
    public function get(Id $id): User;
    public function save(User $user): void;
    public function add(User $user): void;
    public function remove(User $user): void;
}