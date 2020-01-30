<?= $this->Form->create('Sign Up', ['class' => 'form-horizontal']) ?>
    <fieldset>
        <legend>Sign Up</legend>
        
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
            <?= $this->Form->input('username', [
                'class'         => 'form-control',
                'id'            => 'inputUsername',
                'placeholder'   => 'Username',
            ]) ?>
          </div>
        </div>
        
        <?= $this->Form->submit('Sign up') ?>
        
      </fieldset>
<?= $this->Form->end() ?>