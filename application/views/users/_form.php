<?php if (isset($error)) {?>
    <div id="errorsForm" class="alert alert-danger" role="alert">
        <strong><?php echo ucfirst(lang('attention')); ?>!</strong>
        <?php echo validation_errors(); ?>
        <?php echo (! empty($captcha)) ? lang($captcha) : ''; ?>
    </div>
<?php } ?>

<?php echo form_open('user/save', ['id' => 'frmUser']); ?>
    <?php echo form_hidden('id', ((isset($user)) ? $user->id : '')); ?>
    <div class="row">
        <div class="col-xs-6">
            <?php echo form_input(['type' => 'text', 'placeholder' => ucfirst(lang('name')), 'name' => 'name', 'id' => 'name', 'value' => (isset($user)) ? $user->name : '', 'class' => 'form-control']); ?>
        </div>

        <div class="col-xs-6">
            <?php echo form_input(['type' => 'email', 'placeholder' => ucfirst(lang('e-mail')), 'name' => 'email', 'id' => 'email', 'value' => (isset($user)) ? $user->email : '', 'class' => 'form-control']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <?php echo form_input(['type' => 'text', 'placeholder' => ucfirst(lang('username')), 'name' => 'username', 'id' => 'username', 'value' => (isset($user)) ? $user->username : '', 'class' => 'form-control']); ?>
        </div>

        <div class="col-xs-6">
            <?php echo form_input(['type' => 'password', 'placeholder' => ucfirst(lang('password')), 'name' => 'password', 'id' => 'password', 'class' => 'form-control']); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            Digite o captcha: <?php echo $image; ?>
        </div>
        <div class="col-xs-6">
            <?php echo form_input(['type' => 'text', 'placeholder' => 'CAPTCHA', 'name' => 'captcha', 'id' => 'captcha', 'class' => 'form-control']); ?>
        </div>
    </div>

    <?php echo form_button(['type' => 'submit', 'content' => ucfirst(lang('save')), 'class' => 'btn btn-success pull-right']); ?>
<?php echo form_close(); ?>