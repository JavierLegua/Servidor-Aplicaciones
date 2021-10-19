<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Servidor de aplicaciones</title>
</head>
<body>
    <h1>Servidor de aplicaciones de Javier Legua</h1>

    <?php

        /**
         * Función para mostrar los directorios de la carpeta aplicaciones
         */

         function mostrarDirectorios($ruta){
            //Se comprueba que la ruta sea un directorio
            if(is_dir($ruta)){
                //Se abre un gestor de directorios para la ruta indicada
                $gestor = opendir($ruta);
                echo "<ul style = 'list-style: none;'>";

                //Recorre todos los elementos del directorio
                while (($archivo = readdir($gestor)) !== false){
                    $ruta_completa = $ruta."/".$archivo;

                    //Se muestran todos los archivos y carpetas excepto "." y ".."
                    if ($archivo != "." && $archivo != ".."){
                        //Sii es un directorio se recorre recursivamente
                        if(is_dir($ruta_completa)){
                            echo "<li> <a href='".$_SERVER['PHP_SELF']."?categoria=.$archivo'>".$archivo."</a></li>";
                            mostrarDirectorios($ruta_completa);
                        }else{
                            echo "<li>".$archivo."</li>";
                        }
                    }
                }
                //Cerramos el gestor de directorios
                closedir($gestor);
                echo "</ul>";
            }else{
                echo "La ruta introducida no es valida";
            }
         }
         mostrarDirectorios("aplicaciones");
    ?>
</body>
</html>