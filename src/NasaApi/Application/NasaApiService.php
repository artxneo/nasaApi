<?php

declare(strict_types=1);

namespace App\NasaApi\Application\Service;

use App\NasaApi\Infrastructure\NasaApi;
use App\NasaApi\Infrastructure\Repository\AsteroidRepositoryInterface;
use App\NasaApi\Model\Asteroid;
use App\NasaApi\Model\AsteroidCollection;

class ApiClient
{
    private AsteroidRepositoryInterface $repository;

    private NasaApi $api;

    public function __construct(AsteroidRepositoryInterface $repository, NasaApi $api)
    {
        $this->repository = $repository;
        $this->api = $api;
    }

    public function updateAsteroidsInfo(): void
    {
        $asteroids = $this->api->getAsteroidsInfo();

        //need to hydrate all arrays to models
        $asteroidCollection = new AsteroidCollection();

        $this->repository->save($asteroidCollection);
    }

    public function getHazardous(): AsteroidCollection
    {
        $hazardousAsteroids = $this->repository->findHazardous();

        return $hazardousAsteroids;
    }

    public function getFastest(bool $isHazardous): Asteroid
    {
        return $this->repository->findFastest($isHazardous);
    }

    public function getBestMonth(bool $isHazardous): AsteroidCollection
    {
        return $this->repository->findBestMonth($isHazardous);
    }
}