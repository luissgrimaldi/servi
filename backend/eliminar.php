<?php
include 'connect.php';
include 'functions.php';

if($_GET['page']=='producto'){
    eliminarProducto($connect);
};

?>