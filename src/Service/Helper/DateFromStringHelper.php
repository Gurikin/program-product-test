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
    private const DEFAULT_DATE = '+7 days';

    /**
     * @param string $dateString
     * @return DateTimeInterface
     * @throws HelperException
     */
    public static function executeHelp(string $dateString): DateTimeInterface
    {
        try {
            $resultDate = new DateTime($dateString ?? self::DEFAULT_DATE);
        } catch (Exception $e) {
            throw new HelperException('Не удалось получить объект DateTime из строки. Формат входных данных должен соотвествовать: ' . self::DATE_FORMAT);
        }

        return $resultDate;
    }
}