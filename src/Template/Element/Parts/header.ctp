<header class="main-header">

        <!-- Logo
        <a href="" class="logo"><b><?= __('Traodoionline.com') ?></b></a>-->

        <!-- Header Navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-left: 0px;">

        <!--MENU-->
            <ul class="nav navbar-nav">
              <li>
                <?= $this->Html->link('Home',[
                    'controller'    => 'pages',
                    'action'        => 'display'
                ],[
                    'class' => 'active'
                ]) ?>
              </li>

                <li class="dropdown">
                  <?php 
                    $byLocation = 'By Locations';
                    $liString = '';
                    $citiesEncode = '';
                    foreach ($geoIPLocation as $location):
                  ?>
                  <?php
                      if (!empty($searchCities) && $searchCities == $location->id) {
                          $byLocation = $location->name;
                          $citiesEncode = base64_encode($searchCities);
                      }
                      $liString .= '<li>' . $this->Html->link($location->name, 
                                                              ['controller' => 'posts', 
                                                              'action' => 'search', 
                                                              'city' => base64_encode($location->id), 
                                                              'search' => isset($searchPost) ? $searchPost : '', 
                                                              '_full' => TRUE]) . '</li>';
                  ?>
                  <?php endforeach;?>
                    <?= $this->Html->link($byLocation . ' <span class="caret"></span>', '', [
                                        'escapeTitle'=>false,
                                        'class' => 'dropdown-toggle',
                                        'data-toggle' => 'dropdown',
                                        'aria-expanded' => 'true',
                                        'role' => 'button',
                                        ]) ?>
                    <?php if (!empty($geoIPLocation)): ?>
                    <ul class="dropdown-menu" role="menu">
                        <?= $liString ?>
                    </ul>
                    <?php endif;?>
                </li>

              <!--SEARCH-->
                <?= $this->Form->create('Search',[
                	'id' => 'search-form',
                  'type' => 'get',
                  'class' => 'navbar-form navbar-left',
                  'role' => 'search',
                	'url' => ['controller' => 'posts','action' => 'search']
                ]) ?>

                  <div class="form-group">
                    <?= $this->Form->input('search...', [
                    	'id' => 'search-input',
                        'class' => 'form-control',
                        'placeholder' => 'Search',
                        'name' => 'search',
                    	'value' => !empty($searchPost) ? $searchPost : NULL
                    ]) ?>
                    <?= $this->Form->input('city', [
                        'type' => 'hidden',
                        'name' => 'city',
                        'value' => !empty($citiesEncode) ? $citiesEncode : NULL
                    ]) ?>
                  </div>

                  <?= $this->Form->button('Sumit', [
                        'class' => 'btn btn-default',
                        'type' => 'submit',
                        'label' => false,
                    ]) ?>

                <?= $this->Form->end() ?>
              <!--/SEARCH-->

            </ul>
            <!--/MENU-->

        <?php if($user): ?>
    
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header"><?= __('You have ') . $countMessages . __(' messages') ?></li>
                  <li>
                    <!-- inner menu: contains the messages -->
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                      <!-- start message -->
                      <?php foreach ($messages as $message) : ?>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <!-- User Image -->
                            <img src="<?= $message->messages['user_id'] ?>" class="img-circle" alt="User Image">
                          </div>
                          <!-- Message title and timestamp -->
                          <h4>
                            <?= $message->messages['name'] ?>                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <!-- The message -->
                          <p><?= $message->messages['content'] ?></p>
                        </a>
                      </li>
                      <?php endforeach; ?>
                      <!-- end message -->
                    </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div><!-- /.menu -->
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- Inner Menu: contains the notifications -->
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                      <li><!-- start notification -->
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today                        </a>
                      </li><!-- end notification -->
                    </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?= $user['image'] ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?= $user['full_name'] ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?= $user['image'] ?>" class="img-circle" alt="<?= $user['full_name'] ?>">
                    <p>
                      <?= $user['full_name'] ?>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <?= $this->Html->link(__('Profile'), [
                        'controller'    => 'users',
                        'action'        => 'profile'
                      ],[
                        'class' => 'btn btn-default btn-flat',
                      ]) ?>
                    </div>
                    <div class="pull-right">
                      <?= $this->Html->link(__('Sign out'), [
                        'controller'    => 'users',
                        'action'        => 'logout'
                      ], [
                        'class' => 'btn btn-default btn-flat',
                      ]) ?>
                    </div>
                  </li>
                </ul>
              </li>    
              
            </ul>
          </div>
          
         <?php endif; ?>   

        </nav>
      </header>
