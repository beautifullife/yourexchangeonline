<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'Traodoionline.com...';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('ionicons.min.css') ?>    
    <?= $this->Html->css('skins/_all-skins.min.css') ?>
    <?= $this->Html->css('app.min.css') ?>
    <?= $this->Html->css('validator.min.css') ?>
    <?= $this->Html->css('carot.css') ?>
    
    <!-- REQUIRED JS SCRIPTS -->    
    <!-- jQuery 2.1.3 -->
    <?= $this->Html->script('jQuery-2.1.3.min.js') ?>
    <!-- Bootstrap 3.3.2 JS -->
    <?= $this->Html->script('bootstrap.min.js') ?>
    <!-- Admin -->    
    <?= $this->Html->script('app.min.js') ?>
    <!-- Validator -->    
    <?= $this->Html->script('bootstrapValidator.js') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
</head>

<!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the 
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |  
  |---------------------------------------------------------|
  
  -->
  <body class="skin-yellow">
    <div class="wrapper">

      <!-- Main Header -->
      <?= $this->element('Admin/Parts/header') ?>
      
      <!-- Left side column. contains the logo and sidebar -->
      <?= $this->element('Admin/Parts/left') ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <?= $this->element('Admin/Parts/Center/breadcrumb') ?>
        
        <!-- Main content -->
        <section class="content">
          <?= $this->Flash->render() ?>  
          <?= $this->fetch('content') ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?= $this->element('Admin/Parts/Center/footer') ?>

    </div><!-- ./wrapper -->
      
    <!--DEBUG-->
    <?php
    if (Configure::read('debug')):
        Debugger::checkSecurityKeys();
    endif;
    ?>
    <!--/DEBUG-->
    
</body>
</html>