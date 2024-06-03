<?php 

namespace Ductv44\PhpOop\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    public function renderViewClient($view, $data = []) {
        $templatePath = __DIR__ . '/../Views/Client';
        $compiledPath = __DIR__ . '/../Views/Compiles';

        $blade = new BladeOne($templatePath, $compiledPath);

        echo $blade->run($view, $data);
    }

    public function renderViewAdmin($view, $data = []) {
        $templatePath = __DIR__ . '/../Views/Admin';
        $compiledPath = __DIR__ . '/../Views/Compiles';

        $blade = new BladeOne($templatePath, $compiledPath);

        echo $blade->run($view, $data);
    }
}