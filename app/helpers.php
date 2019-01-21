<?php
function route_class(){
    // str_replace(search, replace, subject)
    return str_replace('.', '-', Route::currentRouteName());
}
