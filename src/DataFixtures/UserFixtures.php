<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserFixtures
 * @package App\DataFixtures
 */
class UserFixtures extends Fixture {

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder Password encoder instance
     */
    public function __construct(UserPasswordEncoderInterface $encoder, EntityManagerInterface $entityManager) {
        $this->encoder = $encoder;
        $this->entityManager = $entityManager;
    }

    /**
     * @param ObjectManager $manager Object manager instance
     *
     * @return void
     */
    public function load(ObjectManager $manager): void {
        foreach ($this->getUserData() as [$username, $password, $roles]) {
            $user = new User();
            $user->setUsername($username);
            $user->setRoles($roles);
            $hashPassword = $this->encoder->encodePassword($user, $password);
            $user->setPassword($hashPassword);
            $this->entityManager->persist($user);
            $this->addReference($username, $user);
        }

        $this->entityManager->flush();
    }

    private function getUserData(): array {
        return [
            ['admin', 'secret', ['ROLE_ADMIN']],
            ['user', 'test123', ['ROLE_USER']],
        ];
    }

}
