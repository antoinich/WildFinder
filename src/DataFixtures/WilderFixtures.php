<?php


namespace App\DataFixtures;


 use App\Entity\Wilder;
 use Doctrine\Bundle\FixturesBundle\Fixture;
 use Doctrine\Common\DataFixtures\DependentFixtureInterface;
 use Doctrine\Common\Persistence\ObjectManager;
 use Faker;

 class WilderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++){
            $wilder = new Wilder();
            $faker  =  Faker\Factory::create('fr_FR');
            $wilder->setName($faker->name);
            $wilder->setFirstName($faker->firstName);
            $wilder->setAge($faker->numberBetween(15,99));
            $wilder->setGender($faker->randomElement($array = array('male', 'female', 'apache helicopter')));
            $wilder->setLanguage($faker->randomElement($array = array('PHP', 'JS', 'JAVA')));
            $wilder->setImage($faker->imageUrl(640, 480, 'cats', true, 'Faker', true));
            $wilder->setJoke($faker->sentence);
            $wilder->setCity($this->getReference('campus_'.rand(0,4)));
            $manager->persist($wilder);
        }
        $manager->flush();
    }

    public function getDependencies()
 {
        return [CampusFixtures::class];
 }
 }