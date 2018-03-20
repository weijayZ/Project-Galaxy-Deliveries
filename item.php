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


        $fid = $_GET['id'];

        $sql = "CALL item('$fid')";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $name = $row['pName'];
                $type = $row['pType'];
                $category = $row['pCategory'];
                $cal = $row['pCalories']; 
                $price = $row['pPrice'];
                $img = $row['img'];
            }
        };

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
            $cart = '<a href="cart.php">Cart</a>';
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
          echo $template->render(array('menu' => $navbar,
                                        'cart' => $cart
        ));

        $template = $twig->load('item.html');
        echo $template->render(array('menu' =>array(array('All','products.php'),
                                                    array('Appetitizers', 'products.php?vType=Appetitizers'),
                                                    array('Soups', 'products.php?vType=Soups'),
                                                    array('Carbs', 'products.php?vType=Carbs'),
                                                    array('Entrees', 'products.php?vType=Entrees'),
                                                    array('Sides', 'products.php?vType=Sides'),
                                                    array('Beverages', 'products.php?vType=Beverages')),
                                'name' => $name,
                                'cal' => $cal,
                                'type' => $type,
                                'price' => $price,
                                'category' => $category,
                                'img' => $img,

        ));


        $template = $twig->load('thisFooter.html');
        echo $template->render(array('cpNotice' => 'Galaxy Express Co.',
                                'cpDate' => 'Copyright 2369'));

        ?>
        </html>
