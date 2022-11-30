<?php

$Nume = $_POST['Nume'];
$Parola = $_POST['Parola'];

$user = 'root';
$password = '';
$db = 'proiect_v1';

$db = new mysqli('localhost', $user, $password, $db);

if($db ->connect_error)
{
    die('Connection failed!' .$db->connect_error);
}
else
{
    $stmt = $db -> prepare("select * from utilizator where Nume = ?");
    $stmt -> bind_param("s",$Nume);
    $stmt -> execute();

    $stmt_rezultat = $stmt -> get_result();
    if($stmt_rezultat ->  num_rows > 0)
    {
        $data = $stmt_rezultat -> fetch_assoc();
        if($data['Parola'] == $Parola)
        {
            echo "Login successfull";
        }
        else
        {
            echo "Nume sau parola invalida";
        }
    }
    else
    {
        echo "Nume sau parola invalida";
    }


}
?>

