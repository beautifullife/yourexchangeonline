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
    <!-- awesome font -->
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('ionicons.min.css') ?>
    <?= $this->Html->css('app.min.css') ?>
    <?= $this->Html->css('skins/_all-skins.min.css') ?>
    <?= $this->Html->css('carot.css') ?>
    <?= $this->Html->css('jquery-ui.css') ?>
    <?= $this->Html->css('jquery-ui.structure.css') ?>
    <?= $this->Html->css('jquery-ui.theme.css') ?>

    <!-- jQuery 2.1.3 -->
    <?= $this->Html->script('jQuery-2.1.3.min.js') ?>
    <!-- Bootstrap 3.3.2 JS -->
    <?= $this->Html->script('bootstrap.min.js') ?>
    <!-- Jquery UI -->
    <?= $this->Html->script('jquery.js');?>
    <?= $this->Html->script('jquery-ui.min.js');?>
    <?= $this->Html->script('jquery.yourex-ui.js');?>
    <?= $this->Html->script('jquery.encode.js');?>
    <!-- Client -->
    <?= $this->Html->script('client.js');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body class="skin-green">

    <!-- MENU HEADER -->
    <?= $this->element('Parts/header') ?>
    <!-- /MENU HEADER -->

    <div id="content" class="container">

        <h2><?php //echo $this->fetch('title'); ?></h2>

        <div class="text-center"><?= $this->Flash->render() ?></div>

        <div class="main">

            <div class="">

                <div class="row">

                  <!-- LEFT -->
                  <?php if($user): ?>
                  <div class="col-lg-3 border-right-friends">

                    <?= $this->element('Parts/left') ?>

                  </div>
                  <?php endif; ?>
                  <!-- /LEFT -->

                  <!-- CONTENT -->
                  <div class="<?php if($user): ?>col-lg-6<?php endif; ?>">

                      <?= $this->fetch('content') ?>

                  </div>
                  <!-- /CONTENT -->

                  <!-- RIGHT -->
                  <?php if($user): ?>
                  <div class="col-lg-3">

                    <?= $this->element('Parts/right') ?>

                  </div>
                  <?php endif; ?>
                  <!-- RIGHT -->

                </div>

            </div>

        </div>

        <!-- FOOTER -->
        <?= $this->element('Parts/copyright') ?>
        <!-- /FOOTER -->

    </div>
    
    <!-- CHAT -->
    <div id="chat">
        <ul>
            <li class="title">Chat</li>
            <li class="content">
                <?= $this->element('Parts/right/chat') ?>
            </li>
        </ul>
    </div>
    <!-- /CHAT -->

    <!--DEBUG-->
    <?php
    if (Configure::read('debug')):
        Debugger::checkSecurityKeys();
    endif;
    ?>
    <!--/DEBUG-->

</body>
</html>
