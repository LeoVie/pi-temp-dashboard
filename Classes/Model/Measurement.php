<?php

namespace LeoVie\PiTempDashboard\Model;

use LeoVie\PiTempDashboard\Constant\RelativeHumidityConstant;
use LeoVie\PiTempDashboard\Constant\TemperatureConstant;
use LeoVie\PiTempDashboard\Exception\TemperatureOutOfBoundsException;
use LeoVie\PiTempDashboard\Exception\RelativeHumidityOutOfBoundsException;

class Measurement
{
    /** @var float */
    private $temperature;

    /** @var float */
    private $relativeHumidity;

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    /**
     * @throws TemperatureOutOfBoundsException
     */
    public function setTemperature(float $temperature)
    {
        if ($temperature < TemperatureConstant::MIN_TEMPERATURE) {
            throw new TemperatureOutOfBoundsException(TemperatureOutOfBoundsException::TOO_LOW, $temperature);
        } else if ($temperature > TemperatureConstant::MAX_TEMPERATURE) {
            throw new TemperatureOutOfBoundsException(TemperatureOutOfBoundsException::TOO_HIGH, $temperature);
        }
        $this->temperature = $temperature;
    }

    public function getRelativeHumidity(): ?float
    {
        return $this->relativeHumidity;
    }

    /**
     * @throws RelativeHumidityOutOfBoundsException
     */
    public function setRelativeHumidity(float $relativeHumidity)
    {
        if ($relativeHumidity < RelativeHumidityConstant::MIN_RELATIVE_HUMIDITY) {
            throw new RelativeHumidityOutOfBoundsException(RelativeHumidityOutOfBoundsException::TOO_LOW, $relativeHumidity);
        } else if ($relativeHumidity > RelativeHumidityConstant::MAX_RELATIVE_HUMIDITY) {
            throw new RelativeHumidityOutOfBoundsException(RelativeHumidityOutOfBoundsException::TOO_HIGH, $relativeHumidity);
        }
        $this->relativeHumidity = $relativeHumidity;
    }
}