<?php

namespace Ductv44\PhpOop\Controllers\Admin;

use Ductv44\PhpOop\Commons\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $this->renderViewAdmin(__FUNCTION__);
    }
}
