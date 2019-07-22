<?php


namespace App\DataFixtures;


use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CampusFixtures extends Fixture
{
    const CAMPUS = [
        'Nantes',
        'Bordeaux',
        'La Loupe',
        'Paris',
        'Lille'
    ];
    public function load(ObjectManager $manager)
    {
        foreach (self::CAMPUS as $key => $campusCity){
            $campus = new Campus();
            $campus->setCity($campusCity);
            $manager->persist($campus);
            $this->addReference('campus_' . $key, $campus);
        }
        $manager->flush();
    }
}