<?php

declare(strict_types=1);

namespace App\NasaApi\Infrastructure\Repository;

use App\NasaApi\Model\Asteroid;
use App\NasaApi\Model\AsteroidCollection;

interface AsteroidRepositoryInterface
{
    public function save(AsteroidCollection $asteroid): void;

    public function findHazardous(): AsteroidCollection;

    public function findFastest(bool $isHazardous): Asteroid;

    public function findBestMonth(bool $isHazardous): AsteroidCollection;
}