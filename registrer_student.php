<h2>Registrer student</h2>

<form method="post" action="" id="registrer_student_skjema" name="registrer_student_skjema">
    brukernavn <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
    fornavn <input type="text" id="fornavn" name="fornavn" required /> <br/>
    etternavn <input type="text" id="etternavn" name="etternavn" required /> <br/>
    <input type="submit" value="registrer student" id="registrerstudentknapp" name="registrerstudentknapp" />
    <input type="reset" value="nulstill" id="nullstill" name="nulstill" /> <br/>
</form>

<?php
if (isset($_POST['registrerstudentknapp'])) {
    $brukernavn = $_POST['brukernavn'];
    $fornavn = $_POST['fornavn'];
    $etternavn = $_POST['etternavn'];

    if (!$fornavn || !$brukernavn || !$etternavn) {
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
            $sqlSetning = "INSERT INTO student (brukernavn, fornavn, etternavn)
            VALUES('$brukernavn','$fornavn','$etternavn');";
            mysqli_query($db,$sqlSetning) or die ("ikke muligt å registrere i databasen");

            print ("følgende student er nå lagt til $fornavn $etternavn");
        }
    }
}
