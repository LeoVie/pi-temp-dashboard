<?php

namespace LeoVie\PiTempDashboard\Exception;

use Exception;

abstract class AbstractOutOfBoundsException extends Exception
{
    public const TOO_LOW = 1;
    public const TOO_HIGH = 2;
}