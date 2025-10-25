
<link rel="stylesheet" href="style.css">

<h3>Slett Student</h3>

<form method="post" action="" id="slettstudent" name="slettstudent" onSubmit="return bekreft()">
    student
    <select name="brukernavn" id="brukernavn">
        <?php
        include("db-tilkobling.php");
        $sql = "SELECT brukernavn FROM student ORDER BY klassekode;";
        $resultat = mysqli_query($db, $sql);

        print("<option value=''>velg brukernavn</option>");
        while ($row = mysqli_fetch_assoc($resultat)) {
            $kode = $row['brukernavn'];
            print("<option value='$kode'>$kode</option>");
        }
        ?>
    </select> <br/>
    <input type="submit" value="Slett student" name="slettstudent" id="slettstudentknapp" />
</form>

<script>
    function bekreft() {
        return confirm("Er du dikker på at du vil slette denne klassen?");
    }
</script>

<?php
if (isset($_POST['slettstudent'])) {
    $brukernavn=$_POST['brukernavn'];

    if (!$brukernavn) {
        print ("det er ikke valgt en bruker");

    }
    else
    {
        include("db-tilkobling.php");
        $sqlsetning = "DELETE FROM student WHERE brukernavn = '$brukernavn';";
        mysqli_query($db,$sqlsetning) or die ("ikke muligt å slette data fra databasen");

        print("følgende student er slettet: $brukernavn");
    }
}
