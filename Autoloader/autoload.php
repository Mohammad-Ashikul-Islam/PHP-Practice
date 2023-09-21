<?php
spl_autoload_register(function ($classname){
    $baseDir = "Classes/";
    require_once $baseDir.$classname.".php";
});
