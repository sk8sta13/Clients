<?php echo anchor('client/create', ucfirst(lang('new')), ['role' => 'button', 'class' => 'btn btn-success pull-right']); ?>

<h4><?php echo ucfirst(lang('customer list')); ?></h4>

<?php echo form_open('', ['class' => 'form-horizontal']); ?>
    <div class="form-group has-feedback">
        <div class="col-xs-12">
            <?php echo form_input(['name' => 'search', 'id' => 'search', 'placeholder' => ucfirst(lang('search')), 'class' => 'form-control', 'aria-describedby' => 'inputSuccess3Status']); ?>
            <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
        </div>
    </div>
<?php echo form_close(); ?>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th><?php echo ucfirst(lang('name')); ?></th>
            <th><?php echo ucfirst(lang('e-mail')); ?></th>
            <th><?php echo ucfirst(lang('phone')); ?></th>
            <th><?php echo ucfirst(lang('actions')); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php if (count($clients)) { ?>
            <?php foreach ($clients as $client) { ?>
            <tr>
                <td><?php echo $client->name; ?></td>
                <td><?php echo $client->emails[0]->address; ?></td>
                <td><?php echo $client->phones[0]->number; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="...">
                        <a href="/client/edit/<?php echo $client->id; ?>" class="btn btn-default btn-xs glyphicon glyphicon-pencil"></a>
                        <a href="/client/delete/<?php echo $client->id; ?>" class="btn btn-default btn-xs glyphicon glyphicon-remove" data-confirm="<?php echo ucfirst(sprintf(lang('this client'), lang('really want to delete'))); ?>?"></a>
                        <a href="/client/detail/<?php echo $client->id; ?>" class="tip btn btn-default btn-xs glyphicon glyphicon-eye-open"  data-toggle="tooltip" data-placement="right" title="<?php echo lang('details'); ?>"></a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        <?php } else { ?>
        <tr>
            <td colspan="4"><?php echo ucfirst(lang('no records found')); ?></td>
        </tr>
        <?php } ?>
    </tbody>

</table>

<script>
    $(function(){
        $('input#search').keyup(function(){
            if($(this).val() != ''){
                $('tbody tr').hide();
                $("tbody tr:contains-ci('" + $(this).val() + "')").show();
                //$("ul.accordion ul:contains-ci('" + $(this).val() + "')").parent('li').show().find('.sub').show();
            }else{
                $('tbody tr').show();
            }
        });
    });
    $.extend($.expr[":"], {
        "contains-ci": function(elem, i, match, array) {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });
</script>
