<?php

/*
 *
 *  _____   _    _   _____   ______   _____      ___   ______   _______
 * |  _  \ | |  | | |  _  \ |  ____| |  _  \    /   | |  ____| |__   __|
 * | |_) / | |__| | | |_) / | |      | |_) /   / _  | | |____     | |
 * |  __/  |  __  | |  __/  | |____  |  _ /   / /_| | |  ____|    | |
 * |_|     |_|  |_| |_|     |______| |_| \_\ /_/  |_| |_|         |_|
 *
 * @author Michael
 *
 *
 */

$_ = "**********************分隔符**********************\r\n";
define("DATA_PATH", __DIR__ . "/phar/");
print("PHAR打包工具\r\n");
do {
    print("请输入指令：");
    $cmd = trim(fgets(STDIN));
    $p = explode(' ', $cmd);
    $cmd = $p[0];
    switch ($cmd) {
        case "unzip":
        case "u":
            if (count($p) >= 2) {
                if (file_exists(DATA_PATH . $p[1] . '.phar')) {
                    $phar = new Phar(DATA_PATH . $p[1] . '.phar');
                    print("开始解压……\r\n");
                    if (file_exists(DATA_PATH . $p[1] . ".tar"))
                        @unlink(DATA_PATH . $p[1] . ".tar");
                    $phar->convertToData(Phar::TAR);
                    $phar->decompressFiles();
                    $phar->extractTo(DATA_PATH . $p[1], null, true);
                    unset($phar);
                    @unlink(DATA_PATH . $p[1] . ".tar");
                    print("解压完毕！解压路径：" . DATA_PATH . $p[1] . "\r\n");
                } else
                    print("未找到Phar文件[" . DATA_PATH . $p[1] . ".phar]\r\n");
            } else
                print("参数不足！\r\n");
            break;
        case "p":
        case "pack":
            if (count($p) >= 2) {
                if (file_exists(DATA_PATH . $p[1])) {
                    if (file_exists(DATA_PATH . $p[1] . '.phar'))
                        @unlink(DATA_PATH . $p[1] . '.phar');
                    print("开始打包……\r\n");
                    $phar = new Phar(DATA_PATH . $p[1] . '.phar');
                    $phar->buildFromDirectory(DATA_PATH . $p[1]);
                    $phar->compressFiles(Phar::GZ);
                    $phar->stopBuffering();
                    unset($phar);
                    print("打包完毕：" . DATA_PATH . $p[1] . ".phar\r\n");
                } else
                    print("未找到目录[" . DATA_PATH . $p[1] . "]\r\n");
            } else
                print("参数不足！\r\n");
            break;
        case "cls":
            exec("cls");
            break;
        default:
            print("没有找到该命令：[" . $cmd . "]\r\n");
            break;
    }
    print ($_);
} while ($cmd != "exit");

?>