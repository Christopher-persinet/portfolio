<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Image;
use App\Entity\Projet;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
         private $passwordEncoder;

         public function __construct(UserPasswordEncoderInterface $passwordEncoder)
         {
             $this->passwordEncoder = $passwordEncoder;
         }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        // $product = new Product();
        // $manager->persist($product);
         $user->setPassword($this->passwordEncoder->encodePassword(
             $user,
             'the_new_password'
        ));
        // Création d’un utilisateur de type “administrateur”
        $admin = new User();
        $admin->setEmail('admin@monsite.com');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'adminpassword'
        ));
        $manager->persist($admin);

        $projet1 = new Projet();
        $projet1->setTitle('Wild-book');
        $projet1->setDate('2020-09-26');
        $projet1->setDescription('Wild-book est un ressencement de tout les wilders de la session septembre 2020');
        $projet1->setClient('Wild Code School');
        $manager->persist($projet1);

        $projet2 = new Projet();
        $projet2->setTitle('Cine-quiz');
        $projet2->setDate('2020-10-20');
        $projet2->setDescription('Cine-quiz est un site pour tester ses connaissance du cinéma avec la possibilité d\'ajouté ses propres quiz');
        $projet2->setClient('Pellicule ensorcelée');
        $manager->persist($projet2);

        $image1 = new Image();
        $image1->setName('10d28663a368132d31fbb15a7dd72bda.png');
        $image1->setProjet($projet1);
        $manager->persist($image1);

        $image2 = new Image();
        $image2->setName('a818b6a25054e467ad23b0f1975c91a0.png');
        $image2->setProjet($projet2);
        $manager->persist($image2);

        $image2 = new Image();
        $image2->setName('290a99e10f0f050b4ee3f17ff75b3b17.png');
        $image2->setProjet($projet2);
        $manager->persist($image2);

        $image2 = new Image();
        $image2->setName('e2a4de5442dda115260a7053a3a56a52.png');
        $image2->setProjet($projet2);
        $manager->persist($image2);

        $manager->flush();
    }
}
