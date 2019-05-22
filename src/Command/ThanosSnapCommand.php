<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\HttpClient\HttpClient;

class ThanosSnapCommand extends Command
{
    protected static $defaultName = 'app:thanos-snap';

    protected function configure()
    {
        $this->setDescription('Thanos obteve as 6 jóias do infinito e ...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $httpClient = HttpClient::create();
        $response = $httpClient->request('GET', 'https://localhost:8000/api/avengers?isActive=1');
        $statusCode = $response->getStatusCode();
        if ($statusCode >= 400) {
            $io->error('... algo aconteceu com ele :P');
            return;
        }
        $allHeroes = json_decode($response->getContent());
        $allHeroes = get_object_vars($allHeroes)['hydra:member'];
        $vanishingNames = ['Lobo Branco', 'Pantera Negra', 'Groot', 'Feiticeira Escarlate', 'Falcão', 'Mantis', 'Drax', 'Senhor das Estrelas', 'Doutor Estranho', 'Nick Fury', 'Vespa', 'Homem Aranha'];
        $snappedHeroes = array_filter($allHeroes, function ($hero) use ($vanishingNames) {
            return in_array($hero->name, $vanishingNames);
        });
        ProgressBar::setFormatDefinition('thanos', ' %current%/%max% -- %message%');
        $progressBar = new ProgressBar($output, count($snappedHeroes));
        $progressBar->setFormat('thanos');
        $progressBar->setMessage('Thanos obteve as 6 jóias do infinito e ...');
        $progressBar->start();

        $parameters = [
            'body' => '{"isActive": false}',
            'headers' => [
                'Content-Type' => 'application/ld+json'
            ]
        ];
        foreach ($snappedHeroes as $snappedHero) {
            $httpClient->request('PUT', 'https://localhost:8000/api/avengers/' . $snappedHero->id, $parameters);
            sleep(1);
            $progressBar->advance();
            $progressBar->setMessage($snappedHero->name . ' se foi ...');
        }
        $progressBar->finish();
        $io->error('... e metade da vida no universo foi dizimada');
    }
}
