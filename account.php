<!DOCTYPE html>
<html>
    <?php
        session_set_cookie_params(0);
        session_start();
        require_once './vendor/autoload.php';
        require_once 'sqlinfo.php';
        $loader = new Twig_Loader_Filesystem('./templates');
        $twig = new Twig_Environment($loader);

        $connInfo = getSqlinfo();
        $conn = new mysqli($connInfo->servername, $connInfo->username, $connInfo->password, $connInfo->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $id = $_SESSION['id'];
        $sql = "CALL customer('$id')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $aNum = $row['cID'];
            $fName = $row['fName'];
            $lName = $row['lName'];
            $fid = $row['fleetID'];
            $user = $row['username'];
            $img = $row['img'];
          }
        };

        clearConnection($conn);
        //TODO
        $sql = "CALL billme('$id')";
        $result = $conn->query($sql);

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

        $template = $twig->load('account.html');
        echo $template->render(array('name' => $fName,
                                      'img' => $img,
                                      'aNum' => $aNum,
                                      'fid' => $fid,
                                      'lname' => $lName,
                                      'user' => $user,
                                      'bills' => $result

      ));


        $template = $twig->load('thisFooter.html');
        echo $template->render(array('cpNotice' => 'Galaxy Express Co.',
                                'cpDate' => 'Copyright 2369'));

        ?>
        </html>
