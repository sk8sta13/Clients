<div class="page-header">
    <h1><?php echo $client->name; ?></h1>
</div>

<div class="col-lg-6">
    <h4><strong><?php echo ucfirst(lang('documents')); ?></strong></h4>
    <p>
        <?php
        foreach ($client->documents as $document) {
            echo $document->label . ': ' . $document->number . '<br />';
        }
        ?>
    </p>
    <h4><strong><?php echo ucfirst(lang('e-mails')); ?></strong></h4>
    <p>
        <?php
        foreach ($client->emails as $email) {
            echo $email->label . ': ' . mailto($email->address, $email->address);
            echo '&nbsp;<a href="/client/active/email-' . $email->id . '-' . $client->id . '" class="tip btn btn-default btn-xs glyphicon ' . (($email->active) ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down') . '" data-toggle="tooltip" data-placement="right" title="' . ucfirst(lang('e-mail')) . ' ' . (($email->active) ? lang('active') : lang('inactive')) . '"></a>';
            echo '<br />';
        }
        ?>
    </p>
</div>

<div class="col-lg-6">
    <h4><strong><?php echo ucfirst(lang('phones')); ?></strong></h4>
    <p>
        <?php
        foreach ($client->phones as $phone) {
            echo $phone->label . ': ' . $phone->number;
            echo '&nbsp;<a href="/client/active/phone-' . $phone->id . '-' . $client->id . '" class="tip btn btn-default btn-xs glyphicon ' . (($phone->active) ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down') . '" data-toggle="tooltip" data-placement="right" title="' . ucfirst(lang('phone')) . ' ' . (($phone->active) ? lang('active') : lang('inactive')) . '"></a>';
            echo '<br />';
        }
        ?>
    </p>
    <h4><strong><?php echo ucfirst(lang('custom')); ?></strong></h4>
    <p>
        <?php
        foreach ($client->custom as $cus) {
            echo $cus->data . ': ' . $cus->value . '<br />';
        }
        ?>
    </p>
</div>

<div class="col-lg-12">
    <h4><strong><?php echo ucfirst(lang('addresses')); ?></strong></h4>
    <?php
        foreach ($client->addresses as $address) {
            echo '<p>';
            echo ($address->label) ? "{$address->label}: " : '';
            echo ($address->patio) ? "{$address->patio} " : '';
            echo ($address->number) ? "nº {$address->number} " : '';
            echo ($address->neighborhood) ? ", {$address->neighborhood} " : '';
            echo ($address->city) ? "- {$address->city} " : '';
            echo ($address->state) ? "/ {$address->state} " : '';
            echo ($address->country) ? "- {$address->country} " : '';
            echo ($address->cep) ? " Cep: {$address->cep} " : '';
            echo '&nbsp;<a href="/client/active/address-' . $address->id . '-' . $client->id . '" class="tip btn btn-default btn-xs glyphicon ' . (($address->active) ? 'glyphicon-thumbs-up' : 'glyphicon-thumbs-down') . '" data-toggle="tooltip" data-placement="right" title="' . ucfirst(lang('address')) . ' ' . (($address->active) ? lang('active') : lang('inactive')) . '"></a>';
            echo '</p>';
        }
        ?>
</div>