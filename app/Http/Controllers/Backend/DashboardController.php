<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
    }

    public function index(){
        $config = $this->getConfig();

        $template = 'backend.dashboard.home.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
        ));
    }

    private function getConfig(){
        $config = [
            'js' => [
                'js/plugins/flot/jquery.flot.time.js',
                'js/plugins/flot/jquery.flot.symbol.js',
                'js/plugins/flot/jquery.flot.pie.js',
                'js/plugins/flot/jquery.flot.resize.js',
                'js/plugins/flot/jquery.flot.spline.js',
                'js/plugins/flot/jquery.flot.tooltip.min.js',
                'js/plugins/flot/jquery.flot.js',
                'js/demo/sparkline-demo.js',
                'js/plugins/sparkline/jquery.sparkline.min.js',
                'js/plugins/easypiechart/jquery.easypiechart.js',
                'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'js/plugins/jquery-ui/jquery-ui.min.js',
                'js/plugins/pace/pace.min.js',
                'js/inspinia.js',
                'js/demo/peity-demo.js',
                'js/plugins/peity/jquery.peity.min.js',
            ]
        ];
        return $config;
    }
}