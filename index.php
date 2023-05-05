<style>
table {border-collapse: collapse}
td {border: 1px solid black}
</style>
<table>
<?php
$mysqli = new mysqli('localhost', 'root', '1234', 'test');
$mysqli->set_charset('utf8mb4');
$people = $mysqli->query("SELECT * FROM people");
while ($person = $people->fetch_object()) {
    ?>
    <tr>
    <?php
    foreach($person as $key => $value) {
        ?>
        <td><?= "$key: $value" ?></td>
        <?php
    }
    ?>
        <td>Animals: <?php
            $pets = $mysqli->query("SELECT * FROM pets WHERE people = $person->id");

            while ($pet = $pets->fetch_object()) {
                echo '[' . $pet->animal . ": " . $pet->name . ']';
            }
    ?></td>
    </tr>
    <?php
}
?>
</table>
