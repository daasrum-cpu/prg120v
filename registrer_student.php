<h2>Registrer student</h2>

<form method="post" action="" id="registrer_student_skjema" name="registrer_student_skjema">
    studentkode <input type="text" id="studentkode" name="studentkode" required /> <br/>
    studentnavn <input type="text" id="studentnavn" name="studentnavn" required /> <br/>
    <input type="submit" value="registrer student" id="registrerstudentknapp" name="registrerstudentknapp" />
    <input type="reset" value="nulstill" id="nullstill" name="nulstill" /> <br/>
</form>

<?php
if (isset($_POST['registrerstudentknapp'])) {
    $studentkode = $_POST['studentkode'];
    $studentnavn = $_POST['studentnavn'];

    if (!$studentnavn || !$studentkode || !$) {
        print ("alle felt må fylles ut");
    }
    else {
        include("db-tilkobling.php");
        $sqlSetning = "SELECT * FROM student WHERE studentkode = '$studentkode';";
        $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig å hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

        if ($antallRader!=0) {
            print ("studentn finnes fra før");
        }
        else {
            $sqlSetning = "INSERT INTO student (studentkode, studentnavn, )
            VALUES('$studentkode','$studentnavn','$');";
            mysqli_query($db,$sqlSetning) or die ("ikke muligt å registrere i databasen");

            print ("følgende student er nå lagt til $studentkode $studentnavn $");
        }
    }
}
