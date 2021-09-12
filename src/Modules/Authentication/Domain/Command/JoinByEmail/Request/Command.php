<?php

declare(strict_types=1);

namespace Domain\Modules\Authentication\Domain\Command\JoinByEmail\Request;

final class Command
{
    public string $email = '';
    public string $password = '';
}
