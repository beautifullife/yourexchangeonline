<div class="container-fluid">

<!-- avartar -->
<div class="img-rounded">
	<?= $this->Html->image($users->image, [
		'alt'   => 'avartar',
		'class' => 'img-thumbnail',
		'width' => '70px'
	]) ?>
</div>
<div>
<?= $this->Upload->edit('Users', $users->id) ?>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Display name:') ?></span>
	<span class="col-xs-7" id="full_name"><?= $users->full_name ?></span>
	<span class="col-xs-2">
		<?=
		$this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'full_name',
			'data-lock' => 0
		]);
		?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Email:') ?></span>
	<span class="col-xs-7" id="email"><?= $users->email ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'email',
			'data-lock' => 0
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Birthday:') ?></span>
	<span class="col-xs-7" id="birthday"><?php if(!empty($users->birthday)) echo date('m/d/Y', strtotime($users->birthday)) ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'birthday',
			'data-lock' => 0
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Phone Number:') ?></span>
	<span class="col-xs-7" id="phone"><?php if (!empty($users->phone)) echo '0' . $users->phone ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'phone',
			'data-lock' => 0
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Address:') ?></span>
	<span class="col-xs-7" id="address"><?= $users->address ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'address',
			'data-lock' => 0
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Country:') ?></span>
	<span class="col-xs-7" id="country"><?= $regionsName->country ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btns-edit-profile',
			'data-rel' => 'country',
			'data-lock' => 0
			]);
		?>
		<?= $this->Form->input('countryInfo', [
					'label' => false,
					'type' => 'hidden',
					'id' => 'countryInfo',
					'value' => $regionsName->id
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('City:') ?></span>
	<span class="col-xs-7" id="cityIns"><?= $citiesName->name ?>
	</span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btns-edit-profile',
			'data-rel' => 'cityIns',
			'data-lock' => 0
		]);?>
		<?= $this->Form->input('cityInfo', [
			'label' => false,
			'type' => 'hidden',
			'id' => 'cityInfo',
			'value' => $citiesName->id
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Date joined:') ?></span>
	<span class="col-xs-7"><?= date('m/d/Y', strtotime($users->created)) ?></span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Short description:') ?></span>
	<span class="col-xs-7" id="short_desc"><?= $users->short_desc ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'short_desc',
			'data-lock' => 0
		]);?>
	</span>
</div>


</div>

<!-- SOCIAL -->
<div class="container-fluid">

<div class="row">
	<span class="col-xs-3"><?= __('Facebook:') ?></span>
	<span class="col-xs-7" id="facebook"><?= $users->facebook ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'facebook',
			'data-lock' => 0
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Google+:') ?></span>
	<span class="col-xs-7" id="google"><?= $users->google ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'google',
			'data-lock' => 0
		]);?>
	</span>
</div>

<div class="row">
	<span class="col-xs-3"><?= __('Twitter:') ?></span>
	<span class="col-xs-7" id="twitter"><?= $users->twitter ?></span>
	<span class="col-xs-2">
		<?= $this->Form->input(__('Edit'), [
			'label' => false,
			'type' => 'button',
			'class' => 'btn btn-info btn-xs btn-edit-profile',
			'data-rel' => 'twitter',
			'data-lock' => 0
		]);?>
	</span>
</div>

</div>

<!-- Change password -->
<div class="container-fluid">
<div class="row">
	<fieldset>
		<legend><?= __('Change Password') ?></legend>
		<span class="col-xs-3"><?= __('Old password:') ?></span>
		<span class="">
		<?= $this->Form->input('old_pass', [
			'label' => false,
			'type' => 'password',
			'id' => 'old_pass'
		]) ?>
		</span>
	<fieldset>
</div>
<br>
<div class="row">
	<fieldset>
		<span class="col-xs-3"><?= __('New password:') ?></span>
		<span class="">
		<?= $this->Form->input('new_pass', [
			'label' => false,
			'type' => 'password',
			'id' => 'new_pass'
		]) ?>
		</span>
	<fieldset>
</div>
<br>
<div class="row">
	<div class="col-md-2">
		<?= $this->Form->button(__('Change'), ['class' => 'btn btn-primary', 'id' => 'btn_edit_change']) ?>
	</div>
	<div class="col-md-3">
		<?=
			$this->Form->input(__('Delete Account'), [
				'label' => false,
				'type' => 'button',
				'class' => 'btn btn-danger',
				'id' => 'del-account',
				'data-rel' => base64_encode($users->id)
			]);
		?>
	</div>
</div>
<?php
	unset($users->id, $users->type, $users->status, $users->password, $users->ip_address, $users->created, $users->modified);
?>
<?= $this->Form->input('userInfo', [
		'label' => false,
		'type' => 'hidden',
		'id' => 'userInfo',
		'value' => json_encode(json_decode($users))
]);?>
</div>
<div style="display: none;" id="show_dialog"></div>
<?= $this->Form->input('userCheck', [
		'label' => false,
		'type' => 'hidden',
		'id' => 'userCheck',
		'value' => 0
]);?>
<?= $this->element('Parts/Center/ajax_profile');?>
