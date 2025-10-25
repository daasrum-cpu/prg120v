<?php


include("db-tilkobling.php");

$sqlSetning = "SELECT * FROM klasse ORDER BY klassen_id;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die ("ikke muligt å henta data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);

print("<h3>Registrerte Klasser</h>");
print("<table border='1'>");
print("<tr><th align=left>klassekode</th><th align=left>klassenavn</th><th align=left>studiumkode</th>");

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $klassenavn=$rad['klassenavn'];
    $klassekode=$rad['klassekode'];
    $studiumkode=$rad['studiumkode'];
}
print ("</tabel>");

?>