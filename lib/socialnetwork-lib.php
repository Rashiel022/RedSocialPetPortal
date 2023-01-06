<?php
$host = "localhost";
$dbuser = "root";
$dbpwd = "";
$db = "redsocial";


$connect = new mysqli($host, $dbuser, $dbpwd, $db);
if(!$connect){
	echo("No se ha conectado la base de datos");
} 

function Headerb () 

{
?>
<!-- COMIENZO DE HEADER -->
<header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- logo para celulares -->
      <span class="logo-lg"><b>PET</b>PORTAL</span>
    </a>

    <!-- Header Navbar: El estilo se puede encontrar en header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Menu derecho de la barra de navegación -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          
          <?php
          $noti = mysqli_query($connect,"SELECT * FROM notificaciones WHERE user2 = '".$_SESSION['id']."'");
          $cuantas = mysqli_num_rows($noti);
          ?>

          <!-- Notificationes: EL estilo se puede encontrar en dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo $cuantas; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tu tienes <?php echo $cuantas; ?> notifiaciones</li>
              <li>
                <!-- Menu interno: Contiene los datos reales -->
                <ul class="menu">

                <?php                
                while($no = mysqli_fetch_array($noti)) {

                $users = mysqli_query($connect,"SELECT * FROM usuarios WHERE id_use = '".$no['user1']."'");
                $usa = mysqli_fetch_array($users);
                ?>

                  <li>
                    <a href="publicacion.php?id=<?php echo $no['id_pub']; ?>">
                      <i class="fa fa-users text-aqua"></i> El usuario <?php echo $usa['usuario']; ?> <?php echo $no['tipo']; ?> tu publicación
                    </a>
                  </li>

                <?php } ?>


                </ul>
              </li>
            </ul>
          </li>

          

          <!-- Cuenta de usuario: el estilo se puede encontrar en dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="avatars/8.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($_SESSION['usuario']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="avatars/8.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo ucwords($_SESSION['usuario']); ?>
                  <small>Miembro desde Mayo 31</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="#">Seguidores</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="#">Seguidos</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="editarperfil.php?id=<?php echo $_SESSION['id'];?>" class="btn btn-default btn-flat">Editar perfil</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Boton de alternancia de la barra lateral del control -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
<!-- END HEADER -->
<?php
}
?>

<?php
function Side ()

{
?>
<!-- COMENZAMOS EL LADO IZQUIERDO-->
<!-- Columna lateral izquierda. contiene el logo y la barra lateral   -->
  <aside class="main-sidebar">
    <!-- barra lateral: el estilo se puede encontrar en sidebar.less -->
    <section class="sidebar">
      <!-- Panel de usuario de la barra lateral -->
      <div class="user-panel">
        <div class="pull-left">
          <img src="avatars/8.jpg" width="50" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['usuario']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Encuentra a tus amigos">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENÚ DE NAVEGACIÓN</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Noticias</span>
          </a>
        </li>
        <li>
          <a href="chats.php">
            <i class="fa fa-comment"></i> <span>Chat</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">1</small>
            </span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <i class="fa fa-user"></i> <span>Mis seguidores</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <i class="fa fa-arrow-right"></i> <span>Seguidos</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <i class="fa fa-heart"></i> <span>Me gusta</span>
          </a>
        </li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<!-- END LEFT SIDE -->
<?php
}
?>