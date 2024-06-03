<?php
require_once __DIR__."/../utils/autoload.php";

class RenderView {
    public function loadView($view, $args) {
        extract($args);
        ob_clean();
        require_once __DIR__ ."/../views/$view.php";
    }
}