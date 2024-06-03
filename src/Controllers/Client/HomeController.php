<?php

namespace Ductv44\PhpOop\Controllers\Client;

use Ductv44\PhpOop\Commons\Controller;
class HomeController extends Controller
{
    public function index() {
        $name = 'DucTV44';

        $this->renderViewClient('home', [
            'name' => $name
        ]);
    }
}