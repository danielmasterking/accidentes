 <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Preaviso */
/* @var $form yii\widgets\ActiveForm */
//var_dump($sucursales);

$permisos = array();

$permisos = array();
if( isset(Yii::$app->session['permisos-exito']) ){
$permisos = Yii::$app->session['permisos-exito'];
}
$controller=Yii::$app->controller->id;
$action=Yii::$app->controller->action->id;

?>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://st4.depositphotos.com/18664664/21428/v/1600/depositphotos_214280710-stock-illustration-management-vector-icon-isolated-on.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= Yii::$app->session['usuario-exito']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>
      </div>
      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        
        <li class="<?= $controller=='gestionriesgo' && $action=='index'?'active':'' ?>">
        	<a href="<?= Yii::$app->request->baseUrl.'/gestionriesgo/index'?>">
        		<i class="fa fa-home fa-fw"></i> <span>Home</span>
        	</a>
        </li>
       <?php if(in_array("gestion-riesgo", $permisos)){ ?>
        <li class="<?= $controller=='gestionriesgo' && $action=='create'?'active':'' ?>">
          <a href="<?= Yii::$app->request->baseUrl.'/gestionriesgo/create'?>">
            <i class="fa  fa-plus"></i> <span>Nueva gestion</span>
          </a>
        </li>

        <?php } ?>

        <?php if(in_array("administrador", $permisos)){ ?>
        <li class="<?= $action=='index' && $controller=='usuario'?'active':'' ?>">
          <a href="<?= Yii::$app->request->baseUrl.'/usuario/index'?>">
            <i class="fa fa-user fa-fw"></i><span>Usuarios</span>
          </a>
        </li>

        <li class="<?=  $controller=='rol'?'active':'' ?>">
          <a href="<?= Yii::$app->request->baseUrl.'/rol/index'?>">
            <i class="fa fa-chevron-circle-right"></i> <span>Roles</span>
          </a>
        </li>

        <li class="<?=  $controller=='permiso'?'active':'' ?>">
          <a href="<?= Yii::$app->request->baseUrl.'/permiso/index'?>">
            <i class="fa fa-chevron-circle-right"></i> <span>Permisos</span>
          </a>
        </li>

        <li class="<?=  $controller=='consultasgestion'?'active':'' ?>">
          <a href="<?= Yii::$app->request->baseUrl.'/consultasgestion/create'?>">
            <i class="fa fa-chevron-circle-right"></i> <span>Conf-Gestion</span>
          </a>
        </li>
        <?php }?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
