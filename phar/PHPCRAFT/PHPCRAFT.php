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

//draw project logo

use PHPCRAFT\core\Main;

$main = new Main();

//    Main::drawLogo();

echo "[INFO] PHPCRAFT Version 1.0\r\n";
echo "[INFO] Server start\r\n";

if (!is_dir("config")) {
    mkdir("config");
}

if (!file_exists("./config/server.php")) {
    copy('phar://PHPCRAFT.phar/config/server.php', './config/server.php');
}

while (1) {
    echo "[INFO] Listening on port 127.0.0.1:8000\r\n";
    sleep(2);
}

for ($i = 0; $i < 5; $i++) {
    echo "[INFO]";
}
