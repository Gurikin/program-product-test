<?php

namespace App\Controller;

use App\Exception\HelperException;
use App\Model\DateRange;
use App\Service\Helper\DateFromStringHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

final class ScheduleController extends AbstractController
{
    /**
     * @Route("/schedule/timeMapRange/{eventId}/{minDateString}/{maxDateString}", name="schedule", methods={"GET"})
     * @param int $eventId
     * @param string $minDateString
     * @param string $maxDateString
     * @return JsonResponse
     * @throws HelperException
     */
    public function findTimeMap(int $eventId, string $minDateString, string $maxDateString = ''): JsonResponse
    {
        try {
            $minDate = DateFromStringHelper::executeHelp($minDateString);
            $maxDate = DateFromStringHelper::executeHelp($maxDateString);
        } catch (HelperException $ex) {
            throw $ex;
        }
        $dateRange = new DateRange($minDate, $maxDate);
        return $this->json([]);
    }
}
