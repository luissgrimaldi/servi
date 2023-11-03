<?php session_start();
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
}
session_destroy(); 
define('servicorrVersion', 'servicorrV-1');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/login.css?<?php echo servicorrVersion;?>">
    <script src="https://kit.fontawesome.com/53d0376852.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="body__container">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Login */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="login">
            <h1 class="login__title">SERVICORR S.R.L</h1>
            <div class="login__container">
                <div class="login__bloque">
                    <form autocomplete="off" class="login__form" id="login__form" method="POST">
                        <div class="login__form__bloque">
                            <label class="login__form__label" for="">Usuario</label>
                            <input class="login__form__input" name="username" type="text" placeholder="Usuario">
                        </div>
                        <div class="login__form__bloque">
                            <label class="login__form__label" for="">Contaseña</label>
                            <input class="login__form__input" name ="password" type="password" placeholder="Contraseña">
                        </div>
                        <div class="login__form__bloque bloque--3">
                            <input class="login__form__input login__form__input--submit" type="submit" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Login */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <!-- <script src="js/index.js?<?php echo servicorrVersion;?>"></script> -->
    <script>
            let formLogin= document.getElementById('login__form');
            formLogin.addEventListener("submit", function(e){
                e.preventDefault();
                let url = "backend/login.php";
                let datos = new FormData(formLogin);
            
                fetch(url, {
                    method:'POST',
                    body: datos,
                    mode: "cors" //Default cors, no-cors, same-origin
                }).then(response => response.json())
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        // Puedes mostrar un mensaje si lo deseas
                        alert(data.message);
                    }
                })
                .catch(err => console.log(err))
                    
            });
    </script>
</body>
</html>