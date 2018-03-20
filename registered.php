<!DOCTYPE html>
<html>
    <?php
        session_set_cookie_params(0);
        session_start();
        require_once './vendor/autoload.php';
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

        $template = $twig->load('congrats.html');
        echo $template->render();


        $template = $twig->load('thisFooter.html');
        echo $template->render(array('cpNotice' => 'Galaxy Express Co.',
                                'cpDate' => 'Copyright 2369'));

        ?>
        </html>
