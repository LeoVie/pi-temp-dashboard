<?php

namespace LeoVie\PiTempDashboard\Exception;

use LeoVie\PiTempDashboard\Constant\RelativeHumidityConstant;

class RelativeHumidityOutOfBoundsException extends AbstractOutOfBoundsException
{
    public function __construct(int $mode, float $relativeHumidity)
    {
        switch ($mode) {
            case self::TOO_LOW:
                $message = "Relative humidity of $relativeHumidity is under min relative humidity of " . RelativeHumidityConstant::MIN_RELATIVE_HUMIDITY;
                break;
            case self::TOO_HIGH:
                $message = "Relative humidity of $relativeHumidity is over max relative humidity of " . RelativeHumidityConstant::MAX_RELATIVE_HUMIDITY;
                break;
            default:
                $message = "Relative humidity of $relativeHumidity is not valid";
                break;
        }

        $message = $message . '.';

        parent::__construct($message);
    }
}