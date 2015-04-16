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

define("PROJECT_NAME", "PHPCRAFT");

function __autoload($class)
{
    include "phar://" . PROJECT_NAME . ".phar/" . str_replace("\\", "/", str_replace(PROJECT_NAME . "\\", "", $class)) . ".php";
}

use PHPCRAFT\core\Main;
use PHPCRAFT\core\Logger;

Main::drawLogo();
Logger::info("PHPCRAFT Version 1.0");
Logger::info("Server Start");

if (!is_dir("config")) {
    mkdir("config");
}

if (!file_exists("./config/server.php")) {
    copy("phar://PHPCRAFT.phar/config/server.php", "/config/server.php");
}

while (1) {
    echo "[INFO] Listening on port 127.0.0.1:8000\r\n";
    sleep(10);
}

