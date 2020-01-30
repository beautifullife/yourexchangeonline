<div class="users secret">
	<h2><?php echo __('Google secret'); ?></h2>
	<div>Enter this code manually: <?php echo $secret;?></div>
	<div>Or scan the QRcode: <?php echo $this->Html->image($url);?></div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link('Generate different secret', array('action' => 'secret', 'renew'));?></li>
		<li><?php echo $this->Form->postLink('Remove secret');?></li>
	</ul>
</div>