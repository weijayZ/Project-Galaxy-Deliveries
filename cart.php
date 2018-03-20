<!DOCTYPE html>
<html>
    <?php

        require_once './vendor/autoload.php';
        require_once 'sqlinfo.php';
        session_set_cookie_params(0);
        session_start();
        error_reporting(0);

        $connInfo = getSqlinfo();
        $conn = new mysqli($connInfo->servername, $connInfo->username, $connInfo->password, $connInfo->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $t = 1;
        if (empty($_SESSION['cart'])) {
            $msg = 'Cart is Empty';
            $t = 0;
        }

        $sum = 0;
        foreach ($_SESSION['cart'] as &$value) {
            $sum += $value[4];
        }


        $loader = new Twig_Loader_Filesystem('./templates');
        $twig = new Twig_Environment($loader);

        $template = $twig->load('lessStuff.html');
        echo $template->render(array('hFont' => 'DS9',
                                'cardColor' => 'black',
                                'cardFont' => 'black',
                                'hColor' => 'black',
                                'fSize' => '7rem',
                                'bgColor' => 'Grey',
                                'themeFont' => 'DS9'

        ));

        $template = $twig->load('thisHeader.html');
        echo $template->render(array('title' => 'Galaxy Deliveries'));

        if (isset($_SESSION['id'])){
              $navbar = array(array('Account','account.php'),
                                                          array('About Us', 'aboutUs.php'),
                                                          array('Order', 'order.php'),
                                                          array('Support', 'support.php'),
                                                          array('Log Out', 'logout.php'));
        }else{
                $navbar = array(array('Home','index.php'),
                                                            array('About Us', 'aboutUs.php'),
                                                            array('Products', 'products.php'),
                                                            array('Support', 'support.php'),
                                                            array('Log On', 'log.php'));
        };

        $template = $twig->load('thisMenu.html');
          echo $template->render(array('menu' => $navbar
        ));

        $template = $twig->load('cart.html');
        echo $template->render(array('menu' =>array(array('All','order.php'),
                                                    array('Appetitizers', 'order.php?vType=Appetitizers'),
                                                    array('Soups', 'order.php?vType=Soups'),
                                                    array('Carbs', 'order.php?vType=Carbs'),
                                                    array('Entrees', 'order.php?vType=Entrees'),
                                                    array('Sides', 'order.php?vType=Sides'),
                                                    array('Beverages', 'order.php?vType=Beverages')),
                                'name' => 'Cart',
                                'cart' => $_SESSION['cart'],
                                'emp' => $msg,
                                'sum' => $sum

        ));


        $template = $twig->load('thisFooter.html');
        echo $template->render(array('cpNotice' => 'Galaxy Express Co.',
                                'cpDate' => 'Copyright 2369'));

        ?>
        </html>
