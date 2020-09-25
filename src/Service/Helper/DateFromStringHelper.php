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
    private const DEFAULT_DATE_PATTERN_POSTFIX = '(\s\+7\sdays)?';

    /**
     * @param string|null $dateString
     * @return DateTimeInterface
     * @throws HelperException
     * @throws Exception
     */
    public static function executeHelp(string $dateString): DateTimeInterface
    {
        if (!preg_match(
            '~^([\d]{4})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][\d]|3[0-1])' . self::DEFAULT_DATE_PATTERN_POSTFIX . '$~',
            $dateString)
        ) {
            throw new HelperException(
                'Указан неверный формат даты. Формат входных данных должен соотвествовать: ' . self::DATE_FORMAT
            );
        }
        try {
            return new DateTime($dateString);
        } catch (Exception $ex) {
            throw $ex;
        }

    }
}