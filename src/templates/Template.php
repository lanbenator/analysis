<?php
/**
 * Created by PhpStorm.
 * User: 212465052
 * Date: 8/24/2016
 * Time: 9:12 AM
 */

namespace analysis\templates;

use analysis\utils\AnalysisUtils;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Twig_SimpleFunction;

class Template
{
    private static $defaultTemplateDir = "templates/";

    private static $loader;

    private static $templateFolders;

    private static $twigEnv;

    private function __construct($templateFolders=array()){
//        self::$templateFolders = array(self::$defaultTemplateDir);
        self::$templateFolders = array();
        self::$templateFolders = array_merge(self::$templateFolders, $templateFolders);
        $this->init();
    }

    public static function getTwig($templateFolders=array()){
        if ( is_null( self::$twigEnv ) ) {
            new self($templateFolders);
        } elseif(!empty($templateFolders)) {
            new self($templateFolders);
        }
        return self::$twigEnv;
    }

    private function countDbContent(){
        return new Twig_SimpleFunction('countDbContent', function($exprtable, $clintable, $filterDb){
            AnalysisUtils::countDBContent($exprtable, $clintable, "$filterDb AND premium=1", "private");
        });
    }

    private function init()
    {
        self::$loader = new Twig_Loader_Filesystem(self::$templateFolders);
        self::$twigEnv = new Twig_Environment(self::$loader);

        self::$twigEnv->addFunction($this->countDbContent());
    }
}