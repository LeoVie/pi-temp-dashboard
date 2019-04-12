<?php

namespace LeoVie\PiTempDashboard\Exception;

use LeoVie\PiTempDashboard\Constant\TemperatureConstant;

class TemperatureOutOfBoundsException extends AbstractOutOfBoundsException
{
    public function __construct(int $mode, float $relativeHumidity)
    {
        switch ($mode) {
            case self::TOO_LOW:
                $message = "Temperature of $relativeHumidity is under min temperature of " . TemperatureConstant::MIN_TEMPERATURE;
                break;
            case self::TOO_HIGH:
                $message = "Temperature of $relativeHumidity is over max temperature of " . TemperatureConstant::MAX_TEMPERATURE;
                break;
            default:
                $message = "Temperature of $relativeHumidity is not valid";
                break;
        }

        $message = $message . '.';

        parent::__construct($message);
    }
}