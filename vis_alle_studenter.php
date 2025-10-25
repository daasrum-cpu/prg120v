<?php


include("db-tilkobling.php");

$sqlSetning = "SELECT * FROM klasse ORDER BY brukernavn;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die ("ikke muligt å henta data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);

print("<h3>Registrerte Studenter</h>");
print("<table border='1'>");
print("<tr><th align=left>brukernavn</th><th align=left>Fornavn</th><th align=left>studiumkode</th><th align=left>klassekode</th>");

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $Fornavn=$rad['Fornavn'];
    $brukernavn=$rad['brukernavn'];
    $Etternavn=$rad['studiumkode'];
    $Klassekode=$rad['klassekode'];
    print("<tr><td>$brukernavn</td><td>$Fornavn</td><td>$Etternavn</td><td>$klassekode</td></tr>");
}
print ("</tabel>");

?>