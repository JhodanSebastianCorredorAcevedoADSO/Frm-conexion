<?php

session_start();

if (isset($_POST['email'])) {
    $firs_name = $_POST['firs_name'];
    $last_name = $_POST['last_name'];
    $cedula = $_POST['cedula'];
    $email = $_POST['email'];

    $Nuevos = array(
        'firs_name' => $firs_name,
        'last_name' => $last_name,
        'cedula' => $cedula,
        'email' => $email,
    );
    $_SESSION['aaaa'][] = $Nuevos;

    // Verificar si los campos están completos
    if (empty($firs_name) || empty($last_name) || empty($cedula) || empty($email)) {
        echo '<div class="alert alert-danger text-center">Complete todos los campos</div>';
    } else {
        // Validar que el correo sea válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger text-center">El correo electrónico no es válido</div>';
        } else {
            // Establecer la conexión PDO
            $host = 'localhost';
            $dbname = 'conexion';
            $username = 'nombre';
            $password = 'contraseña';

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Insertar los datos en la base de datos
                $stmt = $pdo->prepare("INSERT INTO users (firs_name, last_name, cedula, email) VALUES (:firs_name, :last_name, :cedula, :email)");

                $stmt->bindParam(':firs_name', $firs_name);
                $stmt->bindParam(':last_name', $last_name);
                $stmt->bindParam(':cedula', $cedula);
                $stmt->bindParam(':email', $email);

                $lastInsertId = $pdo->lastInsertId(); // Obtener el último 'id' generado

                echo "El nuevo registro se insertó correctamente. ID generado: " . $lastInsertId;

                echo '<div class="alert alert-success text-center">Los datos se han guardado correctamente</div>';
            } catch (PDOException $e) {
                echo '<div class="alert alert-danger text-center">Error al guardar los datos: ' . $e->getMessage() . '</div>';
            }
        }
    }
}

if (!empty($_SESSION['aa'])) {
    echo '<table>';
    echo '<tr><th>id</th><th>firs_name</th><th>last_name</th><th>cedula</th><th>correo</th></tr>';

    $id = 1; // Inicializar el valor del id en 1

    foreach ($_SESSION['aaaa'] as $itm) {
        echo '<tr>';
        echo '<td style="padding: 10px;">' . $id . '</td>'; // Mostrar el valor del id
        echo '<td style="padding: 10px;">' . $itm['firs_name'] . '</td>';
        echo '<td style="padding: 10px;">' . $itm['last_name'] . '</td>';
        echo '<td style="padding: 10px;">' . $itm['cedula'] . '</td>';
        echo '<td style="padding: 10px;">' . $itm['email'] . '</td>';
        echo '</tr>';
        $id++; // Incrementar el valor del id en cada iteración
    }
    echo '</table>';
}