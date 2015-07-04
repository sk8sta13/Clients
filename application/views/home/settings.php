<?php if ($this->session->flashdata()) {?>
    <div class="alert alert-success" role="alert"><?php echo lang('An import has been completed'); ?></div>
<?php } ?>

<div class="starter-template">
    <h1>Webservice</h1>
    <p class="lead">
        <?php echo lang("You can consume this webservice starting a post request, here's how:"); ?>
        <pre>
&lsaquo;?php
$url  = 'http://domain.com/api/username';
$data['password'] = 'password';
/**
 * By default the return will be a JSON but you
 * can add in the array 'type' => 'xml' so the
 * return is an xml.
 *
 * $data['type'] = 'xml';
 */

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$result = curl_exec($ch);
echo $result;

curl_close($ch);
        </pre>
    </p>
</div>

<div class="starter-template">
    <h1><?php echo lang('index-sub-title-4'); ?></h1>
    <p class="lead">
        <?php echo sprintf(lang('To import the data you need to create a file in CSV format, download an example'), anchor('/example.csv', lang('here'), ['target' => '_blank'])); ?>
    </p>

    <?php echo form_open_multipart('client/import'); ?>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger" role="alert">
                <strong><?php echo ucfirst(lang('attention')); ?>!</strong>
                <?php echo lang('The file is not the correct type'); ?>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <?php echo form_button(['type' => 'submit', 'content' => ucfirst(lang('send')), 'class' => 'btn btn-success pull-right']); ?>
                <input type="file" id="filecsv" name="filecsv" />
                <p class="help-block"><?php echo lang('Select the file with the data in CSV format'); ?></p>
            </div>
        </div>
    <?php echo form_close(); ?>

</div>