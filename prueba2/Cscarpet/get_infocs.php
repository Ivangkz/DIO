<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dreamcode";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Consulta para obtener la información de las estructuras de control en C#
$sql = "SELECT Nombre, Descripcion FROM estructuras_control WHERE Lenguaje_ID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        
        $fileName = str_replace(' ', '_', $row["Nombre"]);
        echo "<div class='product'>";
        echo "<h2>" . htmlspecialchars($row["Nombre"]) . "</h2>";
        echo "<p>" . htmlspecialchars($row["Descripcion"]) . "</p>";
        echo "<button class='examples-button'><a href='./PagSecund/" . htmlspecialchars($fileName) . ".html'>Ejemplos</a></button>";
        echo "</div>";
    }
} else {
    echo "No se encontraron resultados";
}
// Cierra la conexión
$conn->close();
?>
