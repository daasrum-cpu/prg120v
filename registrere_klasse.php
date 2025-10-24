<?php
?>

<h2>Registrer klasse</h2>

<form method="post" action="" id="registrer_klasse_skjema" name="registrer_klasse_skjema">
    klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
    klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
    <input type="submit" value="registrer klasse" id="registrer klasseknapp" name="registrerklasseknapp" />
    <input type="reset" value="nulstill" id="nullstill" name="nulstill" /> <br/>
</form>

<?php
if (isset($_POST['registrerklasseknapp'])) {
    $klassekode = $_POST['klassekode'];
    $klassenavn = $_POST['klassenavn'];

    if (!$klassenavn || !$klassekode) {
        print ("alle felt må fylles ut");
    }
    else {
        include("db-tilkobling.php");
     $sqlSetning = "SELECT * FROM klasse WHERE klassekode = `$klassekode`;";
     $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
     $antallRader=mysqli_num_rows($sqlResultat);

     if ($antallRader!=0) {
         print ("klassen finnes fra før");
     }
     else {
         $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn)
            VALUES('$klassekode','$klassenavn');";
         mysqli_query($db,$sqlSetning) or die ("ikke muligt å registyrere i databasen");

         print ("følgende klasse er nå lagt til $klassekode $klassenavn");
     }
    }
}
