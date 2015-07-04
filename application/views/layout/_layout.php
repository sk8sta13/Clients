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
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/main.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="/js/jquery.maskregex.min.js"></script>
        <script src="/js/jquery.validate.min.js"></script>
    </head>

    <body>

        <div class="container">

            <!-- Header -->
            <div class="header clearfix">
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation"<?php echo ($this->uri->segment(1) == '') ? 'class="active"' : ''; ?>>
                            <?php echo anchor('/', ucfirst(lang('home'))); ?>
                        </li>
                        <li role="presentation"<?php echo ($this->uri->segment(1) == 'user') ? 'class="active"' : ''; ?>>
                            <?php echo anchor('user', ucfirst(lang('user'))); ?>
                        </li>
                        <li role="presentation"<?php echo ($this->uri->segment(1) == 'client') ? 'class="active"' : ''; ?>>
                            <?php echo anchor('clients', ucfirst(lang('client'))); ?>
                        </li>
                        <li role="presentation"<?php echo ($this->uri->segment(1) == 'setting') ? 'class="active"' : ''; ?>>
                            <?php echo anchor('settings', ucfirst(lang('setting'))); ?>
                        </li>
                        <li role="presentation"<?php echo ($this->uri->segment(1) == 'about') ? 'class="active"' : ''; ?>>
                            <?php echo anchor('about', ucfirst(lang('about'))); ?>
                        </li>
                        <li role="presentation">
                            <?php echo ($this->session->has_userdata('id')) ? anchor('logout', ucfirst(lang('logout'))) : anchor('login', ucfirst(lang('login'))); ?>
                        </li>
                    </ul>
                </nav>
                <h3 class="text-muted">Clients</h3>
            </div>

            <!-- Body -->
            <div class="row marketing">

                {body}

            </div>

            <footer class="footer">
                <p>
                    <a href="/language/en" title="English"><img src="/images/en.jpeg" /></a>
                    <a href="/language/pt-BR" title="Português Brasil"><img src="/images/pt-br.jpeg" /></a>
                    <span class="pull-right">© <?php echo mailto('sk8sta13@gmail.com', 'Marcelo') . ' ' . date('Y'); ?></span>
                </p>
            </footer>

        </div>

        <?php include_once '_modals.php'; ?>

    </body>

</html>