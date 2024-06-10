<?php
    function renderAD($path, $data = [])
    {
        extract($data);
        $view = "../admin/" . $path . ".php";
        include $view;
    }
?>