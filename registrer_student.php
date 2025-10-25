<h2>Registrer student</h2>

<form method="post" action="" id="registrer_student_skjema" name="registrer_student_skjema">
    brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
    fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
    etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
    klassekode:
    <select name="klassekode" required>
        <?php
        include("db-tilkobling.php");
        $sql = "SELECT klassekode FROM klasse ORDER BY klassekode;";
        $resultat = mysqli_query($db, $sql);

        if (!$resultat) {
            print("<option value=''>Feil ved henting av klasser</option>");
        } else {
            print("<option value=''>Velg klasse</option>");
            while ($rad = mysqli_fetch_assoc($resultat)) {
                $kode = $rad['klassekode'];
                print("<option value='$kode'>$kode</option>");
            }
        }
        ?>
    </select> <br/>

    <input type="submit" value="registrer student" id="registrerstudentknapp" name="registrerstudentknapp" />
    <input type="reset" value="nulstill" id="nullstill" name="nulstill" /> <br/>
</form>

<?php
if (isset($_POST['registrerstudentknapp'])) {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];
    $klassekode = $_POST['klassekode'];

    if (!$fornavn || !$brukernavn || !$etternavn || !$klassekode) {
        print ("alle felt må fylles ut");
    }
    else {
        include("db-tilkobling.php");
        $sqlSetning = "SELECT * FROM student WHERE brukernavn = '$brukernavn';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

        if ($antallRader!=0) {
            print ("studentn finnes fra før");
        }
        else {
            $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn, klassekode)
            VALUES('$brukernavn','$fornavn','$etternavn', '$klassekode' );";
            mysqli_query($db,$sqlSetning) or die ("ikke muligt å registrere i databasen");

            print ("følgende student er nå lagt til $fornavn $etternavn");
        }
    }
}
