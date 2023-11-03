<?php

// Login //
function loginUser($connect): void{   
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash('SHA512', $password);

    $validate_login = $connect-> prepare ("SELECT * FROM users WHERE username = ? and password = ?");
    $validate_login->execute([$username, $password]);
    $row = $validate_login->fetch();
    if($row){ 
        session_start();
        $_SESSION['user'] = $row['id'];
        echo json_encode(array("redirect" => "index.php"));
    }
    else{
        echo json_encode(array("message" => "Usuario y/o Contraseña incorrecto/s, por favor verifique los datos"));
    }
}

// Agregar producto //
function agregarProducto($connect): void{   
    if(!isset($_POST['cod'])){$_POST['cod']= '';};
    if(!isset($_POST['name'])){$_POST['name']= '';};
    if(!isset($_POST['price'])){$_POST['price']= '';};
    
    
    $cod = $_POST['cod'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $query = $connect-> prepare ("INSERT INTO products (cod, name, price) VALUES (?, ?, ?)");
    $query->execute([$cod, $name, $price]);
    if($query){
        echo json_encode("Producto agregado con exito");
    }else{
        echo json_encode("Ha ocurrido un error al agregar el producto");
    }
}


// Agregar usuario //
function agregarUsuario($connect,$connect2) : void{
    if(!isset($_POST['username'])){$_POST['username']= '';};
    if(!isset($_POST['password'])){$_POST['password']= '';};
    if(!isset($_POST['name'])){$_POST['name']= '';};
    if(!isset($_POST['role'])){$_POST['role']= '';};
    
    // Variables //
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    
    // IF para ver si cumple los requisitos //
    if($contraseña != $Repetircontraseña){
        echo json_encode("Las contraseñas no coinciden");
    }

    // Hago el insert en la DB //
    $contraseña = hash('SHA512', $contraseña);
    $query = $connect-> prepare ("INSERT INTO users (username, password, name, role) values (?, ?, ?, ?)");
    $query->execute([$username, $password, $username, $name]);
    
    if($query){
        echo json_encode("Usuario Agregado con éxito");
    }else{
        echo json_encode("Ha ocurrido un error al agregar usuario");
    }
}




// Editar producto //
function editarProducto($connect): void{   
    if(!isset($_POST['operacion'])){$_POST['operacion']= '';};
    if(!isset($_POST['tipo'])){$_POST['tipo']= '';};
    if(!isset($_POST['codigopostal'])){$_POST['codigopostal']= '';};
                    
        $sentencia = $connect->prepare("SELECT * FROM `products` WHERE id= '".$_GET['id']."'") or die('query failed');
        $sentencia->execute();
        $list_propiedadesOperacion = $sentencia->fetchAll();                         
        foreach($list_propiedadesOperacion as $propiedad){
            $editarCod = $propiedad['cod'];
            $editarName = $propiedad['name'];
            $editarPrice = $propiedad['price'];
        }         
    
        // Variables de sección información //
        $NEWcod = $_POST['cod'];
        $NEWname = $_POST['name'];
        $NEWprice = $_POST['price'];
        $modified = date("Y-m-d H:i:s");

        // Update en mi información //
        $update = " modified = '".$modified."'";
    
        if($NEWcod != $editarCod){
            $update .= ", cod = '".$NEWcod."'";
        }
        if($NEWname != $editarName){
            $update .= ", name = '".$NEWname."'";
        }
        if($NEWprice != $editarPrice){
            $update .= ", price = '".$NEWprice."'";
        }

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE products SET $update WHERE id= '".$_GET['id']."'");
        $query->execute();
        if($query){
           echo json_encode("Cambios Realizados con éxito");
        }else{
            echo json_encode("Ha ocurrido un error al editar el producto");
        }
}


// Editar usuario //
function editarUsuario($connect) : void{

    if(!isset($_POST['username'])){$_POST['habilitar']='';};
    if(!isset($_POST['password'])){$_POST['habilitar']='';};
    if(!isset($_POST['name'])){$_POST['name']='';};
    if(!isset($_POST['role'])){$_POST['role']=2;};
    if(!isset($_POST['repassword'])){$_POST['repassword']=0;};
    
    $sentencia = $connect->prepare("SELECT * FROM `users` WHERE user_id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_consultas = $sentencia->fetchAll();                         
    foreach($list_consultas as $consulta){
        $EDITARusername = $consulta['username'];
        $EDITARpassword = $consulta['password'];
        $EDITARname = $consulta['name'];
        $EDITARrole = $consulta['role'];   
    }  
    
    $NEWusername = $_POST['username'];
    $NEWpassword = $_POST['password'];
    $NEWname = $_POST['name'];
    $NEWrole = $_POST['role'];
    $NEWrepassword = $_POST['repassword'];
          
        if($NEWpassword == $NEWrepassword){       
            $NEWpassword = hash('SHA512', $NEWpassword);
            // Update en mi información //
            $update = " habilitado = '".$NEWhabilitado."'";
        
            if($EDITARusername != $EDITARusername){
                $update .= ", username = '".$EDITARusername."'";
            }
            if($NEWpassword != $EDITARpassword){
                $update .= ", password = '".$NEWpassword."'";
            }       
            if($NEWname != $EDITARname){
                $update .= ", name = '".$NEWname."'";
            }       
            if($NEWrole != $EDITARrole){
                $update .= ", role = '".$NEWrole."'";
            }       
            
            // Hago el update en la DB //
            $query = $connect-> prepare ("UPDATE user SET $update WHERE user_id= '".$_GET['id']."'");
            $query->execute();
        
            if($query){  
                echo json_encode("Cambios Realizados con éxito");
            }else{
                echo json_encode("Ha ocurrido un error al editar el usuario");
            }
        }else{echo json_encode("Las contraseñas no coinciden");}
}




// Eliminar producto //
function eliminarProducto($connect) : void{
    $id = $_GET['id'];
    $query = $connect-> prepare ("DELETE FROM products WHERE id=?");
    $query->execute([$id]);
    if($query){
        echo json_encode("Producto eliminado  con éxito");
    }else{
        echo json_encode("Ha ocurrido un error al eliminar el producto");
    }
}


// Eliminar usuario //
function eliminarUsuario($connect,$connect2) : void{
    $id = $_GET['id'];
    $query = $connect-> prepare ("DELETE FROM usuarios WHERE user_id=?");
    $query->execute([$id]);
    if($query){
        echo json_encode("Usuario eliminado  con éxito");
    }else{
        echo json_encode("Ha ocurrido un error al eliminar el usuario");
    }
}

?>