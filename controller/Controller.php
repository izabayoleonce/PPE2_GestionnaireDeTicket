<?php
namespace controller;

// echo '</br>';
// var_dump($_SERVER);

abstract class Controller
{
    protected $twig;
    protected $pathView = 'view';
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader('view');
        $this->twig = new \Twig\Environment($loader, [
            'debug' => true
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
        
        if( isset( $_GET['action'] ) && method_exists($this, $_REQUEST['action'] . 'Action') ) {
            $action = $_GET['action'] . 'Action';
            $this->$action();
        } else {
            $this->defaultAction();
        }
    }

    /**
     * Action par défaut du contrôleur
     */
    abstract public function defaultAction();


    protected function render($view, $data=[])
    {
        // extract( $data );

        $fileName =  $view . 'View.twig';
        $filePath = $this->pathView . '/' . $fileName;
        // echo $filePath;
        // die;
        if( file_exists( $filePath ) ) {
            echo $this->twig->render( $fileName, $data );
            // require_once $fileName;
        } else {
            exit( "View file not exist !" );
        }
    }
}