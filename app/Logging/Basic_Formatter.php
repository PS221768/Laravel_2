<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class Basic_Formatter
{
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler)
        {
            $handler->setFormatter(
                new LineFormatter('[%datetime%]: %message% \r\n')
            );
            echo("Hi");
        }
    }
}