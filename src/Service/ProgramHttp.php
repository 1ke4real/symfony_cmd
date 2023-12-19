<?php
namespace App\Service;
use AllowDynamicProperties;
use App\Entity\Program;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AllowDynamicProperties]
class ProgramHttp {
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client,EntityManagerInterface $entityManager){
        $this->client = $client;
        $this->entityManager = $entityManager;
        $this->entityManager->createQuery('DELETE FROM App\Entity\Program')->execute();
    }
    public function getProgram(): string
    {
        $response = $this->client->request(
            'GET',
            'https://api.link-app.immo/feed_programs?apiToken='.$_ENV['API_TOKEN_LINK'], [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]
        );
        foreach ($response->toArray() as $key => $value) {
            $programs = new Program();
            $programs->setName($value['name']);
            $this->entityManager->persist($programs);
            $this->entityManager->flush();
        }
        $message = 'Programs added';
        return $message;
    }
}