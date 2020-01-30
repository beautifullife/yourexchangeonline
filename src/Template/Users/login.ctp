<div class="container">
<?= $this->Form->create('login', ['class' => 'form-horizontal']) ?>
    <fieldset>
        <legend>Login</legend>
        <div class="form-group">
          <div class="col-lg-10">          
            <?= $this->Form->input('email', [
                'class'         => 'form-control',
                'id'            => 'inputEmail',
                'placeholder'   => 'Email',
            ]) ?>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-lg-10">
            <?= $this->Form->input('password', [
                'class'         => 'form-control',
                'id'            => 'inputPassword',
                'placeholder'   => 'Password',
            ]) ?>
            <br />
            <div class="clearBoth"><?= $this->Form->submit('Login', ['class' => 'btn btn-success']) ?></div>
            
            <?= $this->Html->link('<i class="fa fa-facebook"></i>' . __('Sign up using Facebook'), [
                'controller'    => 'facebookoauth',
                'action'        => 'flogin',
              ], [
                'class'     => 'btn btn-social btn-facebook',
                'escape'    => false,
              ]) ?>
              
            <?= $this->Html->link('<i class="fa fa-google"></i>' . __('Sign up using Google+'), [
                'controller'    => 'users',
                'action'        => 'loginGoogle',
              ], [
                'class'     => 'btn btn-social btn-google-plus',
                'escape'    => false,
              ]) ?>
            
          </div>
        </div>
          
        <div class="form-group">
            <div class="col-lg-10">
                <?= $this->Html->link(__('Forgot Password'),[
                    'controller'    => 'users',
                    'action'        => 'forgotPassword',
                ],[
                'class' => 'navbar-left',
            ]) ?>  |
            
            <?= $this->Html->link(__('Register'),[
                    'controller'    => 'users',
                    'action'        => 'register',
                ],[
                'class' => '',
            ]) ?> 
          </div>
        </div>
        
      </fieldset>
<?= $this->Form->end() ?>
</div>