<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Test extends Controller
{
    public function index()
    {
        $routes = service('routes');
        
        echo "<h1>Registered Routes:</h1>";
        echo "<pre>";
        foreach ($routes->getRoutes() as $route => $handler) {
            echo $route . " -> " . (is_string($handler) ? $handler : 'Closure') . "\n";
        }
        echo "</pre>";
    }
}