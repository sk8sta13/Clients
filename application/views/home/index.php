<div class="jumbotron">
    <h1><?php echo lang('index-title'); ?></h1>
    <p class="lead"><?php echo lang('index-p-1'); ?></p>
    <p>
        <?php echo ($this->session->has_userdata('id')) ? '' : anchor('user/create', ucfirst(lang('signup')), ['role' => 'button', 'class' => 'btn btn-lg btn-success']); ?>
    </p>
</div>

<div class="row marketing">
    <div class="col-lg-6">
        <h4><strong><?php echo lang('index-sub-title-1'); ?></strong></h4>
        <p><?php echo lang('index-sub-p-1'); ?></p>

        <h4><strong><?php echo ucfirst($this->lang->line('index-sub-title-5')); ?></strong></h4>
        <p><?php echo lang('index-sub-p-5'); ?></p>

        <h4><strong><?php echo $this->lang->line('index-sub-title-4'); ?></strong></h4>
        <p><?php echo lang('index-sub-p-4'); ?></p>
    </div>

    <div class="col-lg-6">
        <h4><strong><?php echo $this->lang->line('index-sub-title-2'); ?></strong></h4>
        <p><?php echo lang('index-sub-p-2'); ?></p>

        <h4><strong><?php echo $this->lang->line('index-sub-title-3'); ?></strong></h4>
        <p><?php echo lang('index-sub-p-3'); ?></p>
    </div>
</div>