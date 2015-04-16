<?php

/*
 *
 * ppppppp h     h  ppppppp ccccccc rrrrrrr    aaa   fffffff ttttttt
 * p     p h     h  p     p c       r     r   a   a  f          t
 * ppppppp hhhhhhh  ppppppp c       rrrrrrr  aaaaaaa fffffff    t
 * p       h     h  p       c       r   r    a     a f          t
 * p       h     h  p       ccccccc r    rr  a     a f          t
 *
 * @author timo
 *
 */

namespace PHPCRAFT\core;

/**
 * Class Logger
 * @package PHPCRAFT\core
 */
class Logger
{
    /**
     * @param $msg
     */
    public static function trace($msg)
    {
       echo "[TRACE] ".$msg."\r\n";
    }

    /**
     * @param $msg
     */
    public static function info($msg)
    {
       echo "[INFO] ".$msg."\r\n";
    }

    /**
     * @param $msg
     */
    public static function warning($msg)
    {
       echo "[WARNING] ".$msg."\r\n";
    }

    /**
     * @param $msg
     */
    public static function error($msg)
    {
       echo "[ERROR] ".$msg."\r\n";
    }
}