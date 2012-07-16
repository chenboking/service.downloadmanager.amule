<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<META HTTP-EQUIV="PRAGMAS" CONTENT="NO-CACHE">
<title>aMule CVS - Web Control Panel</title>

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

<script language="JavaScript" type="text/JavaScript">

var initvals = new Object;

<?php
	// apply new options before proceeding
	//var_dump($HTTP_GET_VARS);
	if ( ($HTTP_GET_VARS["cmd"] == "apply") && ($_SESSION["guest_login"] == 0) ) {
		$file_opts = array(
			"upload_full_chunks", "first_last_chunks_prio"
		);
		$conn_opts = array("max_line_up_cap","max_up_limit",
			"max_line_down_cap","max_down_limit", 
			"max_file_src","max_conn_total");
		$webserver_opts = array("use_gzip", "autorefresh_time");
		
		$all_opts;
		foreach ($conn_opts as $i) {
			$curr_value = $HTTP_GET_VARS[$i];
			if ( $curr_value == "on") $curr_value = 1;
			if ( $curr_value == "") $curr_value = 0;
			
			$all_opts["connection"][$i] = $curr_value;
		}
		foreach ($file_opts as $i) {
			$curr_value = $HTTP_GET_VARS[$i];
			if ( $curr_value == "on") $curr_value = 1;
			if ( $curr_value == "") $curr_value = 0;
			
			$all_opts["files"][$i] = $curr_value;
		}
		foreach ($webserver_opts as $i) {
			$curr_value = $HTTP_GET_VARS[$i];
			if ( $curr_value == "on") $curr_value = 1;
			if ( $curr_value == "") $curr_value = 0;
			
			$all_opts["webserver"][$i] = $curr_value;
		}
		//var_dump($all_opts);
		amule_set_options($all_opts);
	}

	$opts = amule_get_options();
	//var_dump($opts);
	$opt_groups = array("connection", "files", "webserver", "coretweaks");
	//var_dump($opt_groups);
	foreach ($opt_groups as $group) {
		$curr_opts = $opts[$group];
		//var_dump($curr_opts);
		foreach ($curr_opts as $opt_name => $opt_val) {
			echo 'initvals["', $opt_name, '"] = "', $opt_val, '";', "\n";
		}
	}
?>

function init_data()
{
	var frm = document.forms.mainform
	
	var str_param_names = new Array(
		"max_line_down_cap", "max_line_up_cap",
		"max_up_limit", "max_down_limit", "max_file_src",
		"max_conn_total",
		"autorefresh_time"
		)
	for(i = 0; i < str_param_names.length; i++) {
		frm[str_param_names[i]].value = initvals[str_param_names[i]];
	}
	var check_param_names = new Array(
		"use_gzip", "upload_full_chunks", "first_last_chunks_prio"
		)
	for(i = 0; i < check_param_names.length; i++) {
		frm[check_param_names[i]].checked = initvals[check_param_names[i]] == "1" ? true : false;
	}
	
}

</script>

<body onload="init_data();" bgcolor="#FBDE9C" text=white link="#3399FF" vlink="#3399FF" alink="#3399FF" marginwidth=0 marginheight=0 topmargin=0 leftmargin=0 style="margin:0px">
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
 <td align=right class=tabs>
  <form>
  <input type="button" value="ed2k://Download" onClick='self.location.href="index.php?links=1"'>
  <input type="button" value="Logout" onClick='self.location.href="login.php"'>
  </form>
 </td>
</tr>
</table>

&nbsp;

<form name="mainform" action="preferences.php" method="post">

<input type="hidden" name="cmd" value="apply">
<table border=0 align=center cellpadding=4 cellspacing=0 width="90%">
<tr><td><font face=Tahoma style="font-size:10pt;" color=black>Web Control Panel</font></td></tr>
<tr>
<td align=left valign=middle bgcolor="#0066CC">
<font face=Tahoma style="font-size:8pt;"><b>Gzip Compression</b></font>
<input type="checkbox" name="use_gzip" id="use_gzip">
</td>
</tr>
<tr>
<td align=left valign=top bgcolor="#3399FF">
<font face=Tahoma style="font-size:8pt;">
&nbsp;&nbsp;&nbsp;&nbsp;Save traffic, especially in graphs.
</font>

<br>
</td></tr>

<tr>
<td align=left valign=middle bgcolor="#0066CC">
<font face=Tahoma style="font-size:8pt;"><b>Refresh-Time of Pages</b></font>
</td>
</tr>
<tr>
<td align=left valign=top bgcolor="#3399FF">
<font face=Tahoma style="font-size:8pt;">
&nbsp;&nbsp;&nbsp;&nbsp;Time in seconds (zero=disabled): <input type="text" name="autorefresh_time" id="autorefresh_time" size="5" class=dinput><br>
</font>
</td>
</tr>


<tr><td><br><font face=Tahoma style="font-size:10pt;" color=black>aMule</font></td></tr>
<tr>
<td align=left valign=middle bgcolor="#0066CC">
<font face=Tahoma style="font-size:8pt;"><b>Speed Limits</b></font>
</td>
</tr>
<tr>

<td align=left valign=top bgcolor="#3399FF">
<font face=Tahoma style="font-size:8pt;">
&nbsp;&nbsp;&nbsp;&nbsp;Download: <input type="text" name="max_down_limit" id="max_down_limit" size="5" class=dinput> kB/s
&nbsp;&nbsp;Upload: <input type="text" name="max_up_limit" id="max_up_limit" size="5" class=dinput> kB/s
</font>
</td>
</tr>

<tr>
<td align=left valign=middle bgcolor="#0066CC">
<font face=Tahoma style="font-size:8pt;"><b>Bandwidth Limits</b></font>
</td>

</tr>
<tr>
<td align=left valign=top bgcolor="#3399FF">
<font face=Tahoma style="font-size:8pt;">
&nbsp;&nbsp;&nbsp;&nbsp;Download: <input type="text" name="max_line_down_cap" id="max_line_down_cap" size="5" class=dinput> kB/s
&nbsp;&nbsp;Upload: <input type="text" name="max_line_up_cap" id="max_line_up_cap" size="5" class=dinput> kB/s
</font>
</td>
</tr>

<tr>
<td align=left valign=middle bgcolor="#0066CC">
<font face=Tahoma style="font-size:8pt;"><b>Connection Limits</b></font>

</td>
</tr>
<tr>
<td align=left valign=top bgcolor="#3399FF">
<table border=0>
<tr><td><font face=Tahoma style="font-size:8pt;">Max Sources Per File:</font></td><td>
<input type="text" name="max_file_src" id="max_file_src" size="5" class=dinput value="300"></td></tr>
<tr><td><font face=Tahoma style="font-size:8pt;">Max. Connections:</font></td><td>
<input type="text" name="max_conn_total" id="max_conn_total" size="5" class=dinput value="499"></td></tr>
<tr><td><font face=Tahoma style="font-size:8pt;">Max. new connections / 5secs:</font></td><td>
<input type="text" name="max_conn_5sec" id="max_conn_5sec" size="5" class=dinput value="20"></td></tr>
</table>
</td>
</tr>

<tr>
<td align=left valign=middle bgcolor="#0066CC">

<font face=Tahoma style="font-size:8pt;"><b>File Settings</b></font>
</td>
</tr>
<tr>
<td align=left valign=top bgcolor="#3399FF">
<table border=0>
<tr><td><font face=Tahoma style="font-size:8pt;">Try to transfer full chunks to all uploads</font></td><td>
<input type="checkbox" name="upload_full_chunks" id="upload_full_chunks"></td></tr>
<tr><td><font face=Tahoma style="font-size:8pt;">Try to download first and last chunks first</font></td><td>
<input type="checkbox" name="first_last_chunks_prio" id="first_last_chunks_prio"></td></tr>
</table>
</td>
</tr>

<tr>
<td align=center><br><input type=submit value="Apply"></td>

</tr>

</table>
</form>

</body>
</html>
