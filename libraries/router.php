<?php
/**
 * Created by PhpStorm.
 * User: Vytas
 * Date: 2018-09-16
 * Time: 1:50 PM
 */

class Map extends BaseObject{
    public static $path = null;


    public static function get($route, $path) {
        self::$path = $path;
        Sammy::process($route, 'GET');
    }

    public static function post($route, $path) {
        self::$path = $path;
        Sammy::process($route, 'POST');
    }

    public static function put($route, $path) {
        self::$path = $path;
        Sammy::process($route, 'PUT');
    }

    public static function delete($route, $path) {
        self::$path = $path;
        Sammy::process($route, 'DELETE');
    }

    public static function ajax($route, $path) {
        self::$path = $path;
        Sammy::process($route, 'XMLHttpRequest');
    }

    public static function dispach($format){

        //kai randama matching route
        $path = explode('#',self::$path);
        $controller = $path[0];
        $action = $path[1];

        $class_name = ucfirst($controller) . 'Controller';

        //include app controlleri
        self::load_controller('app');

        //include matching route controlleri
        self::load_controller($controller);

        if(class_exists($class_name)){
            $tmp_class = new $class_name();

            //paleidzia actiona
            if(is_callable(array($tmp_class, $action)) ) {
                $tmp_class->$action();
            }else
                die('the action <strong>' . $action . '</strong> could not be called from the controller <strong>' . $class_name . '</strong>');
        }else
            die('the class <strong>'. $class_name . '</strong> could not be found in <pre>' . APP_PATH .'/controllers/' . $controller . '</pre>');

        //includinti viewsa
        //self::load_view($controller , $action, $format);

        //loadinti layouta
        $layout_path = self::get_layout($controller, $action, $format);

        if(!empty($layout_path) ){
            $layout = file_get_contents($layout_path);

            //pakeisti {PAGE_CONTENT} i viewsa
            $view_path = self::view_path($controller, $action, $format);
            if (!empty($view_path))
                $layout = str_replace('{PAGE_CONTENT}', file_get_contents($view_path), $layout);

            $filename = BASE_PATH. '/temp/' . time() . '.php';

            $file = fopen($filename,'a');
            fwrite($file, $layout);
            fclose($file);

            self::load_layout($filename);

            unlink($filename);
        }
    }

    public static function load_controller($name){
        //paloadina controlleri pagal patha

        $controller_path = APP_PATH .'/controllers/' . $name . '_controller.php';
        if( file_exists($controller_path))
            include_once $controller_path;
        else
            die ('the file <strong>' . $name . '_controller.php</strong> could not be found at <pre>' . $controller_path . '</pre>');
    }

    public static function load_view($controller, $action, $format){
        //paloadina viewsa pagal patha

        $view_path = self::view_path();
        if( !empty($view_path))
            unset($controller, $action, $format);

            foreach( self::$user_vars as $var => $value){
                $$var = $value;
            }

            include_once $view_path;

    }

    public static function get_layout($controller, $action, $format){


        //controller-action.format.php
        $controller_action_path = APP_PATH . '/views/layouts/' . $controller . '-' . $action . '.' . $format .'.php';

        //controller.format.php
        $controller_path = APP_PATH . '/views/layouts/' . $controller . '.' . $format .'.php';

        //application.format.php
        $application_path = APP_PATH . '/views/layouts/application.' . $format .'.php';

        $path_to_use = null;

        //rasti patha kuri naudosime
        if(file_exists ($controller_action_path))
            $path_to_use = $controller_action_path;

        elseif(file_exists($controller_path))
            $path_to_use = $controller_path;

        elseif(file_exists($application_path))
            $path_to_use = $application_path;

        return $path_to_use;
    }

    public static function view_path($controller, $action, $format){
        $view_path = APP_PATH .'/views/' . $controller . '/' . $action . '.' . $format . '.php';
        $path = null;

        if(file_exists($view_path))
            $path = $view_path;

        return $path;
    }

    public static function load_layout($filename){
        foreach( self::$user_vars as $var => $value){
            $$var = $value;
        }

        include $filename;
    }


}