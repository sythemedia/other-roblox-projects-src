<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" id="pee">
<head>
<title>uhsythe</title>
<link rel="stylesheet" type="text/css" href="css/Origins06_normal.css" title="normal"/>
<link rel="stylesheet" type="text/css" href="css/Origins06_dark.css" title="dark">
<link rel="stylesheet" type="text/css" href="css/Origins06_classic.css" title="classic">
<link rel="stylesheet" type="text/css" href="css/Origins06_classicdark.css" title="classicdark">
<link rel="Shortcut Icon" type="image/ico" href="images/icon.ico"/>
<script type="text/javascript" src="js/js_funcs.js"></script>
</head>
<body onload="set_style_from_cookie()">
<div id="Container">
				<div id="Header">
					<div id="Banner">
						<center><div id="Logo"><a id="logo" title="Origins06" href="index.php" style="display:inline-block;cursor:pointer;"><img src="images/Logo.png" border="0" id="img" alt="Origins06"/></a></div></center>
					</div>
					<div class="Navigation">
						<span><a id="Games" class="MenuItem" href="games.php">Games</a></span>
						<span class="Separator"> | </span>
						<span><a id="HostServer" class="MenuItem" href="hostserver.php">Host Server</a></span>
 					</div>
				</div>
				<div id="Body">
	<div id="SplashContainer">
		<div id="MainPanel">
			<center>
			<h2>Games</h2>
			<?php
$con = new mysqli("localhost", "origins0_root", "", "origins0_games");

if (mysqli_connect_errno()) 
{
    printf("Connect failed: %s\n", mysqli_connect_error());
}

$sql="SELECT * FROM games";

$result=$con->query($sql);
if (!$result)
{
  printf("Error: %s\n", $con->error);
}

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{ 
echo "<div id='ElementInsert'>";
echo "<center>";
echo "<h3><b>".$row['name']."</b></h3>";  
echo "<h3><b>Map: ".$row['map']."</b></h3>"; 
echo "<h3><b>Player Limit: ".$row['playerlimit']."</b></h3>";
date_default_timezone_set('America/Phoenix');
$date = date('m/d/Y h:i:s a', time());
echo "<h3><b> Creation Time: ".$date."</b></h3>";
$stringbuild = $row['ip']."|".$row['port'];
$encryptstring = base64_encode($stringbuild);
$url = "Origins06://".$encryptstring;
echo "<form action='".$url."'>";
echo "<div id='JoinButton'><input type='submit' value='Join'/></div>";
echo "</form>";
$ip = base64_decode($row['ip']);
if($_SERVER['REMOTE_ADDR'] == $ip)
{
echo "<form action='removeserver.php'>";
echo "<div id='DeleteButton'><input type='submit' value='Delete'/></div>";
echo "</form>";
}
echo "</center>";
echo "</div>";
echo " "; 
} 

$con->close();
?>
			</center>
		</div>
	</div>
	</div>
	
	<div id="Footer">
	sythe does not knowingly host copyrighted content. If you host a server, we store your IP address, but it is not publicly distributed to users on the site.
	</div>
			</div>
	</body>
</html>
