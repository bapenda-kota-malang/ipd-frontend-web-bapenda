<?php
$cnr = "host=localhost port=5432 dbname=ipd2 user=p3t4 password=M4rt4b4Xp3c0";
$con = pg_connect($cnr);
$hsl = "<html>".PHP_EOL;
if ($con) {
	//echo "Opened database successfully\n";
	//$result = pg_query($con, "select * from DataZnt");
	//var_dump(pg_fetch_all($result));
	//$result = pg_query($con, "select table_name from information_schema.tables where table_schema = 'public'");
	//$result = pg_query($con, "select * from information_schema.tables where table_schema = 'information_schema'");
	//$sql = "select * from information_schema.tables where table_schema not in ('information_schema', 'pg_catalog') and table_type = 'BASE TABLE'";
	//$sql = "select * from information_schema.tables where table_type = 'BASE TABLE'";
	//$sql = "select * from information_schema.tables";
	//$sql = "select * from pg_catalog.pg_tables";
	$sql = "select tablename from pg_catalog.pg_tables where schemaname != 'pg_catalog' and schemaname != 'information_schema' order by tablename asc";
	$result = pg_query($con, $sql);
	if (pg_num_rows($result) > 0) {
		while ($row = pg_fetch_array($result)) {
			//$hsl .= $row[0]." | ".$row[1]." | ".$row[2]." | ".$row[3]."<br>";
			$hsl .= $row[0]."<br>";
		}
	} else {
		$hsl = "row = 0";
	}
	pg_close($con);
} else {
	$hsl = "Error : Unable to open database\n";
}
$hsl .= PHP_EOL."</html>";
echo $hsl;
?>