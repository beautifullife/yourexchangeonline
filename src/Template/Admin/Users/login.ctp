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
          </div>
        </div>
          
        <div class="form-group">
            <div class="col-lg-10">
                <?= $this->Html->link(__('Forgot Password'),'',[
                'class' => 'navbar-left',
            ]) ?>
          </div>
        </div>
        
        
        <?= $this->Form->submit('Login') ?>
        
      </fieldset>
<?= $this->Form->end() ?>