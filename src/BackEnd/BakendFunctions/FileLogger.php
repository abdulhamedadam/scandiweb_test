<?php

namespace BackEnd\BakendFunctions;
use BackEnd\BakendFunctions\LoggerInterface;



class FileLogger implements LoggerInterface {
    public function log($message, $level) {
        // Log the message to a file
        file_put_contents('../FrontEnd/logfile.txt', "[" . $level . "] " . $message . "\n", FILE_APPEND);
    }

    public function debug($message) {
        $this->log($message, 'DEBUG');
    }

    public function info($message) {
        $this->log($message, 'INFO');
    }

    public function warning($message) {
        $this->log($message, 'WARNING');
    }

    public function error($message) {
        $this->log($message, 'ERROR');
    }
}