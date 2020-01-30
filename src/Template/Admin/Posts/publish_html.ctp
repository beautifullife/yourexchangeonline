<div class="conainer post-area droppable-item">

    <!-- User Info -->
    <div id="user_info">
        <div class="col-xs-2">
            <?=
            $this->Html->link(
                $this->Html->image($user['image'], [
                    'alt'   => 'avartar',
                    'class' => 'img-circle col-md-12',
                ])
            ,[
                'controller'    => 'pages',
                'action'        => 'display',
                'params'        => $user['id'],
            ],[
                'escape'    => false
            ])
            ?>
        </div>
        <div class="col-xs-8">
            <?= $this->Html->link($user['full_name'], [
                'controller'    => 'pages',
                'action'        => 'display',
                'params'        => $user['id'],
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
    <div id="post_content">
        <div>
        <p><?= nl2br(h($lastPost->content)) ?></p>
        <!-- price & currency -->
        <span id="price" class="col-xs-2 bg-info navbar-right">
            <?= h($lastPost->price) ?>
            <?= h($lastPost->currency) ?>
        </span>
        </div>
    </div>

    <!-- wishlist -->
    <div><?= __('Wishlist:') ?> <?= h($lastPost->wishlists) ?></div>

    <!-- like | exchange | rate -->
    <div id="like_exchange">
        <?= $this->Form->button(__('Like'),[
            'class' => 'bt bt-info'
        ]) ?>
        <?= $this->Form->button(__('Exchange'),[
            'class' => 'bt bt-info'
        ]) ?>
        <?= $this->Form->button(__('Rate'),[
            'class' => 'bt bt-info'
        ]) ?>
    </div>

    <!-- like comment -->
    <div id="like_comment">
    <!-- comment -->
        <div id="comment">
            <?= $this->Html->tag('textarea','',[
            'class'         => 'form-control',
            'placeholder'   => __('Comment...'),
            'rows'          => 3,
            'id'            => 'post_comment',
        ]) ?>
        </div>
        <div>
        <?= $this->Form->button(__('Like'),[
            'class' => 'bt bt-info'
        ]) ?>
        </div>
    </div>

</div>