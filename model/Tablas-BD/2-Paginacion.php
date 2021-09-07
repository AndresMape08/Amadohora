<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paguinar contenido de una tabla</title>
</head>
<body>
    <?php 
    $host = "Localhost";
    $usuario = "root";
    $clave = "";
    $db = "prueba"; 
    $conn = mysqli_connect($host, $usuario, $clave, $db) or die("Error al conectar la base de datos");
    //
    //variables y constantes
    //
    $TAMANO_PAGINA = 10;
    $PAGINAS_MAXIMAS = 5;
    //
    if (isset($_GET["p"])) {
        $pagina = $_GET["p"];
    } else {
        $pagina = 1;
    }
    //Calculamos el inicio de la pagina
    //
    $inicio = ($pagina-1)*$TAMANO_PAGINA;
    //
    $q = "SELECT COUNT(*) as reg FROM instructor";
    $r = mysqli_query($conn,$q);
    $data = mysqli_fetch_assoc($r);
    $num = $data["reg"];
    //
    //Total de paginas
    //
    $totalPaginas = ceil($num/$TAMANO_PAGINA);
    //
    //Lectura de la pagina
    //
    $q = "SELECT * FROM instructor lIMIT ".$inicio.", ".$TAMANO_PAGINA;
    $r = mysqli_query($conn,$q);
    print "<h2>Tenemos en total ".$num." instructores</h2>";
    print "<table border = '1'>";
        print "<tr>";
            print "<th>Id_Instructor</th>";
            print "<th>Id_TipoContrato</th>";
            print "<th>Id_Municipio</th>";
            print "<th>Gestor</th>";
            print "<th>Nombres_Instructor</th>";
            print "<th>Apellidos_Instructor</th>";
            print "<th>Cedula_Instructor</th>";
            print "<th>Correo_Instructor</th>";
            print "<th>Celular_Instructor</th>";
            print "<th>Direccion_Instructor</th>";
            print "<th>Foto_Instructor</th>";
        print "</tr>";
        while ($data = mysqli_fetch_assoc($r)) {
            print "<tr>";
                print "<td>".$data["ID_INSTRUCTOR"]."</td>";
                print "<td>".$data["ID_TIPOCONTRATO"]."</td>";
                print "<td>".$data["ID_MUNICIPIO"]."</td>";
                print "<td>".$data["GESTOR"]."</td>";
                print "<td>".$data["NOMBRESINSTRUCTOR"]."</td>";
                print "<td>".$data["APELLIDOSINSTRUCTOR"]."</td>";
                print "<td>".$data["CEDULAINSTRUCTOR"]."</td>";
                print "<td>".$data["CORREOINSTRUCTOR"]."</td>";
                print "<td>".$data["CELULARINSTRUCTOR"]."</td>";
                print "<td>".$data["DIRECCIONINSTRUCTOR"]."</td>";
                print "<td>".$data["FOTOINSTRUCTOR"]."</td>";
            print "</tr>";
        }
    print "</table>";
    ?>
</body>
</html>