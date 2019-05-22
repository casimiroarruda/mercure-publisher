<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Avenger;


class AvengersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $data = [
            ['name' => "Thor", 'imageHref' => "thor.jpg", 'isActive' => true],
            ['name' => "Lobo Branco", 'imageHref' => "lobo-branco.jpg", 'isActive' => true],
            ['name' => "Pantera Negra", 'imageHref' => "pantera-negra.jpg", 'isActive' => true],
            ['name' => "Ronin", 'imageHref' => "ronin.jpg", 'isActive' => true],
            ['name' => "Groot", 'imageHref' => "groot.jpg", 'isActive' => true],
            ['name' => "Homem de Ferro", 'imageHref' => "homem-de-ferro.jpg", 'isActive' => true],
            ['name' => "Feiticeira Escarlate", 'imageHref' => "feiticeira-escarlate.jpg", 'isActive' => true],
            ['name' => "Capitã Marvel", 'imageHref' => "capita-marvel.jpg", 'isActive' => true],
            ['name' => "Falcão", 'imageHref' => "falcao.jpg", 'isActive' => true],
            ['name' => "Viúva Negra", 'imageHref' => "viuva-negra.jpg", 'isActive' => true],
            ['name' => "Mantis", 'imageHref' => "mantis.jpg", 'isActive' => true],
            ['name' => "Homem Formiga", 'imageHref' => "homem-formiga.jpg", 'isActive' => true],
            ['name' => "Drax", 'imageHref' => "drax.jpg", 'isActive' => true],
            ['name' => "Capitão América", 'imageHref' => "capitao-america.jpg", 'isActive' => true],
            ['name' => "Senhor das Estrelas", 'imageHref' => "senhor-das-estrelas.jpg", 'isActive' => true],
            ['name' => "Rocket Racoon", 'imageHref' => "rocket.jpg", 'isActive' => true],
            ['name' => "Doutor Estranho", 'imageHref' => "doutor-estranho.jpg", 'isActive' => true],
            ['name' => "Valquíria", 'imageHref' => "valquiria.jpg", 'isActive' => true],
            ['name' => "Vespa", 'imageHref' => "vespa.jpg", 'isActive' => true],
            ['name' => "Okoye", 'imageHref' => "okoye.jpg", 'isActive' => true],
            ['name' => "Nick Fury", 'imageHref' => "nick-fury.jpg", 'isActive' => true],
            ['name' => "Bruce Banner", 'imageHref' => "bruce-banner.jpg", 'isActive' => true],
            ['name' => "Homem Aranha", 'imageHref' => "homem-aranha.jpg", 'isActive' => true],
            ['name' => "Gamora", 'imageHref' => "gamora.jpg", 'isActive' => false],
            ['name' => "Loki", 'imageHref' => "loki.jpg", 'isActive' => false],
            ['name' => "Máquina de Combate", 'imageHref' => "maquina-de-combate.jpg", 'isActive' => true],
            ['name' => "Nebulosa", 'imageHref' => "nebulosa.jpg", 'isActive' => true],
            ['name' => "Visão", 'imageHref' => "visao.jpg", 'isActive' => false]
        ];
        foreach ($data as $each) {
            $avenger = new Avenger;
            $avenger->setName($each['name']);
            $avenger->setImageHref($each['imageHref']);
            $avenger->setIsActive($each['isActive']);
            $manager->persist($avenger);
        }
        $manager->flush();
    }
}
