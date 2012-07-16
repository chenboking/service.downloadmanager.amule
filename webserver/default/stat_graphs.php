<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<META HTTP-EQUIV="PRAGMAS" CONTENT="NO-CACHE">
<?php
	echo "<title>aMule " , amule_get_version(), " - Web Control Panel</title>";
?>
<style type="text/css">
img
{
border : 0px;
}
a, a:active, a:link, a:visited
{
color: white;
}
.down-header, .down-header-left, .down-header-right,
.down-line, .down-line-good, .down-line-left, .down-line-good-left,
.down-line-right, .down-line-good-right,
.up-header, .up-header-left, .up-line, .up-line-left,
.server-header, .server-header-left, .server-line, .server-line-left,
.shared-header, .shared-header-left, .shared-line, .shared-line-changed, 
.shared-line-left, .shared-line-left-changed,
.header, .smallheader, .commontext,
.upqueue-header, .upqueue-line, .upqueue-line-left,
.websearch-header, .websearch-line, .addserver-header, .addserver-line
{
font-family : Tahoma;
font-size : 8pt;
}
.tabs
{
font-family : Tahoma;
font-size : 10pt;
background-color : #3399FF;
}
.down-header, .down-line, .down-line-good, .up-header, .up-line,
.server-header, .server-line, .shared-header, .shared-line, .shared-line-changed,
.upqueue-header, .upqueue-line,
.websearch-header, .websearch-line, .addserver-header, .addserver-line
{
text-align : center;
}
.down-header-left, .down-line-left, .down-line-good-left,
.server-header-left, .server-line-left, .shared-header-left,
.up-header-left, .up-line-left, .shared-line-left, .shared-line-left-changed, .upqueue-line-left
{
text-align : left;
}
.down-line-right, .down-line-good-right, .down-header-right
{
text-align : right;
}
.down-header, .down-header-left, .down-header-right,
.up-header, .up-header-left, .server-header, .server-header-left,
.shared-header, .shared-header-left, .upqueue-header,
.websearch-header, .addserver-header
{
background-color : #0066CC;
}
.header
{
background-color : #0046AC;
}
.smallheader
{
background-color : #003399;
color : #FFFFFF;
}
.commontext
{
background-color : #FFFFFF;
color : #000000;
}
.down-line, .down-line-good, .down-line-left, .down-line-good-left,
.down-line-right, .down-line-good-right,
.up-line, .up-line-left, .server-line, .server-line-left,
.shared-line, .shared-line-changed, .shared-line-left, .shared-line-left-changed,
.upqueue-line, .upqueue-line-left,
.websearch-line, .addserver-line
{
background-color : #3399FF;
}
.down-line-good, .down-line-good-left, .down-line-good-right, .shared-line-changed, .shared-line-left-changed
{
color : #F0F000;
}
.percent_table
{
border:0px solid #000000;
border-collapse: collapse;
}
.message
{
font-size: 10pt;
font-weight: bold;
color: #FF0000;
}
.dinput
{
border-width: 1px;
border-color: black;
}
</style>
</head>
<body bgcolor="#FBDE9C" text=white link="#3399FF" vlink="#3399FF" alink="#3399FF" marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 style="margin:0px">
<table border=0 width="100%" align=center cellpadding=4 cellspacing=0>
<tr>
 <td class="tabs" align="left" colspan="2">

  <table border="0" cellpadding="4" cellspacing="0">
  <tr>
	<td class="tabs" align="center">
		&nbsp;<a href="http://www.amule.org" target="_blank"><img src="emule.gif"></a>
		<font face="Tahoma" style="font-size:13pt;" color="#000000">aMule<br>Web Control Panel</font>
	</td>
	<td class="tabs" align="center" width="30">&nbsp;		</td>

  	<td align="center" class="tabs" width="95">
  		<a href="servers.php">
  			<img src="cp_servers.gif"><br>
  			Server list
  		</a>
  	</td>
  	<td align="center" class="tabs" width="95">
  		<a href="downloads.php">
  			<img src="cp_download.gif"><br>

  			Transfer
  		</a>
  	</td>
  	<td align="center" class="tabs" width="95">
  		<a href="search.php">
  			<img src="cp_search.gif"><br>
  			Search
  		</a>
  	</td>
  	<td align="center" class="tabs" width="95">

  		<a href="shared.php">
  			<img src="cp_shared.gif"><br>
  			Shared Files
  		</a>
  	<td align="center" class="tabs" width="110">
		<a href="stat_tree.php">
			<img src="cp_stats.gif"><br>
  			Statistics</a>
  		<font color="#000000">|</font>

  		<a href="stat_graphs.php">Graphs</a>
  	</td>
  	</td>
  	<td align="center" class="tabs" width="95">
  		<a href="preferences.php">
  			<img src="cp_settings.gif"><br>
  			Preferences
  		</a>
  	</td>

  	<td class="tabs" align="center" width="30">&nbsp;</td>
  	<td align="left" class="tabs" width="95">
  		<img src="log.gif"> <a href="index.php?serverinfo=1">Serverinfo</a><br>
  		<img src="log.gif"> <a href="index.php?log=1">Log</a>
  	</td>
  </tr>
  </table>

 </td>
</tr>
<tr>
<td style="background-color: #000000; height: 1px" colspan="2">
</td>
</tr>
<tr>
 <td class="tabs">
 	&nbsp;&nbsp;<b>Connection:</b> 
	<?php
		function CastToXBytes($size)
		{
			if ( $size < 1024 ) {
				$result = $size . " bytes";
			} elseif ( $size < 1048576 ) {
				$result = ($size / 1024.0) . "KB";
			} elseif ( $size < 1073741824 ) {
				$result = ($size / 1048576.0) . "MB";
			} else {
				$result = ($size / 1073741824.0) . "GB";
			}
			return $result;
		}

		$stats = amule_get_stats();
		if ( $stats["kad_connected"] == 1 ) {
			echo "Connected";
				if ( $stats["kad_firewalled"] == 1 ) {
					echo " to KAD (firewalled), ";
				} else {
					echo " to KAD, ";
				}
		} else {
			echo "Not connected to KAD, ";
		}
		if ( $stats["id"] == 0 ) {
			echo "not connected to ED2K";
		} elseif ( $stats["id"] == 0xffffffff ) {
			echo "connecting to ED2k";
		} else {
			echo "connected with ", (($stats["id"] < 16777216) ? "low" : "high"), " ID to ",
				$stats["serv_name"], "  ", $stats["serv_addr"];
		}
		echo '<br>&nbsp;&nbsp;<b>Speed:</b> Up: ', CastToXBytes($stats["speed_up"]), 'ps',
			' | Down: ', CastToXBytes($stats["speed_down"]), 'ps',
			'<small> (Limits: ', CastToXBytes($stats["speed_limit_up"]), 'ps/',
			CastToXBytes($stats["speed_limit_down"]), 'ps)</small>&nbsp;';
	?>
 
  <font color=black>

	<script type="text/javascript" language="javascript">
	var d = new Date();
	s = "[ " + d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear() + " " + d.getHours() + ":" + (d.getMinutes() < 10 ? "0" : "") + d.getMinutes() + ":" + (d.getSeconds() < 10 ? "0" : "") + d.getSeconds() + " ]";
	document.write(s);
</script>
  </font>
 </td>
 <td align=left class=tabs>
  <form>
  <input type="button" value="ed2k://Download" onClick='self.location.href="index.php?links=1"'>
  <input type="button" value="Logout" onClick='self.location.href="login.php"'>
  </form>
 </td>
</tr>
</table>

&nbsp;

<?php
	// reload graphs data
	amule_load_vars("stats_graph");
?>

<table border=0 align=center cellpadding=4 cellspacing=0>
<tr>
<td class="websearch-line"><img src="amule_stats_download.png" width="500" height="200" border="0" alt="" title="" /></td>
</tr>
<tr>
<td width="600" class="websearch-line"><b><font face=Tahoma style="font-size:8pt;">Download speed</font></b></td>
</tr>
</table>
&nbsp;
<table border=0 align=center cellpadding=4 cellspacing=0>
<tr>
<td class="websearch-line"><img src="amule_stats_upload.png" width="500" height="200" border="0" alt="" title="" /></td>
</tr>
<tr>
<td width="600" class="websearch-line"><b><font face=Tahoma style="font-size:8pt;">Upload speed</font></b></td>
</tr>
</table>
&nbsp;
<table border=0 align=center cellpadding=4 cellspacing=0>
<tr>
<td class="websearch-line"><img src="amule_stats_conncount.png" width="500" height="200" border="0" alt="" title="" /></td>
</tr>
<tr>
<td width="600" class="websearch-line"><b><font face=Tahoma style="font-size:8pt;">Number of connections</font></b></td>
</tr>
</table>

</body>
</html>
