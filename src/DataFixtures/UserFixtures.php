<?php

/**
 * @author gallarian
 * @email gallarian@gmail.com
 */

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Security\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UserFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $users = [
            [
                'email' => 'admin1@test.fr',
                'nickname' => 'admin1',
                'mdp' => '12345'
            ], [
                'email' => 'admin2@test.fr',
                'nickname' => 'admin2',
                'mdp' => '12345'
            ], [
                'email' => 'admin3@test.fr',
                'nickname' => 'admin3',
                'mdp' => '12345'
            ]
        ];

        foreach ($users as $data) {
            $user = new User();
            $user->setEmail($data['email']);
            $user->setNickname($data['nickname']);
            $user->setPassword($this->passwordHasher->hashPassword($user, $data['mdp']));
            $user->setRoles(['ROLE_ADMIN']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
