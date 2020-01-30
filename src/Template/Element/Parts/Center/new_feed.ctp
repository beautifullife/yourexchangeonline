<div id="runtimePosts"></div>

<?php foreach ($posts as $post): ?>
<?= $this->Form->create('',[
    'name' => 'form-'.$post->id
]) ?>
<div class="conainer post-area droppable-item">
    <!-- User Info -->
    <div class="user_info">
        <div class="col-xs-2">
            <?=
            $this->Html->link(
                $this->Html->image($post->users['image'], [
                    'alt'   => 'avartar',
                    'class' => 'img-circle col-md-12',
                ])
            ,[
                'controller'    => 'users',
                'action'        => 'profileByUser',
                'params'        => $post->user_id,
            ],[
                'escape'    => false
            ])
            ?>
        </div>
        <div class="col-xs-8">
            <?= $this->Html->link($post->users['full_name'], [
                'controller'    => 'users',
                'action'        => 'profileByUser',
                'params'        => $post->user_id,
            ], [
                'alt'   => 'avartar',
                'class' => 'col-md-12',

            ]) ?>
        </div>
        <!-- Action menu -->
        <div class="btn-group text-center navbar-right">
          <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu bg-success" role="menu">
            <li>Edit</li>
            <li>Delete</li>
          </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="post_content">
        <div>
        <?= $this->Form->input('tid'.base64_encode($post->id),[
            'value' => base64_encode($post->id),
            'type'  => 'hidden',
            'id'    => base64_encode($post->id),
        ]) ?>
        <p class="main_content"><?= nl2br(h($post->content)) ?></p>
        <!-- price & currency -->
        <span class="price" class="col-xs-2 bg-info navbar-right">
            <?= h($post->price) ?>
            <?= h($post->currency) ?>
        </span>
        </div>
    </div>

    <!-- wishlist -->
    <div><?= __('Wishlist:') ?> <?= h($post->wishlists) ?></div>

    <!-- like | exchange | rate -->
    <div class="like_exchange">
        <?= $this->Form->button(__('Like'),[
            'class' => 'bt bt-info'
        ]) ?>
        <?= $this->Form->button(__('Exchange'),[
            'class'     => 'bt bt-info',
            'type'      => 'button',
            'onclick'   => "showDialog2('" . base64_encode($post->id) . "')"
        ]) ?>
        <?= $this->Form->button(__('Rate'),[
            'class' => 'bt bt-info'
        ]) ?>
    </div>

    <!-- like comment -->
    <div class="like_comment">
    <!-- comment -->
        <div class="comment">
            <?= $this->Html->tag('textarea','',[
            'class'         => 'form-control',
            'placeholder'   => __('Comment...'),
            'rows'          => 3,
            'class'            => 'form-control post_comment',
        ]) ?>
        </div>
        <div>
        <?= $this->Form->button(__('Like'),[
            'class' => 'bt bt-info'
        ]) ?>
        </div>
    </div>

<?= $this->Form->end() ?>

</div>

<?php endforeach; ?>