<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructuras de Control en C#</title>
    <link rel="stylesheet" href="stylecs.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
</head>
<body id="body">
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <h1>Estructura de datos</h1>
    </header>

    <div class="menu__side" id="menu_side">
        <div class="options__menu">
            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <a href="../index.html"><h4>Inicio</h4></a>
                </div>
            </a>
            <a href="#">
                <div class="option">
                    <i class="far fa-file" title="Portafolio"></i>
                    <h4>Portafolio</h4>
                </div>
            </a>
            <a href="#">
                <div class="option">
                    <i class="fas fa-video" title="Cursos"></i>
                    <h4>Cursos</h4>
                </div>
            </a>
            <a href="#">
                <div class="option">
                    <i class="far fa-sticky-note" title="Blog"></i>
                    <h4>Blog</h4>
                </div>
            </a>
            <a href="#">
                <div class="option">
                    <i class="far fa-id-badge" title="Contacto"></i>
                    <h4>Contacto</h4>
                </div>
            </a>
            <a href="#">
                <div class="option">
                    <i class="far fa-address-card" title="Nosotros"></i>
                    <h4>Nosotros</h4>
                </div>
            </a>
        </div>
    </div>

    <main>
        
        <section class="products">
            <?php
            // Configura la conexión a la base de datos (reemplaza los valores con los de tu configuración)
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

            // Verifica si se encontraron resultados
            if ($result->num_rows > 0) {
                // Imprime los datos en formato HTML
                while($row = $result->fetch_assoc()) {
                    // Genera el nombre del archivo basado en el nombre de la estructura (reemplaza espacios con guiones bajos)
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
        </section>
    </main>

    <script src="css.js"></script>
</body>
</html>
