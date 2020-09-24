<?php

namespace App\Controller;

use App\Exception\HelperException;
use App\Model\DateRange;
use App\Service\Helper\DateFromStringHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ScheduleController extends AbstractController
{
    /**
     * @Route("/schedule/timeMapRange/{eventId}/{minDateString}/{maxDateString}", name="schedule", methods={"GET"})
     * @param int $eventId
     * @param string $minDateString
     * @param string|null $maxDateString
     * @return JsonResponse
     */
    public function findTimeMap(int $eventId, string $minDateString, ?string $maxDateString = null): JsonResponse
    {
        try {
            $minDate = DateFromStringHelper::executeHelp($minDateString);
            $maxDate = DateFromStringHelper::executeHelp($maxDateString);
        } catch (HelperException $ex) {
            return $this->json($ex->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $dateRange = new DateRange($minDate, $maxDate);
        return $this->json($dateRange);
    }
}
