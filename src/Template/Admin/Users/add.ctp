<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo '<div class="form-group">';
            echo $this->Form->input(__('type'), [
                'class' => 'form-control',
                'type'  => 'number',
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('status'), [
                'class' => 'form-control',
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('email'),[
                'class'         => __('form-control'),
                'placeholder'   => __('Enter your email')
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('password'),[
                'class'         => 'form-control',
                'placeholder'   => __('Enter your password'),
                'value'         => '',
                'data-bv-field' => 'password',
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('confirmPassword'),[
                'class'         => 'form-control',
                'type'          => 'password',
                'placeholder'   => __('Re-type password'),
                'data-bv-field' => 'confirmPassword',
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('full_name'),[
                'class'         => 'form-control',
                'placeholder'   => __('Your full name')
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('image'),[
                'class'         => 'form-control',
                'placeholder'   => __('Choose your avatar')
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('birthday'),[
                'empty' => true, 
                'default' => '',
                'class'         => 'form-control',
                'placeholder'   => __('Choose your avatar')
                ]);
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('phone'), [
                'class' => 'form-control',
                ]);     
            echo '</div>';
            
            echo '<div class="form-group">';       
            echo $this->Form->input(__('address'), [
                'class' => 'form-control',
                ]);   
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('region_id'), [
                'options' => $regions,
                'empty' => true,
                'class' => 'form-control',
                ]);              
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->Form->input(__('city_id'), [
                'options' => $cities,
                'empty' => true,
                'class' => 'form-control',
                ]);
            echo '</div>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
