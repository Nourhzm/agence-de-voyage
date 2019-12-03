<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ProgramationCircuit;

class LoadProgramationCircuitData extends Fixture implements DependentFixtureInterface
{
	public function load(ObjectManager $manager)
	{
	    $circuit=$this->getReference('andalousie-circuit');
	    
	    
	    //$circuit = $this->manager(Circuit::class,8);
	    
	    $programation= new ProgramationCircuit();
	    $programation->setDateDepart(\DateTime::createFromFormat('Y-m-d H:i:s',"2020-03-05 15:45:02"));
	    $programation->SetNombrePersonnes(60);
	    $programation->setPrix(200);
	    //$programation->setCircuit($circuit);
	    //$programation = $circuit->addProgrammation(,60,200);
	    $circuit->addProgrammation($programation);
	    $manager->persist($programation);
	    
	    
	    $programation = new ProgramationCircuit();
	    $programation->setDateDepart(\DateTime::createFromFormat('Y-m-d H:i:s',"2019-03-16 14:03:50"));
	    $programation->SetNombrePersonnes(60);
	    $programation->setPrix(200);
	    //$programation = $circuit->addProgrammation(,60,200);
	    $circuit->addProgrammation($programation);
	    $manager->persist($programation);
	    
	    
	    $circuit=$this->getReference('vietnam-circuit'); 
	    
	  //  $circuit = $this->manager(Circuit::class,7);
	    
	    
	    $programation = new ProgramationCircuit();
	    $programation->setDateDepart(\DateTime::createFromFormat('Y-m-d H:i:s',"2018-03-03 14:03:50"));
	    $programation->SetNombrePersonnes(60);
	    $programation->setPrix(200);
	    //$programation = $circuit->addProgrammation(,60,200);
	    $circuit->addProgrammation($programation);
	    $manager->persist($programation);
	    
	    $programation = new ProgramationCircuit();
	    $programation->setDateDepart(\DateTime::createFromFormat('Y-m-d H:i:s',"2019-03-03 08:12:45"));
	    $programation->SetNombrePersonnes(100);
	    $programation->setPrix(150);
	    //$programation = $circuit->addProgrammation(,60,200);
	    $circuit->addProgrammation($programation);
	    $manager->persist($programation);
	  
	    $circuit=$this->getReference('idf-circuit');
	   // $circuit = $manager->find(Circuit::class,6);
	    
	    
	    $programation = new ProgramationCircuit();
	    $programation->setDateDepart(\DateTime::createFromFormat('Y-m-d H:i:s',"2019-03-03 07:15:00"));
	    $programation->SetNombrePersonnes(100);
	    $programation->setPrix(300);
	    //$programation = $circuit->addProgrammation(,60,200);
	    $circuit->addProgrammation($programation);
	    $manager->persist($programation);
	    
	    
	    
	    $circuit=$this->getReference('italie-circuit');
	   // $circuit = $manager->find(Circuit::class,5);
	    
	    
	    $programation = new ProgramationCircuit();
	    $programation->setDateDepart(\DateTime::createFromFormat('Y-m-d H:i:s',"2019-03-04 10:10:50"));
	    $programation->SetNombrePersonnes(100);
	    $programation->setPrix(300);
	    //$programation = $circuit->addProgrammation(,60,200);
	    $circuit->addProgrammation($programation);
	    $manager->persist($programation);
	    
	    $manager->persist($circuit);
	    
	    $manager->flush();
	    
	}


public function getDependencies()
{
    return array(
        LoadCircuitData::class,
    );
}
}