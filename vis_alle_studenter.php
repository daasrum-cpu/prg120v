<link rel="stylesheet" href="style.css">


<?php


include("db-tilkobling.php");

$sqlSetning = "SELECT * FROM student ORDER BY klassekode;";
$sqlResultat = mysqli_query($db, $sqlSetning) or die ("ikke muligt å henta data fra databasen");

$antallRader = mysqli_num_rows($sqlResultat);

print("<h3>Registrerte Studenter</h>");
print("<table border='1'>");
print("<tr><th align=left>Brukernavn</th><th align=left>Fornavn</th><th align=left>Etternavn</th><th align=left>Klassekode</th>");

for ($r=1;$r<=$antallRader;$r++)
{
    $rad=mysqli_fetch_array($sqlResultat);
    $fornavn=$rad['fornavn'];
    $brukernavn=$rad['brukernavn'];
    $etternavn=$rad['etternavn'];
    $klassekode=$rad['klassekode'];

    print("<tr><td>$brukernavn</td><td>$fornavn</td><td>$etternavn</td><td>$klassekode</td></tr>");
}
print ("</tabel>");

?>