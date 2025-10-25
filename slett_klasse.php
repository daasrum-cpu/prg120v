<h3>Slett Klasse</h3>

<form method="post" action="" id="slettklasse" name="slettklasse" onSubmit="return bekreft()">
    klasse
    <select name="klassekode" id="klassekode">
        <?php
        include("db-tilkobling.php");
        $sql =  "SELECT klassekode FROM klasse ORDER BY klassekode;";
        $resultat = mysqli_query($db, $sql);

        print("<option value=''>velg klasse </option>);
        while ($row = mysqli_fetch_assoc($resultat)) 
        {
          $kode = $row['klassekode'];
         print("<option value='$kode'>$kode</option>");
        }

?> 


    </select> <br/>
    <input type="submit" value="Slett klasse" name="slettklasse" id="slettklasse" />
</form>

<?php
 if (isset($_POST['slettklasse'])) {
     $klassekode=$_POST['klassekode'];

     if (!$klassekode) {
         print ("det er ikke valgt en klasse");

     }
     else
     {
         include("db-tilkobling.php");
         $sqlsetning = "DELETE FROM klasse WHERE klassekode = '$klassekode';";
         mysqli_query($db,$sqlsetning) or die ("ikke muligt å slette data fra databasen");

         print("følgende klasse er slettet: $klassekode");
     }
 }
