<?php
function smarty_function_widget_advantage_data($params, $template){
    $collection = new plugins_advantage_public();

    $template->assign('advantages',$collection->getAdvs());;
}