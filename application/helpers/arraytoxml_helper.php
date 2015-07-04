<?php

if (! function_exists('xml_encode')) {

    function xml_encode($data, $root = null)
    {

        $xml = new SimpleXMLElement($root ? '<' . $root . '/>' : '<root/>');
        array_walk_recursive($data, function($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });
        return $xml->asXML();

    }

}
