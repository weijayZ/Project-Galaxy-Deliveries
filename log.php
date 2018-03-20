<!DOCTYPE html>
<html>
    <?php
        session_set_cookie_params(0);
        session_start();
        require_once 'sqlinfo.php';
        require_once './vendor/autoload.php';
        $loader = new Twig_Loader_Filesystem('./templates');
        $twig = new Twig_Environment($loader);
        //error_reporting(0);
        $connInfo = getSqlinfo();
        $conn = new mysqli($connInfo->servername, $connInfo->username, $connInfo->password, $connInfo->dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        if (isset($_POST['username']) and isset($_POST['password'])){

              $username = $_POST['username'];
              $password = $_POST['password'];

              $sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";

              $result = $conn->query($sql);
              $count = mysqli_num_rows($result);
              while($row = $result->fetch_assoc()) {
                  $_SESSION['id'] = $row['cID'];
                  $_SESSION['cart'] = array();
                  $_SESSION['iCount'] = 0;
              }

              if ($count == 1){

                }else{
                echo "<h2>Invalid Login Credentials.</h2>";
                }
              }

              if (isset($_SESSION['id'])){
                if($_SESSION['id'][0] == 'C'){
                 header( "Location: account.php" );
                } else {
                  header( "Location: account.php" );
                }
            }else{

            };

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

        $template = $twig->load('log.html');
        echo $template->render();

        $template = $twig->load('thisFooter.html');
        echo $template->render(array('cpNotice' => 'Galaxy Express Co.',
                                'cpDate' => 'Copyright 2369'));

        ?>
        </html>
