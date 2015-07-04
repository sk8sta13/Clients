<?php

defined('BASEPATH') or die('No direct script access allowed');

class Layout
{

    public $base_url;

    /**
     * Metodo que executa as implementacoes.
     * Este metodo e chamado atraves do arquivo hooks.php
     * na pasta config.
     *
     * @return
     */
     public function init()
     {

        $CI =& get_instance();
        $this->base_url = $CI->config->slash_item('base_url');
        $output = $CI->output->get_output();
        $layout = VIEWPATH . 'layout' . DIRECTORY_SEPARATOR . '_layout.php';

        if (! file_exists($layout)) {

            show_error("You have specified a invalid layout: $layout");

        } else {

            $layout = $CI->load->file($layout, true);
            $view = str_replace('{body}', $output, $layout);

        }

        echo $view;

    }

}
