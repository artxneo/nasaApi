<?php

declare(strict_types=1);

namespace App\Controller;

use App\NasaApi\Application\Service\ApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NasaController extends AbstractController
{
    /**
     * @Route("/neo/hazardous", name="neo_hazardous")
     */
    public function hazardous(ApiClient $apiClient): JsonResponse
    {
        //make pagination
        return $this->json($apiClient->getHazardous());
    }

    /**
     * @Route("/neo/fastest", name="neo_fastest", defaults={"hazardous": false})
     */
    public function fastest(ApiClient $apiClient, bool $hazardous): JsonResponse
    {
        return $this->json($apiClient->getFastest($hazardous));
    }

    /**
     * @Route("/neo/best-month", name="neo_best_month", defaults={"hazardous": false})
     */
    public function bestMonth(ApiClient $apiClient, bool $hazardous): JsonResponse
    {
        //make pagination
        return $this->json($apiClient->getBestMonth($hazardous));
    }
}
