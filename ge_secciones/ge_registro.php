<?php
include ('../ge_conexion/conexion.php');

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    $con = conectar();
    if ($con) {
        // Recibir datos del formulario
        $nombre = $_POST['nombre'];
        $correo = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hashear la contraseña

        // Verificar si el correo ya existe
        $checkEmailQuery = "SELECT * FROM usuarios WHERE email = ?";
        $stmtCheck = $con->prepare($checkEmailQuery);
        $stmtCheck->bind_param("s", $email);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows > 0) {
            // Correo ya registrado
            echo "<script>alert('El correo ya está registrado. Por favor inicie sesión.'); window.location.href='ge_contacto.html';</script>";
            exit(); // Asegúrate de detener la ejecución aquí
        } else {
            // Preparar la consulta SQL
            $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sss", $nombre, $correo, $password);

            if ($stmt->execute()) {
                // Registro exitoso
                echo "<script>alert('Usuario registrado exitosamente.'); window.location.href='ge_contacto.html';</script>";
                exit(); // Asegúrate de detener la ejecución aquí
            } else {
                echo "<script>alert('Error al registrar el usuario: " . $stmt->error . "');</script>";
            }
        }

        // Cerrar la conexión
        desconectar($con);
    } else {
        echo "Error al conectar a la base de datos.";
    }
}
?>
