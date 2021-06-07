<?php
spl_autoload_register(function ($class) {
    if(file_exists('./core/' . $class . '.php')):
        include './core/' . $class . '.php';
    elseif (file_exists('./models/' . $class . '.php')):
        include './models/' . $class . '.php';
    elseif (file_exists('./controllers/' . $class . '.php')):
        include './controllers/' . $class . '.php';
    endif;
});