<?php  
    include_once 'global.php';
    
    include_once 'models/userModel.php';
    
    
     
    # Valida si la variable login ha sido enviada por medio del metodo POST 
    if (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $credentials = new Identity($email, $password);

        if($credentials->validateUser($email, $password)){
            $_SESSION["loggedIn"] = true;
            $_SESSION["email"] = $email;

            header("Location: index.php");
        } else {
            $_POST["errorMessage"] = "La combinación de usuario y contraseña no es válida.";
        }
    }

    $credentials = new Identity("", ""); 

    if (isset($_POST["register"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Actualizar la instancia de $credentials con los datos reales
        $credentials->email = $email;
        $credentials->password = $password;

        if ($credentials->registerUser($email, $password)) {
            $_POST["RegisterMessage"] = "Registro Exitoso";
        } else {
            $_POST["errorMessage"] = "La combinación de usuario y contraseña no es válida.";
        }
    }
    if (isset($_POST["change"])) {
        $email = $_POST["email_sent"];
        $password = $_POST["change_password"];
        
       
        if(password_change( $email,$password)) {

            $_POST["changed"] = "actualizado correctamente";
            header("location: " .  ROOT);

        } else {
            $_POST["errorMessage"] = "Error al guardar los datos del usuario";
        }
        
    }



    function bindUsers()
    {
        $recordset = User::getAll();

        if (is_null($recordset) || mysqli_num_rows($recordset) == 0)
        {
            $_POST['actionMessage'] = 'No se han encontrado usuarios.';
            return;
        }
        echo '<table class="tableUser">';
        echo "<tr><th class='tabletitulo'>Correo electrónico</th><th class='tabletitulo'>Activo  </th>  <th class='tabletitulo'>  Acciones</th></tr>";
        while ($record = mysqli_fetch_assoc($recordset)) 
        {
            echo "<tr><td>" . $record["usuario"] . "</td>
                <td>" . $record["activo"] . "</td>
                <td><button class='botton-submit' id='delete' onclick='Delete(" . $record["usuario"] . ")'>Borrar</button></td></tr>";
        }
        echo "</table>";
    }
    function bindProjects()
    {
        $recordset = User::getAllProjects();
    
        if (is_null($recordset) || mysqli_num_rows($recordset) == 0) {
            $_POST['actionMessageProjects'] = 'No se han encontrado proyectos.';
            return;
        }
    
        
        echo '<table class="tableProject">';
        echo "<tr><th class='tabletitulo'>ID</th><th class='tabletitulo'>Nombre del Proyecto</th><th class='tabletitulo'>Fecha de Inicio</th><th class='tabletitulo'>Fecha Final</th><th class='tabletitulo'>Acciones</th></tr>";
        
        while ($record = mysqli_fetch_assoc($recordset)) {
            echo "<tr>
                    <td>{$record["id_proyecto"]}</td>
                    <td>{$record["nombre_proyecto"]}</td>
                    <td>{$record["fecha_inicio"]}</td>
                    <td>" . ($record["fecha_final"] ?? 'No especificada') . "</td>
                    <td><button class='botton-submit' id='delete' onclick='Delete(" . $record["id_proyecto"] . ")'>Borrar</button></td></tr>";
                
        }
    
        echo '</table>';
    }
    function bindEmpleados()
{
    $recordset = User::getAllEmpleados();

    if (is_null($recordset) || mysqli_num_rows($recordset) == 0) {
        $_POST['actionMessageEmpleados'] = 'No se han encontrado empleados.';
        return;
    }

    echo '<table class="tableEmpleados">';
    echo "<tr><th class='tabletitulo'>ID</th><th class='tabletitulo'>Nombre del Empleado</th><th class='tabletitulo'>Apellidos</th><th class='tabletitulo'>Correo</th><th class='tabletitulo'>Rol</th><th class='tabletitulo'>Activo</th><th class='tabletitulo'>Usuario</th><th class='tabletitulo'>Fecha de Registro</th></tr>";

    while ($record = mysqli_fetch_assoc($recordset)) {
        echo "<tr>
                <td>{$record["id_empleado"]}</td>
                <td>{$record["nombre_empleado"]}</td>
                <td>{$record["apellidos"]}</td>
                <td>{$record["correo"]}</td>
                <td>{$record["rol"]}</td>
                <td>{$record["activo"]}</td>
                <td>{$record["usuario"]}</td>
                <td>{$record["fecha_registro"]}</td></tr>";
    }

    echo '</table>';
}
function bindTareasAndProyectosAsignados()
{
    $tareas = User::getAllTareas();
    $proyectosAsignados = User::getProyectosAsignados();

    // Lógica para mostrar las tareas y proyectos asignados en la vista correspondiente
    echo '<h2>Listado de Tareas</h2>';
    echo '<table class="tablereportes">';
    echo "<tr><th class='tabletitulo'>ID Tarea</th><th class='tabletitulo'>Título</th><th class='tabletitulo'>Horas</th><th class='tabletitulo'>Proyecto ID</th><th class='tabletitulo'>Empleado ID</th></tr>";

    while ($record = mysqli_fetch_assoc($tareas)) {
        echo "<tr>
                <td>{$record["id_tareas"]}</td>
                <td>{$record["titulo"]}</td>
                <td>{$record["horas"]}</td>
                <td>{$record["proyecto_id"]}</td>
                <td>{$record["empleado_id"]}</td></tr>";
    }

    echo '</table>';

    echo '<h2>Listado de Proyectos Asignados</h2>';
    echo '<table class="tablereportes">';
    echo "<tr><th class='tabletitulo'>ID Asignación</th><th class='tabletitulo'>Proyecto ID</th><th class='tabletitulo'>Nombre del Proyecto</th><th class='tabletitulo'>Empleado ID</th></tr>";

    while ($record = mysqli_fetch_assoc($proyectosAsignados)) {
        echo "<tr>
                <td>{$record["id_asignacion"]}</td>
                <td>{$record["id_proyecto"]}</td>
                <td>{$record["nombre_proyecto"]}</td>
                <td>{$record["id_empleado"]}</td></tr>";
    }

    echo '</table>';
}
    

    # asi se comenta 1 linea en php
    // asi se comenta tambien  1 linea
    /*  asi se comenta pero mas lineas*/  
?>
