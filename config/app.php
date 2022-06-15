<?php 
class App {

    protected $controller = '';
    protected $action = '';
    protected $param = '';
    

     /**
     * Class constructor.
     */
    public function __construct()
    {
       $arr = $this->urlProcess();
       $param = isset($arr[1]) ? $arr[1] : '';

       if( $arr[0] == 'home' || $arr == 'home')
       {
            
           require_once  ROOTPATH .'/controller/home.php';
       }
       else if (file_exists( ROOTPATH .'/controller/' . $arr[0].'.php'))
       {

           require_once ROOTPATH .'/controller/' . $arr[0].'.php';
       }
       else
       die('404');

       $param ='';
    }

    public function urlProcess(){
        if (isset($_GET['url']) || !empty($_GET['url']) )
        {
            return explode('/' , filter_var(trim($_GET['url'])));
        }
        else
        {
            return 'home';
        }
    }
}
?>