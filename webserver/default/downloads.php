<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="pragmas" content="no-cache">
<?php
	echo "<title>aMule " , amule_get_version(), " - Web Control Panel</title>";
	
	if ( $_SESSION["auto_refresh"] > 0 ) {
		echo "<meta http-equiv=\"refresh\" content=\"", $_SESSION["auto_refresh"],
			'; url=downloads.php', '">';
	}
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

	<script language="javascript">
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
</table><font face=Tahoma style="font-size:8pt;">
</font>
&nbsp;<table border=0 align=center cellpadding=4 cellspacing=0 width="95%">

<tr>
 <td align=center valign=middle>

<script type="text/javascript">
function GotoCat(cat) {
	window.location.href="downloads.php?cmd=filter&status="+cat;
}
</script><font face=Tahoma style="font-size:8pt;">
<table border=0 align=center cellpadding=3 cellspacing=0 width="100%" bgcolor="#99CCFF">
<tr>
 <td class="smallheader" style="background-color: #000000" colspan="8"><img src="arrow_down.gif">
 <b>Downloads
 <?php
 	$downloads = amule_load_vars("downloads");
 	echo '&nbsp;(', count($downloads), ')';
 ?>
 </b></td>
 <td align="right" class="smallheader" style="background-color: #000000">
 <form>
 	<select name="cat" size="1"onchange=GotoCat(this.form.cat.options[this.form.cat.selectedIndex].value)>
	<?php
    	$all_status = array("All", "Waiting", "Paused", "Downloading");
    	
		if ( $HTTP_GET_VARS["cmd"] == "filter") {
			$_SESSION["filter_status"] = $HTTP_GET_VARS["status"];
		}
    	if ( $_SESSION["filter_status"] == '') $_SESSION["filter_status"] = 'All';
    	foreach ($all_status as $s) {
    		echo (($s == $_SESSION["filter_status"]) ? '<option selected>' : '<option>'), $s, '</option>';
    	}
	?>
 	</select>
 </form>
 </td>

</tr>
<tr>
 <td valign=middle class="down-header-left"><a href="?sort=name"><b>File Name</b></a></td>
 <td valign=middle class="down-header"><a href="?sort=size"><b>Size</b></a></td>
 <td valign=middle class="down-header"><a href="?sort=size_done"><b>Complete</b></a></td>
 <td valign=middle class="down-header"><a href="?sort=size_xfer"><b>Transferred</b></a></td>
 <td valign=middle class="down-header"><a href="?sort=progress"><b>Progress</b></a></td>

 <td valign=middle class="down-header">&nbsp;&nbsp;<a href="?sort=speed"><b>Speed</b></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
 <td valign=middle class="down-header"><b>Sources</b></td>
 <td valign=middle class="down-header"><a href="?sort=prio"><b>Priority</b></a></td>
 <td valign=middle class="down-header"><b>Actions</b></td>
</tr>

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
	function PrioString($file)
	{
		$prionames = array(0 => "Low", 1 => "Normal", 2 => "High",
			3 => "Very high", 4 => "Very low", 5=> "Auto", 6 => "Powershare");
		$result = $prionames[$file->prio];
		if ( $file->prio_auto == 1) {
			$result = $result . "(auto)";
		}
		return $result;
	}
	function StatusString($file)
	{
		if ( $file->status == 7 ) {
			return "Paused";
		} elseif ( $file->src_count_xfer > 0 ) {
			return "Downloading";
		} else {
			return "Waiting";
		}
	}

	//
	// declare it here, before any function reffered it in "global"
	//
	$sort_order;$sort_reverse;

	function my_cmp($a, $b)
	{
		global $sort_order, $sort_reverse;
		
		switch ( $sort_order) {
			case "size": $result = $a->size > $b->size; break;
			case "size_done": $result = $a->size_done > $b->size_done; break;
			case "size_xfer": $result = $a->size_xfer > $b->size_xfer; break;
			case "progress": $result = (((float)$a->size_done)/((float)$a->size)) > (((float)$b->size_done)/((float)$b->size)); break;
			case "name": $result = $a->name > $b->name; break;
			case "speed": $result = $a->speed > $b->speed; break;
			case "scrcount": $result = $a->src_count > $b->src_count; break;
			case "status": $result = StatusString($a) > StatusString($b); break;
			case "prio": $result = PrioString($a) > PrioString($b); break;
		}

		if ( $sort_reverse ) {
			$result = !$result;
		}
		//var_dump($sort_reverse);
		return $result;
	}

	if ( ($HTTP_GET_VARS["cmd"] != "") && ($_SESSION["guest_login"] == 0) ) {
		$name = $HTTP_GET_VARS['file'];
		if ( strlen($name) == 32 ) {
			amule_do_download_cmd($name, $HTTP_GET_VARS["cmd"]);
		}
	}
	
	$downloads = amule_load_vars("downloads");

	$sort_order = $HTTP_GET_VARS["sort"];

	if ( $sort_order == "" ) {
		$sort_order = $_SESSION["download_sort"];
	}
	$reverse_sort_key = "download_sort_reverse" . $sort_order;
	if ( $_SESSION[$reverse_sort_key] == "" ) {
		$_SESSION[$reverse_sort_key] = 0;
	} else {
		if ( $HTTP_GET_VARS["sort"] != '') {
			$_SESSION[$reverse_sort_key] = !$_SESSION[$reverse_sort_key];
		}
	}

	//var_dump($_SESSION);
	$sort_reverse = $_SESSION[$reverse_sort_key];
	
	if ( $sort_order != "" ) {
		$_SESSION["download_sort"] = $sort_order;
		usort(&$downloads, "my_cmp");
	}

	foreach ($downloads as $file) {
		echo '<td valign=top class="down-line-left"><acronym title="', $file->name, '">', $file->short_name, '</acronym></td>';
		echo '<td valign=top class="down-line-right">', CastToXBytes($file->size), '</td>';
		echo '<td valign=top class="down-line-right">', CastToXBytes($file->size_done), '</td>';
		echo '<td valign=top class="down-line-right">', CastToXBytes($file->size_xfer), '</td>';
		
		echo '<td valign=middle class="down-line">';
		echo '<table width=200 height=11 border=1 class="percent_table" cellpadding=0 cellspacing=0 bordercolor="#000000">';
		echo '<tr><td><img src="greenpercent.gif" height=4 width=', (($file->size_done * 1.0)/$file->size)*200 + 1, '><br>';
		echo $file->progress, '</td></tr></table></td>';
		
		echo '<td valign=top class="down-line-right">', CastToXBytes($file->speed), '</td>';
		
		// source count
		echo '<td valign=top class="down-line">';
		if ( $file->src_count_not_curr != 0 ) {
			echo $file->src_count - $file->src_count_not_curr, "&nbsp;/&nbsp;";
		}
		echo $file->src_count, "&nbsp;(", $file->src_count_xfer, ")";
		if ( $file->src_count_a4af != 0 ) {
			echo "+", $file->src_count_a4af;
		}
		echo '</td>';

		echo '<td valign=top class="down-line">', PrioString($file), '</td>';

		$status = StatusString($file);
		echo '<td valign=top class="down-line"><acronym title="', $status, '">';
		echo '<img src="l_info.gif" alt="', $status, '"></acronym>';
		
		// commands
		echo '<acronym title="ED2K Link(s)"><a href="', $file->link, '"><img src="l_ed2klink.gif" alt="ED2K Link(s)"></a></acronym>';
		if ( $_SESSION["guest_login"] == 0 ) {
			if ( $file->status == 7 ) {
				echo '<acronym title="Resume"><a href="?cmd=resume&file=', $file->hash, '"><img src="l_resume.gif" alt="Resume"></a></acronym>';
			} else {
				echo '<acronym title="Pause"><a href="?cmd=pause&file=', $file->hash, '"><img src="l_pause.gif" alt="Pause"></a></acronym>';
			}
			echo '<acronym title="Cancel"><a href="?cmd=cancel&file=', $file->hash,
				"\" onclick=\"return confirm('Are you sure that you want to cancel and delete this file?')\" ",
				'><img src="l_cancel.gif" alt="Cancel"></a></acronym>';
			echo '<acronym title="Increase priority"><a href="?cmd=prioup&file=', $file->hash, '"><img src="l_up.gif" alt="Increase priority"></a></acronym>';
			echo '<acronym title="Decrease priority"><a href="?cmd=priodown&file=', $file->hash, '"><img src="l_down.gif" alt="Decrease priority"></a></acronym>';
		}
		echo '</td></tr>';
		echo "\n";
	}
?>
<tr>
</tr>
</table>
<table border=0 align=center cellpadding=4 cellspacing=0 width="100%">
<tr>

 <td class="smallheader" colspan=4 style="background-color: #000000"><img src="arrow_up.gif">
 <b>Uploads
 <?php
 	$uploads = amule_load_vars("uploads");
 	echo '&nbsp;(', count($uploads), ')';
 ?>
 </b></td>

</tr>
<tr>
 <td class="up-header-left"><b>Username</b></td>
 <td class="up-header"><b>File Name</b></td>
 <td class="up-header"><b>Transferred</b></td>
 <td class="up-header"><b>Speed</b></td>
</tr>
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
 	$uploads = amule_load_vars("uploads");
 	foreach ($uploads as $file) {
 		echo '<tr>';
 		echo '<td valign=top class="up-line-left"><acronym title="', $file->user_name, '">', $file->user_name, '</acronym></td>';
 		echo '<td valign=top class="up-line-left"><acronym title="', $file->name, '">', $file->short_name, '</acronym></td>';
 		echo '<td valign=top class="up-line">', CastToXBytes($file->xfer_up), "&nbsp;/&nbsp;", CastToXBytes($file->xfer_down), '</td>';
 		echo '<td valign=top class="up-line">', ($file->xfer_speed > 0) ? (CastToXBytes($file->xfer_speed) . "/s") : "-", '</td>';
 		echo '</tr>';
		echo "\n";
 	}
 ?>
</table>
&nbsp;
<p align=center>&nbsp;
  </p>
</font>
</td>
</tr>
</table></body>
</html>
