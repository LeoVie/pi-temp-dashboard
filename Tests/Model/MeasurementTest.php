<?php

namespace LeoVie\PiTempDashboard\Tests\Model;

use LeoVie\PiTempDashboard\Constant\RelativeHumidityConstant;
use LeoVie\PiTempDashboard\Constant\TemperatureConstant;
use LeoVie\PiTempDashboard\Exception\RelativeHumidityOutOfBoundsException;
use LeoVie\PiTempDashboard\Exception\TemperatureOutOfBoundsException;
use LeoVie\PiTempDashboard\Model\Measurement;
use PHPUnit\Framework\TestCase;

class MeasurementTest extends TestCase
{
    private const INITIAL_TEMPERATURE = null;
    private const INITIAL_RELATIVE_HUMIDITY = null;
    private const TEMPERATURE_MIN = TemperatureConstant::MIN_TEMPERATURE;
    private const TEMPERATURE_MIDDLE = (TemperatureConstant::MAX_TEMPERATURE - self::TEMPERATURE_MIN) / 2;
    private const TEMPERATURE_MAX = TemperatureConstant::MAX_TEMPERATURE;
    private const RELATIVE_HUMIDITY_MIN = RelativeHumidityConstant::MIN_RELATIVE_HUMIDITY;
    private const RELATIVE_HUMIDITY_MIDDLE = (RelativeHumidityConstant::MAX_RELATIVE_HUMIDITY - self::RELATIVE_HUMIDITY_MIN) / 2;
    private const RELATIVE_HUMIDITY_MAX = RelativeHumidityConstant::MAX_RELATIVE_HUMIDITY;

    /** @var Measurement */
    private $measurement;

    public function setUp(): void
    {
        parent::setUp();
        $this->measurement = new Measurement();
    }

    public function testGetTemperatureReturnsInitialValue(): void
    {
        $expected = self::INITIAL_TEMPERATURE;

        $this->assertTemperatureEquals($expected);
    }

    public function testSetTemperatureMin(): void
    {
        $expected = self::TEMPERATURE_MIN;
        $this->measurement->setTemperature($expected);

        $this->assertTemperatureEquals($expected);
    }

    public function testSetTemperatureMiddle(): void
    {
        $expected = self::TEMPERATURE_MIDDLE;
        $this->measurement->setTemperature($expected);

        $this->assertTemperatureEquals($expected);
    }

    public function testSetTemperatureMax(): void
    {
        $expected = self::TEMPERATURE_MAX;
        $this->measurement->setTemperature($expected);

        $this->assertTemperatureEquals($expected);
    }

    public function testSetTemperatureThrowsWhenTooLow(): void
    {
        $this->expectException(TemperatureOutOfBoundsException::class);

        $this->measurement->setTemperature(self::TEMPERATURE_MIN - 0.01);
    }

    public function testSetTemperatureThrowsWhenTooHigh(): void
    {
        $this->expectException(TemperatureOutOfBoundsException::class);

        $this->measurement->setTemperature(self::TEMPERATURE_MAX + 0.01);
    }

    public function testGetRelativeHumidityHumidityReturnsInitialValue(): void
    {
        $expected = self::INITIAL_RELATIVE_HUMIDITY;

        $this->assertRelativeHumidityEquals($expected);
    }

    public function testSetRelativeHumidityMin(): void
    {
        $expected = self::RELATIVE_HUMIDITY_MIN;
        $this->measurement->setRelativeHumidity($expected);

        $this->assertRelativeHumidityEquals($expected);
    }

    public function testSetRelativeHumidityMiddle(): void
    {
        $expected = self::RELATIVE_HUMIDITY_MIDDLE;
        $this->measurement->setRelativeHumidity($expected);

        $this->assertRelativeHumidityEquals($expected);
    }

    public function testSetRelativeHumidityMax(): void
    {
        $expected = self::RELATIVE_HUMIDITY_MAX;
        $this->measurement->setRelativeHumidity($expected);

        $this->assertRelativeHumidityEquals($expected);
    }

    public function testSetRelativeHumidityThrowsWhenTooLow(): void
    {
        $this->expectException(RelativeHumidityOutOfBoundsException::class);

        $this->measurement->setRelativeHumidity(self::RELATIVE_HUMIDITY_MIN - 0.01);
    }

    public function testSetRelativeHumidityThrowsWhenTooHigh(): void
    {
        $this->expectException(RelativeHumidityOutOfBoundsException::class);

        $this->measurement->setRelativeHumidity(self::RELATIVE_HUMIDITY_MAX + 0.01);
    }

    private function assertTemperatureEquals($expected): void
    {
        $actual = $this->measurement->getTemperature();

        self::assertEquals($expected, $actual);
    }

    private function assertRelativeHumidityEquals($expected): void
    {
        $actual = $this->measurement->getRelativeHumidity();

        self::assertEquals($expected, $actual);
    }
}