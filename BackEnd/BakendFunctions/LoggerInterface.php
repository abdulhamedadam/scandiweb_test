<?php

namespace BackEnd\BakendFunctions;

interface LoggerInterface
{
    public function log($message, $level);
    public function debug($message);
    public function info($message);
    public function warning($message);
    public function error($message);
}