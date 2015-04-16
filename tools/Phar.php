<?php

/*
 *
 *  ppppppp h     h  ppppppp ccccccc rrrrrrr   aaa   fffffff ttttttt
 *  p     p h     h  p     p c       r     r  a   a  f          t
 *  ppppppp hhhhhhh  ppppppp c       rrrrrrr aaaaaaa fffffff    t
 *  p       h     h  p       c       r   r   a     a f          t
 *  p       h     h  p       ccccccc r    rr a     a f          t
 *
 * @author timo
 *
 */

//init value
define("DATA_PATH", "../phar/");
define("PROJECT_NAME", "PHPCRAFT");
define("DATA_PATH_BUILD", "../phar/PHPCRAFT-build/");
$dirPath = DATA_PATH . PROJECT_NAME;
$dirPathC = DATA_PATH_BUILD . PROJECT_NAME;
$div = "********************************************\r\n";

print("PHPCRAFT-PHAR\r\n");
do {
    print(">");
    $cmd = trim(fgets(STDIN));
    $p = explode(' ', $cmd);
    $cmd = $p[0];

    switch ($cmd) {
        case "p":
            if (file_exists($dirPath)) {
                if (file_exists($dirPath . '.phar'))
                    @unlink($dirPath . '.phar');
                print("Packaging...\r\n");
                package($dirPath, $dirPathC);
                print("Complete:" . $dirPath . ".phar\r\n");
            } else
                print("Can not find directory " . $dirPath . "]\r\n");
            break;
        case "bye":
            break 2;
        default:
            print("Command not found:[" . $cmd . "]\r\n");
            break;
    }
    print($div);
} while ($cmd != "exit");

function package($dirPath, $dirPathC)
{
    $phar = new Phar($dirPathC . '.phar');
    $phar->buildFromDirectory($dirPath);
    $phar->compressFiles(Phar::GZ);
    $phar->stopBuffering();
    $phar->setStub('<?php require("phar://". __FILE__ ."/PHPCRAFT.php"); __HALT_COMPILER(); ?>');
}

?>