<?php if (isset($error)) {?>
    <div class="alert alert-danger" role="alert">
        <strong><?php echo ucfirst(lang('attention')); ?>!</strong>
        <?php echo validation_errors(); ?>
    </div>
<?php } ?>

<?php echo form_open('client/save'); ?>
    <?php echo form_hidden('id', ((isset($client)) ? $client->id : '')); ?>
    <div class="row">
        <div class="col-xs-6">
            <?php echo form_input(['name' => 'name', 'id' => 'name', 'placeholder' => ucfirst(lang('name')), 'class' => 'form-control', 'value' => (isset($client)) ? $client->name : '']); ?>
        </div>
        <div class="col-xs-3">
            <?php echo form_input(['name' => 'birthday', 'id' => 'birth', 'placeholder' => ucfirst(lang('date of birth')), 'class' => 'date form-control', 'value' => (isset($client)) ? $client->birthday->format('d/m/Y') : '']); ?>
        </div>
        <div class="col-xs-3">
            <?php echo form_dropdown('sex', ['' => ucfirst(lang('sex')), 'male' => ucfirst(lang('male')), 'Female' => ucfirst(lang('female'))], (isset($client)) ? $client->sex : '', 'class="form-control"'); ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><?php echo ucfirst(lang('e-mails')); ?></div>
        <div class="panel-body">
            <span id="email_area">
                <?php echo anchor('#', ucfirst(lang('add')), 'title="' . ucfirst(lang('add')) . ' ' . lang('new') . ' ' . lang('e-mail') . '" class="clone btn btn-info btn-xs"'); ?>
                <?php if ((isset($client)) && (count($client->emails))) { ?>
                    <?php foreach($client->emails as $i => $email) { ?>
                        <span class="email">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'email[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control', 'value' => $email->label]); ?>
                                </div>
                                <div class="col-xs-6">
                                    <?php echo form_input(['name' => 'email[address][]', 'placeholder' => ucfirst(lang('e-mail')), 'class' => 'form-control', 'value' => $email->address]); ?>
                                </div>
                                <div class="col-xs-2">
                                    <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this e-mail'), lang('remove'))) . '" class="remove-clone  btn btn-warning btn-xs pull-right"' . (($i == 0) ? ' style="display: none;"' : '')); ?>
                                </div>
                            </div>
                        </span>
                    <?php } ?>
                <?php } else { ?>
                    <span class="email">
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'email[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-6">
                                <?php echo form_input(['name' => 'email[address][]', 'placeholder' => ucfirst(lang('e-mail')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this e-mail'), lang('remove'))) . '" class="remove-clone  btn btn-warning btn-xs pull-right" style="display: none;"'); ?>
                            </div>
                        </div>
                    </span>
                <?php } ?>
            </span>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><?php echo ucfirst(lang('phones')); ?></div>
        <div class="panel-body">
            <span id="phone_area">
                <?php echo anchor('#', ucfirst(lang('add')), 'title="' . ucfirst(lang('add')) . ' ' . lang('new') . ' ' . lang('phone') . '" class="clone btn btn-info btn-xs"'); ?>
                <?php if ((isset($client)) && (count($client->phones))) { ?>
                    <?php foreach($client->phones as $i => $phone) { ?>
                        <span class="phones">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'phone[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control', 'value' => $phone->label]); ?>
                                </div>
                                <div class="col-xs-6">
                                    <?php echo form_input(['name' =>'phone[number][]', 'placeholder' => ucfirst(lang('phone')), 'class' => 'form-control', 'value' => $phone->number]); ?>
                                </div>
                                <div class="col-xs-2">
                                    <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this phone'), lang('remove'))) . '" class="remove-clone btn btn-warning btn-xs pull-right"' . (($i == 0) ? ' style="display: none;"' : '')); ?>
                                </div>
                            </div>
                        </span>
                    <?php } ?>
                <?php } else { ?>
                    <span class="phones">
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'phone[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-6">
                                <?php echo form_input(['name' =>'phone[number][]', 'placeholder' => ucfirst(lang('phone')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this phone'), lang('remove'))) . '" class="remove-clone btn btn-warning btn-xs pull-right" style="display: none;"'); ?>
                            </div>
                        </div>
                    </span>
                <?php } ?>
            </span>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><?php echo ucfirst(lang('documents')); ?></div>
        <div class="panel-body">
            <span id="document_area">
                <?php echo anchor('#', ucfirst(lang('add')), 'title="' . ucfirst(lang('add')) . ' ' . lang('new') . ' ' . lang('document') . '" class="clone btn btn-info btn-xs"'); ?>
                <?php if ((isset($client)) && (count($client->documents))) { ?>
                    <?php foreach($client->documents as $i => $document) { ?>
                        <span class="documents">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'document[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control', 'value' => $document->label]); ?>
                                </div>
                                <div class="col-xs-6">
                                    <?php echo form_input(['name' => 'document[number][]', 'placeholder' => ucfirst(lang('document')), 'class' => 'form-control', 'value' => $document->number]); ?>
                                </div>
                                <div class="col-xs-2">
                                    <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this document'), lang('remove'))) . '" class="remove-clone btn btn-warning btn-xs pull-right"' . (($i == 0) ? ' style="display: none;"' : '')); ?>
                                </div>
                            </div>
                        </span>
                    <?php } ?>
                <?php } else { ?>
                    <span class="documents">
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'document[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-6">
                                <?php echo form_input(['name' => 'document[number][]', 'placeholder' => ucfirst(lang('document')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this document'), lang('remove'))) . '" class="remove-clone btn btn-warning btn-xs pull-right" style="display: none;"'); ?>
                            </div>
                        </div>
                    </span>
                <?php } ?>
            </span>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><?php echo ucfirst(lang('addresses')); ?></div>
        <div class="panel-body">
            <span id="address_area">
                <?php echo anchor('#', ucfirst(lang('add')), 'title="' . ucfirst(lang('add')) . ' ' . lang('new') . ' ' . lang('address') . '" class="clone btn btn-info btn-xs"'); ?>
                <?php if ((isset($client)) && (count($client->addresses))) { ?>
                    <?php foreach($client->addresses as $i => $address) { ?>
                        <span class="addresses">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'address[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control', 'value' => $address->label]); ?>
                                </div>
                                <div class="col-xs-6">
                                    <?php echo form_input(['name' => 'address[patio][]', 'placeholder' => ucfirst(lang('patio')), 'class' => 'form-control', 'value' => $address->patio]); ?>
                                </div>
                                <div class="col-xs-2">
                                    <?php echo form_input(['name' => 'address[number][]', 'placeholder' => ucfirst(lang('number')), 'class' => 'form-control', 'value' => $address->number]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'address[neighborhood][]', 'placeholder' => ucfirst(lang('neighborhood')), 'class' => 'form-control', 'value' => $address->neighborhood]); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'address[city][]', 'placeholder' => ucfirst(lang('city')), 'class' => 'form-control', 'value' => $address->city]); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'address[country][]', 'placeholder' => ucfirst(lang('country')), 'class' => 'form-control', 'value' => $address->country]); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'address[state][]', 'placeholder' => ucfirst(lang('state')), 'class' => 'form-control', 'value' => $address->state]); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'address[cep][]', 'placeholder' => ucfirst(lang('postal code')), 'class' => 'form-control', 'value' => $address->cep]); ?>
                                </div>
                                <div class="col-xs-4">
                                    <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this address'), lang('remove'))) . '" class="address remove-clone btn btn-warning btn-xs pull-right"' . (($i == 0) ? ' style="display: none;"' : '')); ?>
                                </div>
                            </div>
                        </span>
                    <?php } ?>
                <?php } else { ?>
                    <span class="addresses">
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'address[label][]', 'placeholder' => ucfirst(lang('type')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-6">
                                <?php echo form_input(['name' => 'address[patio][]', 'placeholder' => ucfirst(lang('patio')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo form_input(['name' => 'address[number][]', 'placeholder' => ucfirst(lang('number')), 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'address[neighborhood][]', 'placeholder' => ucfirst(lang('neighborhood')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'address[city][]', 'placeholder' => ucfirst(lang('city')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'address[country][]', 'placeholder' => ucfirst(lang('country')), 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'address[state][]', 'placeholder' => ucfirst(lang('state')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'address[cep][]', 'placeholder' => ucfirst(lang('postal code')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-4">
                                <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this address'), lang('remove'))) . '" class="address remove-clone btn btn-warning btn-xs pull-right" style="display: none;"'); ?>
                            </div>
                        </div>
                    </span>
                <?php } ?>
            </span>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><?php echo ucfirst(lang('extra data')); ?></div>
        <div class="panel-body">
            <span id="custom_area">
                <?php echo anchor('#', ucfirst(lang('add')), 'title="' . ucfirst(lang('add')) . ' ' . lang('new') . ' ' . lang('data') . '" class="clone btn btn-info btn-xs"'); ?>
                <?php if ((isset($client)) && (count($client->custom))) { ?>
                    <?php foreach($client->custom as $i => $custom) { ?>
                        <span class="custom">
                            <div class="row">
                                <div class="col-xs-4">
                                    <?php echo form_input(['name' => 'custom[data][]', 'placeholder' => ucfirst(lang('data')), 'class' => 'form-control', 'value' => $custom->data]); ?>
                                </div>
                                <div class="col-xs-6">
                                    <?php echo form_input(['name' => 'custom[value][]', 'placeholder' => ucfirst(lang('value')), 'class' => 'form-control', 'value' => $custom->value]); ?>
                                </div>
                                <div class="col-xs-2">
                                    <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this field custom'), lang('remove'))) . '" class="remove-clone btn btn-warning btn-xs pull-right"' . (($i == 0) ? ' style="display: none;"' : '')); ?>
                                </div>
                            </div>
                        </span>
                    <?php } ?>
                <?php } else { ?>
                    <span class="documents">
                        <div class="row">
                            <div class="col-xs-4">
                                <?php echo form_input(['name' => 'custom[data][]', 'placeholder' => ucfirst(lang('data')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-6">
                                <?php echo form_input(['name' => 'custom[value][]', 'placeholder' => ucfirst(lang('value')), 'class' => 'form-control']); ?>
                            </div>
                            <div class="col-xs-2">
                                <?php echo anchor('#', ucfirst(lang('remove')), 'title="' . ucfirst(sprintf(lang('this field custom'), lang('remove'))) . '" class="remove-clone btn btn-warning btn-xs pull-right" style="display: none;"'); ?>
                            </div>
                        </div>
                    </span>
                <?php } ?>
            </span>
        </div>
    </div>

    <?php echo form_button(['type' => 'submit', 'content' => ucfirst(lang('save')), 'class' => 'btn btn-success pull-right']); ?>
<?php echo form_close(); ?>

<script>
    $(document).ready(function(){
        // Clona os campos
        $('.clone').click(function(e) {
            e.preventDefault();
            var clone = $(this).next();
            var span = '<span class="' + clone.attr('class') + '">';
            clone = clone.clone();
            clone.find('input[type=text]').val('');
            clone.find('.remove-clone').show();
            $(this).parent().append(span + clone.html() + '</span>');
        });

        // Remove o campo clonado
        $('div').on('click', '.remove-clone', function(e) {
            e.preventDefault();
            $(this).parent().parent().parent().remove();
        });

        $('#birth').mask('99/99/9999');
        $('#data').mask('99/99/9999 99:99');
    });
</script>