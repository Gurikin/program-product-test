<?php
/**
 * Created by Igor Banchikov [gurikin]
 * At 23.09.2020 17:33
 */


namespace App\Service\Helper;


use App\Exception\HelperException;
use DateTime;
use DateTimeInterface;
use Exception;

class DateFromStringHelper
{
    private const DATE_FORMAT = 'Y-m-d';

    /**
     * @param string $dateString
     * @return DateTimeInterface
     * @throws HelperException
     */
    public static function executeHelp(string $dateString): DateTimeInterface
    {
        try {
            $resultDate = new DateTime($dateString);
        } catch (Exception $e) {
            throw new HelperException('Не удалось получить объект DateTime из строки. Формат входных данных должен соотвествовать: ' . self::DATE_FORMAT);
        }

        return $resultDate;
    }
}