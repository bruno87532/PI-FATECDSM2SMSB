<?php
ob_start();
require_once __DIR__."/../utils/RenderView.php";
require_once __DIR__."/../utils/autoload.php";

class NotFoundController extends RenderView {
    public function index() {
        echo "Página não encontrada";
    }
}