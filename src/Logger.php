<?php

namespace Desun\Logger;

class Logger
{
    /**
     * @var string $log_dir
     */
    public $log_dir;

    /**
     * Constructro
     * 
     * @param string $log_dir
     */
    public function __construct($log_dir)
    {
        $this->log_dir = $log_dir;
    }

    /**
     * Log data
     * 
     * @param mixed $data
     * @param string $file_name
     * 
     * @return void
     */
    public function log($data)
    {
        if( !file_exists($this->log_dir) ) {
            \mkdir($this->log_dir);
        }

        $log_file = $this->log_dir . DIRECTORY_SEPARATOR .'log.txt';

        $fp = fopen($log_file, 'a+');
        fwrite($fp, var_export($data, true));
        fwrite($fp, PHP_EOL);
        fclose($fp);
    }
}