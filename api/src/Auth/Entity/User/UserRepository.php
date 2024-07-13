<?php

declare(strict_types=1);

namespace App\Auth\Entity\User;

use DomainException;

interface UserRepository
{
    public function hasByEmail(Email $email): bool;
    public function findByJoinConfirmToken(string $token): ?User;
    public function hasByNetwork(NetworkIdentity $identity): bool;
    public function add(User $user): void;
    /**
     * @param Id $id
     * @return User
     * @throws DomainException
     */
    public function get(Id $id): User;
}