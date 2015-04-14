<?php
//require_once(FILE_PATH."/src/functions.php");
$_ = "*********************请忽视我,我只是没节操的分割符*********************\r\n";
define("DATA_PATH", __DIR__."/phar/");
print("本工具用于将Phar文件解压转码以及打包\r\n本工具由作死俱乐部Zis友情提供
/**
 * 版权所有未经许可不得转载
 * 作者：Zis
 * QQ：495267874
 * 邮箱：old2008@vip.qq.com
 */\r\n查看指令请输入help\r\n");
do{
	print("请输入指令：");
   $cmd = trim(fgets(STDIN)); // 从 STDIN 读取一行
   $p = explode(' ',$cmd);
   $cmd = $p[0];
   //var_dump($p);
	switch ($cmd){
		case "help":
			print("convert <name> <zip|tar|phar> --转换指令 <phar文件名> <zip|gz|phar> 可选转换类型<c>\r\nunzip <name> --解压phar文件<u>\r\npack <name> --打包目录<p>\r\n---------\r\nexit --退出程序\r\n");
			break;
		case "convert":
		case "c":
			if(count($p) >= 3){
				if(file_exists(DATA_PATH.$p[1].'.phar')){
   				$phar = new Phar(DATA_PATH.$p[1].'.phar');
					if($p[2] == "zip"){
						if(file_exists(DATA_PATH.$p[1].".zip")){
							print("[".DATA_PATH.$p[1].".zip]\r\n这个压缩包已存在是否删除？(y/n)");
							if(trim(fgets(STDIN)) == 'y')
								@unlink(DATA_PATH.$p[1].".zip");
							else
								break;
						}
						print("开始转码为Zip……\r\n");
					  $out = $phar->convertToData(Phar::ZIP);
   					print("恭喜你获得了一个zip包：\r\n".DATA_PATH.$p[1].".zip\r\n");
					}
					elseif($p[2] == "tar"){
						if(file_exists(DATA_PATH.$p[1].".tar")){
							print("[".DATA_PATH.$p[1].".tar]\r\n这个压缩包已存在是否删除？(y/n)");
							if(trim(fgets(STDIN)) == 'y')
								@unlink(DATA_PATH.$p[1].".tar");
							else
								break;
						}
						print("开始转码为Tar……\r\n");
						$out = $phar->convertToData(Phar::TAR);
   					print("恭喜你获得了一个tar包：\r\n".DATA_PATH.$p[1].".tar\r\n");
					}
					elseif($p[2] == "phar"){
						print("= =自己转自己好玩么\r\n");
						//$out = $phar->convertToData(Phar::PHAR);
					}
					else{
						print("指定的[".$p[2]."]转换模式不存在\r\n");
						break;
					}
					unset($out);
				}
				else
		  		print("未找到Phar文件[".DATA_PATH.$p[1].".phar]\r\n");
		  }else
		  	print("参数不足！\r\n");
			break;
		case "unzip":
		case "u":
			if(count($p) >= 2){
				if(file_exists(DATA_PATH.$p[1].'.phar')){
   				$phar = new Phar(DATA_PATH.$p[1].'.phar');
   					 
					print("开始解压……\r\n");
   				if(file_exists(DATA_PATH.$p[1].".tar"))
   					 @unlink(DATA_PATH.$p[1].".tar");
					$phar = $phar->convertToData(Phar::TAR);
					
					$phar->decompressFiles ();
					$phar->extractTo ( DATA_PATH.$p[1],null,true);
					unset($phar);
   				@unlink(DATA_PATH.$p[1].".tar");
					print("解压完毕！解压路径：".DATA_PATH.$p[1]."\r\n");
				}
				else
		  		print("未找到Phar文件[".DATA_PATH.$p[1].".phar]\r\n");
		  }else
		  	print("参数不足！\r\n");
			break;
		case "pe":
		case "packe":
			if(count($p) >= 2){
				if(file_exists(DATA_PATH.$p[1])){
					if(file_exists(DATA_PATH.$p[1].'.phar'))
						@unlink(DATA_PATH.$p[1].'.phar');
					print("开始打包……\r\n");
					$phar = new Phar(DATA_PATH.$p[1].'.phar');
					$phar->buildFromDirectory(DATA_PATH.$p[1]);
					$phar->compressFiles(Phar::GZ);
					$phar->stopBuffering();
					unset( $phar);
					print("打包完毕：".DATA_PATH.$p[1].".phar\r\n");
				}
				else
		  		print("未找到目录[".DATA_PATH.$p[1]."]\r\n");
		  }else
		  	print("参数不足！\r\n");
			break;
        case "pm":
        case "packm":
            if(count($p) >= 2){
                if(file_exists(DATA_PATH.$p[1])){
                    if(file_exists(DATA_PATH.$p[1].'.phar'))
                        @unlink(DATA_PATH.$p[1].'.phar');
                    print("开始打包……\r\n");
                    $phar = new Phar(DATA_PATH.$p[1].'.phar');
                    $phar->buildFromDirectory(DATA_PATH.$p[1]);
                    $phar->compressFiles(Phar::GZ);
                    $phar->stopBuffering();
                    $phar->setStub('<?php define("pocketmine\\PATH", "phar://". __FILE__ ."/"); require_once("phar://". __FILE__ ."/src/pocketmine/PocketMine.php");  __HALT_COMPILER(); ?>');
                    unset( $phar);
                    print("打包完毕：".DATA_PATH.$p[1].".phar\r\n");
                }
                else
                    print("未找到目录[".DATA_PATH.$p[1]."]\r\n");
            }else
                print("参数不足！\r\n");
            break;
		case "cls":
			//exec("cls");//清屏功能呵呵了
			break;
		default:
			print("没有找到该命令：[".$cmd."]\r\n");
			break;
	}
	print ($_);
  }while($cmd != "exit");
  
?>