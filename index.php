<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 04/12/2018
 * Time: 11:25
 */

// Premiere ligne

// info server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ex_jointures";

// connection base
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
// Selectionner la base à utiliser
    $conn->select_db($dbname);
}

//echo "Connexion Ok :) <br><br>"; //vérifie que les infos son ok

/* ***************************************************************** */
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>exercice MySql Jointures</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <h3><b>Info : </b></h3> <br>
    </body>
    </html>

<?php
/* ***************************************************************** */

// code pour afficher la liste
/*
function affichage_liste_eleves_et_info()
{
    global $conn;
    $sql = 'select * from eleves';

    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        echo $row['prenom']." ". $row['nom']." ". $row['age']."<br>";
    }
}
affichage_liste_eleves_et_info();
*/
$sql = "SELECT * FROM `eleves`, `eleves_informations` WHERE eleves_informations.eleves_id = eleves.id";

$result = $conn->query($sql);
?>
    <table id="tbl" border="1">
        <tbody>
            <tr class="styl">
                <td class="taille_ID"> ID<br>élève </td>
                <td class="taille_Prenom-Nom"> Prénom </td>
                <td class="taille_Prenom-Nom"> Nom </td>
                <td class="taille_Age"> Age </td>
            </tr>
        </tbody>
<?php

    while($row = $result->fetch_assoc())
    {
        //echo "ID de l'élève : ".$row['id']." | Prénom : ".$row['prenom']." | Nom : ".$row['nom']." | Age : ".$row['age']."<br>";

        echo "
            <tr class='tr_genere'>
                <td class='T_id'>".$row['id']."</td> <!-- ID de l'élève -->
                <td class='T_P'>".$row['prenom']."</td> <!-- Prénom -->
                <td class='T_N'>".$row['nom']."</td> <!-- Nom -->
                <td class='T_A'>".$row['age']."</td> <!-- Age -->
            </tr>
            ";
    };
    ?>
     </table>

<?php

echo "<br><br>";


$ID = 1;
echo "Compétence de l'élève ".$ID." : <br><br>";


$sql2 = "SELECT * FROM `competences`, `eleves`, `eleves_competences` WHERE eleves.id = $ID and eleves_competences.eleves_id = eleves.id and eleves_competences.competences_id = competences.id";

$result2 = $conn->query($sql2);
$i = 1;
?>
    <table id="tbl" border="1">
        <tbody>
        <tr class="styl">
            <td class="taille_Competence"> Compétence </td>
            <td class="taille_Niveau"> Niveau </td>
            <td class="taille_Niveau"> Niveau AE </td>
        </tr>
        </tbody>
        <?php

        while($row = $result2->fetch_assoc())
        {
            echo "
            <tr class='tr_genere'>
                <td class='T_id'>".$row['titre']."</td> <!-- titre : competence -->
                <td class='T_P'>".$row['niveau']." pts</td> <!-- niveau -->
                <td class='T_N'>".$row['niveau_ae']." pts</td> <!-- niveau ae -->
            </tr>
            ";
        };




        ?>
    </table>

<?php

echo "<br><br>";



















