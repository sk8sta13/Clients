<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Gerencie os dados dos seus clientes com o sistema web Clients.">
        <meta name="author" content="Marcelo Soto Campos">

        <title>Clients</title>

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <style>
            body { padding-top: 40px; padding-bottom: 40px; background-color: #eee; }
            .form-signin { max-width: 330px; padding: 15px; margin: 0 auto; }
            .form-signin .form-signin-heading, .form-signin .checkbox { margin-bottom: 10px; }
            .form-signin .checkbox { font-weight: normal; }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus { z-index: 2; }
            .form-signin input[type="text"] { margin-bottom: -1px; border-bottom-right-radius: 0; border-bottom-left-radius: 0; }
            .form-signin input[type="password"] { margin-bottom: 10px; border-top-left-radius: 0; border-top-right-radius: 0; }
        </style>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <div id="errorsForm" class="alert alert-danger" role="alert" style="display: <?php echo ($error) ? 'block' : 'none'; ?>;">
                <strong><?php echo ucfirst(lang('attention')); ?>!</strong>
                <?php if ($error) { ?>
                    <p><?php echo lang('User or password invalid'); ?></p>
                <?php } ?>
            </div>

            <?php echo form_open('login', ['class' => 'form-signin']); ?>

                <h2 class="form-signin-heading"><?php echo ucfirst(lang('sign in')); ?></h2>

                <?php echo form_label(ucfirst(lang('username')), 'username', ['class' => 'sr-only']); ?>
                <?php echo form_input(['type' => 'text', 'placeholder' => ucfirst(lang('username')), 'name' => 'username', 'id' => 'username', 'class' => 'form-control']); ?>

                <?php echo form_label(ucfirst(lang('password')), 'password', ['class' => 'sr-only']); ?>
                <?php echo form_input(['type' => 'password', 'placeholder' => ucfirst(lang('password')), 'name' => 'password', 'id' => 'password', 'class' => 'form-control']); ?>

                <?php echo form_button(['type' => 'submit', 'content' => ucfirst(lang('sign in')), 'class' => 'btn btn-lg btn-primary btn-block']); ?>

            <?php echo form_close(); ?>

        </div>

        <script>
            $('.form-signin').validate({
                errorLabelContainer: $('#errorsForm'),
                wrapper: 'p',
                rules: {
                    username: 'required',
                    password: 'required'
                },
                messages: {
                    username: '<?php echo str_replace("{field}", ucfirst(lang("username")), lang("form_validation_required")); ?>',
                    password: '<?php echo str_replace("{field}", ucfirst(lang("password")), lang("form_validation_required")); ?>'
                }
            });
        </script>

    </body>

</html>