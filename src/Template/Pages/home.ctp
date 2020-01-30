<!--Your Mind-->
<?= $this->element('Parts/Center/your_mind') ?>
<!--/Your Mind-->

<!--New Feed-->
<?= $this->element('Parts/Center/new_feed', ['posts', $posts, 'user', $user]) ?>
<!--/New Feed-->