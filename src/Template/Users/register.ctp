<div class="register-box container text-center">
      <div class="register-logo">
        <h2><?= __('Register') ?></h2>
      </div>

  <div class="register-box-body">
    <p class="login-box-msg"><?= __('Register a new membership') ?></p>
        
    <?= $this->Form->create('register', [
        'class' => '',
    ]) ?>
    
      <div class="form-group has-feedback">
        <?= $this->Form->input('full_name', [
            'class'         => 'form-control',
            'placeholder'  => __('Full name'),
            'label'         => false,
        ]) ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->input('email', [
            'class'         => 'form-control',
            'placeholder'  => __('Email'),
            'label'         => false,
        ]) ?>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->input('password', [
            'class'         => 'form-control',
            'placeholder'  => __('Password'),
            'label'         => false,
        ]) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->input('re_password', [
            'class'         => 'form-control',
            'placeholder'  => __('Retype password'),
            'type'          => 'password',
            'label'         => false,
        ]) ?>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->select('gender', ['Male','Female'], [
            'class'         => 'form-control',
            'placeholder'  => __('Gender'),
            'label'         => false,
        ]) ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->input('phone', [
            'class'         => 'form-control',
            'placeholder'  => __('Phone Number'),
            'label'         => false,
        ]) ?>
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <?= $this->Form->textarea('short_desc', [
            'class'         => 'form-control',
            'placeholder'   => __('Short description'),
            'label'         => false,
            'size'          => 5,
        ]) ?>
      </div>
      <div class="checkbox text-left">
        <label>
          <input type="checkbox"> <?= __('I agree to receive newsletter') ?>
        </label>
      </div>  
      <div class="checkbox text-left">
        <label>
          <input type="checkbox"> <?= __('I agree to the') ?>
          <?= $this->Html->link(__('terms'), [
            'controller'    => 'users',
            'action'        => 'terms',
          ]) ?>
        </label>
      </div>  
      
      <?= $this->element('Parts/Center/captcha') ?>  
      
      <!-- /.col -->
      <div class="">
          <?= $this->Form->button(__('Register'), [
            'class' => 'btn btn-success btn-block btn-flat',
            'type'  => 'submit',
          ]) ?>
      </div><!-- /.col -->
    
    <?= $this->Form->end() ?>   

    <div class="social-auth-links text-center">
      <p><?= __('- OR -') ?></p>
      
      <?= $this->Html->link('<i class="fa fa-facebook"></i>' . __('Sign up using Facebook'), [
        'controller'    => 'facebookoauth',
        'action'        => 'flogin',
      ], [
        'class'     => 'btn btn-block btn-social btn-facebook btn-flat',
        'escape'    => false,
      ]) ?>
      
      <?= $this->Html->link('<i class="fa fa-google"></i>' . __('Sign up using Google+'), [
        'controller'    => 'users',
        'action'        => 'loginGoogle',
      ], [
        'class'     => 'btn btn-block btn-social btn-google-plus btn-flat',
        'escape'    => false,
      ]) ?>
      
    </div>

    <?= $this->Html->link(__('I already have a membership'), [
        'controller'    => 'users',
        'action'        => 'login',
      ], [
        'class'     => 'text-center',
      ]) ?>
      
  </div><!-- /.form-box -->
</div><!-- /.register-box -->
