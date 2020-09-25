<?php

namespace App\Controller;

use App\Exception\HelperException;
use App\Model\DateRange;
use App\Service\Helper\DateFromStringHelper;
use Exception;
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
     * @throws Exception
     */
    public function findTimeMap(int $eventId, string $minDateString, ?string $maxDateString = null): JsonResponse
    {
        $status = Response::HTTP_OK;

        try {
            $minDate = DateFromStringHelper::executeHelp($minDateString);
            $maxDate = DateFromStringHelper::executeHelp($maxDateString);
            $dateRange = new DateRange($minDate, $maxDate);
            $message = ['message' => $dateRange];
        } catch (HelperException $ex) {
            $message = ['warning' => $ex->getMessage()];
            $status = Response::HTTP_BAD_REQUEST;
        } catch (Exception $ex) {
            $message = ['error' => $ex->getMessage()];
            $status = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return $this
            ->json($message, $status)
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
