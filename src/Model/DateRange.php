<?php
/**
 * Created by Igor Banchikov [gurikin]
 * At 23.09.2020 17:19
 */


namespace App\Model;


use App\Exception\ModelException;
use DateTimeInterface;

final class DateRange
{
    /** @var DateTimeInterface */
    private $minDate;
    /** @var DateTimeInterface */
    private $maxDate;

    /**
     * DateRange constructor.
     * @param DateTimeInterface $minDate
     * @param DateTimeInterface $maxDate
     */
    public function __construct(DateTimeInterface $minDate, DateTimeInterface $maxDate)
    {
        $this->minDate = $minDate;
        $this->maxDate = $maxDate;
        if (!$this->checkRange()) {
            throw new ModelException(
                'Максимальная граница диапозона дат не может быть меньше минимальной. Проверьте входные данные.'
            );
        }
    }

    /**
     * @return DateTimeInterface
     */
    public function getMinDate(): DateTimeInterface
    {
        return $this->minDate;
    }

    /**
     * @return DateTimeInterface
     */
    public function getMaxDate(): DateTimeInterface
    {
        return $this->maxDate;
    }

    /**
     * @return bool
     */
    public function checkRange(): bool
    {
        return $this->minDate <= $this->maxDate;
    }
}