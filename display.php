<?php
$id    = $_REQUEST['id'];
$conn  = pg_connect("user=postgres password=jasmin0215 dbname=myimagenes host=localhost");
$query = pg_query($conn, "SELECT imagen FROM imagen WHERE idimag = $id");
$row   = pg_fetch_row($query);
$image = pg_unescape_bytea($row[0]);

header("Content-type: image/jpeg");
echo $image;

pg_close($conn);
?>
