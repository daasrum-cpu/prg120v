
<h3>Slett Klasse</h3>

<form mothod="post" action="" id="slettklasse" name="slettklasse" onSubmit="return bekreft()">
    klasse
    <select name="klassekode" id="klassekode">
        <?php print ("<option value=">velg klasse </option>);

    </select> <br/>
    <input type="submit" value="Slett klasse" name="slettklasse" id="slettklasse" />
</form>

<?php
 if (isset($_POST['slettklasse'])) {
     $klassenavn=$_POST['klassenavn'];

     if (!$klassekode) {
         print ("det er ikke valgt en klasse");

     }
     else
     {
         include("db-tilkobling.php");
         $sqlsetning = "DELETE FROM klasse WHERE klassenavn = '$klassenavn';";
         mysqli_query($db,$sqlsetning) or die ("ikke muligt å slette data fra databasen");

         print("følgende klasse er slettet: $klassenavn");
     }
 }
 