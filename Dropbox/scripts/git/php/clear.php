<?

include("dbinfo.php");

// Turn off all error reporting
error_reporting(0);

$license = $_POST['id'] ;

if (!isset($license)) {
echo "No Licenses have been cleared, please try again....dumbass<br><br>";
include("sqltest.php");
} else {
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Yo shit aint found, you hella dumb");
$query="update v1 set status = 'available', computer = '' where id = '$license'";

$result=mysql_query($query);

// $query="select * from v1 where id='$license' ;";
$query="select * from v1 where id='$license' ;";

$result=mysql_query($query);

$num=mysql_numrows($result);
};

mysql_close();
?>

<table border="2" cellspacing="2" cellpadding="2"><tr bgcolor="806517">
<th><font face="Arial, Helvetica, sans-serif">ID </font></th>
<th><font face="Arial, Helvetica, sans-serif">computer </font></th>
<th><font face="Arial, Helvetica, sans-serif">game </font></th>
<th><font face="Arial, Helvetica, sans-serif">cdkey </font></th>
<th><font face="Arial, Helvetica, sans-serif">notes </font></th>
<th><font face="Arial, Helvetica, sans-serif">status </font></th>
<th><font face="Arial, Helvetica, sans-serif">time stamp </font></th>
</tr>

<?
$ID=mysql_result($result,$i,"ID");
$computer=mysql_result($result,$i,"computer");
$game=mysql_result($result,$i,"game");
$cdkey=mysql_result($result,$i,"cdkey");
$notes=mysql_result($result,$i,"notes");
$status=mysql_result($result,$i,"status");
$ts=mysql_result($result,$i,"ts");

if($status == available){
        $bgcolor = "#41a317";
} elseif($status == inuse){
        $bgcolor = "#008080";
} elseif($status == maintenance){
        $bgcolor = "#C11B17";
}

?>

<tr bgcolor=<? print "$bgcolor"; ?>>
<td><font name="ID" face="Arial, Helvetica, sans-serif"><? echo "$ID" ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $computer ; echo "."  ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $game ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $cdkey ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><!-- ? echo $notes ; ? -->.</font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $status ; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><? echo $ts; ?></font></td>
</tr>

<?
// echo $result

echo "Licence successfully cleared!" ;

?>
<?

include("sqltest.php");
?>
