<h2>Registrer klasse</h2>

<form method="post" action="" id="registrer_klasse_skjema" name="registrer_klasse_skjema">
    klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
    klassenavn <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
    studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
    <input type="submit" value="registrer klasse" id="registrerklasseknapp" name="registrerklasseknapp" />
    <input type="reset" value="nulstill" id="nullstill" name="nulstill" /> <br/>
</form>

<?php
if (isset($_POST['registrerklasseknapp'])) {
    $klassekode = $_POST['klassekode'];
    $klassenavn = $_POST['klassenavn'];
    $studiumkode = $_POST['studiumkode'];

    if (!$klassenavn || !$klassekode || !$studiumkode) {
        print ("alle felt må fylles ut");
    }
    else {
        include("db-tilkobling.php");
     $sqlSetning = "SELECT * FROM klasse WHERE klassekode = '$klassekode';";
     $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
     $antallRader=mysqli_num_rows($sqlResultat);

     if ($antallRader!=0) {
         print ("klassen finnes fra før");
     }
     else {
         $sqlSetning = "INSERT INTO klasse (klassekode, klassenavn, studiumkode)
            VALUES('$klassekode','$klassenavn','$studiumkode');";
         mysqli_query($db,$sqlSetning) or die ("ikke muligt å registrere i databasen");

         print ("følgende klasse er nå lagt til $klassekode $klassenavn $studiumkode");
     }
    }
}
