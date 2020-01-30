<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

<!-- Sidebar user panel (optional) -->
<div class="user-panel">
<div class="pull-left image">
<?= $this->Html->image('dungnguyen.jpg',[
'alt'   => __('User Image'),
'class' => 'img-circle',
]) ?>
</div>
<div class="pull-left info">
<p><?= __('Dung Nguyen') ?></p>
<!-- Status -->
<a href="#"><i class="fa fa-circle text-success"></i> <?= __('Online') ?> </a>
</div>
</div>

<!-- search form (Optional) -->
<form action="#" method="get" class="sidebar-form">
<div class="input-group">
<input type="text" name="q" class="form-control" placeholder="<?= __('Search...') ?>"/>
<span class="input-group-btn">
<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
</div>
</form>
<!-- /.search form -->

<!-- Sidebar Menu -->
<ul class="sidebar-menu">

<li class="header"><?= __('MANAGEMENT') ?></li>
<!-- Dashboard -->
<li>
<?= $this->Html->link(
$this->Html->tag('i','',['class' => 'fa fa-dashboard']).
__('Dashboard'),
[
'controller'    => 'Dashboard',
'action'        => 'index',
],
['escape' => false,]
) ?>
</li>

<?= $this->Html->link(__('Dashboard'),[
    
]) ?>

<li class="treeview">

<?= $this->Html->link(
$this->Html->tag('i','',['class' => 'fa fa-dashboard']).
__('Users').
$this->Html->tag('i','',['class' => 'fa fa-angle-left pull-right']).
$this->Html->tag('span',__('50'),['class'=>'label pull-right bg-red']),
[
'controller'    => 'Users',
'action'        => 'index',
],
['escape' => false,]
) ?>

<!-- Users -->
<ul class="treeview-menu">
<li>
<?= $this->Html->link(
__('Users'),
['controller'   => 'Users',
'action'       => 'index',
]
) ?>
</li>

<li>
<?= $this->Html->link(
__('Messages'),
['controller'   => 'Messages',
'action'       => 'index',
]
) ?>
</li>

<li>
<?= $this->Html->link(
__('Messages Sent'),
['controller'   => 'MessageUser',
'action'       => 'index',
]
) ?>
</li>

</ul>
</li>
<!-- Regions -->
<li class="treeview">
<a href="#">
<i class="fa fa-location-arrow"></i>
<span><?= __('Regions') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li>
<?= $this->Html->link(__('All Regions'), [
'controller'    => 'Regions',
'action'        => 'index',
]) ?>
</li>
<li>
<?= $this->Html->link(__('All cities'), [
'controller'    => 'Cities',
'action'        => 'index',
]) ?>
</li>
</ul>
</li>
<!-- Posts -->
<li class="treeview">
<a href="#">
<i class="fa fa-umbrella"></i>
<span><?= __('Posts') ?></span> <i class="fa fa-angle-left pull-right"></i>
<span class="label label-primary pull-right"><?= __('100') ?></span>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All Posts'),[
'controller' => 'Posts',
'action' => 'index'
]) ?></li>
</ul>
</li>
<!-- Tags -->
<li class="treeview">
<a href="#">
<i class="fa fa-sitemap"></i>
<span><?= __('Tags') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All Tags'),['controller' => 'Tags', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('All Wishlists'),['controller' => 'Wishlists', 'action' => 'index']) ?></li>
</ul>
</li>
<!-- Media -->
<li class="treeview">
<a href="#">
<i class="fa fa-sitemap"></i>
<span><?= __('Media') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All Images'),['controller' => 'Images', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Manage media'),['controller' => 'Medias', 'action' => 'index']) ?></li>
</ul>
</li>
<!-- Payments -->
<li class="treeview">
<a href="#">
<i class="fa fa-dollar"></i>
<span><?= __('Payments') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All payments'),['controller' => 'Payments', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('All currencies'),['controller' => 'Currencies', 'action' => 'index']) ?></li>
</ul>
</li>
<!-- Newsleters -->
<li class="treeview">
<a href="#">
<i class="fa fa-envelope"></i>
<span><?= __('Newsleters') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All Newsletters'),['controller' => 'Newsletters', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Create Newsletters'),['controller' => 'Newsletters', 'action' => 'add']) ?></li>
</ul>
</li>
<!-- Templates -->
<li class="treeview">
<a href="#">
<i class="fa fa-moon-o"></i>
<span><?= __('Templates') ?></span> <i class="fa fa-angle-left pull-right"></i></a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All templates'),['controller' => 'Templates', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Create template'),['controller' => 'Templates', 'action' => 'add']) ?></li>
</ul>
</li>

<!--------------------------------------->
<li class="header"><?= __('SOCIAL') ?></li>
<!-- Users -->
<li class="treeview">
<a href="#">
<i class="fa fa-user-md"></i>
<span><?= __('Friends') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('All friends'),['controller' => 'Friends', 'action' => 'index']) ?></li>
</ul>
</li>

<!--------------------------------------->
<li class="header"><?= __('ANALYTICS') ?></li>
<!-- Analytics -->
<li class="treeview">
<a href="#">
<i class="fa fa-user"></i>
<span><?= __('Users Analytics') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('Users rating'),['controller' => 'Rating', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Manager message'),['controller' => 'Messages', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('User report'),['controller' => 'Reports', 'action' => 'index']) ?></li>
</ul>
</li>
<!-- Exchange -->
<li class="treeview">
<a href="#">
<i class="fa fa-exchange"></i>
<span><?= __('Exchange Analytics') ?></span> <i class="fa fa-angle-left pull-right"></i>
</a>
<ul class="treeview-menu">
<li><?= $this->Html->link(__('Exchange summary'),['controller' => 'Exchange', 'action' => 'index']) ?></li>
</ul>
</li>
</ul><!-- /.sidebar-menu -->

</section>
<!-- /.sidebar -->
</aside>