<form class="header" action="?page=board" method="POST">
        <div class="uppHeader">
            <?php
                if(!isset($_SESSION['id']))
                {
                    $url = "http://$_SERVER[HTTP_HOST]/";
                    header("Location: {$url}?page=sessionTimedOut");
                }
            ?>
            <button class="style2" type="submit" name="submit" value="cart">
                <i class="fas fa-shopping-cart"></i> Cart(0)</button>
            <div class="dropdown_user">
                <div  class="dropbtnUser">
                <i class="far fa-user"></i> <?=$_SESSION['id']?></div>
                <div class="dropdown-content-user">
                    <button type="submit" name="submit" value="logout"><i class="fas fa-sign-out-alt"></i> Log Out</button>
                    <button type="submit" name="submit" value="settings"><i class="fas fa-user-cog"></i> Settings</button>
                    <?php
                        if($_SESSION['id'] == 'admin')
                        {
                            ?><button type="submit" name="submit" value="database">Admin Panel</button><?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="line1"></div>
        <div class="underHeader">
            <button class="logo" type="submit" name="submit" value="main">
                <img src="../Public/img/logo.svg">
            </button>
            <div class="menu">
                <b class="fas fa-bars fa-2x" onclick="openNav()"></b>
            </div>
            <div class="options">
                <div class="dropdown">
                    <button class="dropbtn" type="submit" name="submit" value="products">PRODUCTS</button>
                    <div class="dropdown-content">
                        <button type="submit" name="submit" value="error">POPULAR</button>
                        <button type="submit" name="submit" value="error">3D FILES</button>
                        <button type="submit" name="submit" value="error">3D MODELS</button>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn" type="submit" name="submit" value="error">3D DESIGN</button>
                    <div class="dropdown-content">
                        <button type="submit" name="submit" value="error">READY TO DOWNLOAD</button>
                        <button type="submit" name="submit" value="error">ORDER 3D DESIGN</button>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn" type="submit" name="submit" value="error">ORDER PRINT</button>
                    <div class="dropdown-content">
                        <button type="submit" name="submit" value="error">ORDER STANDARD</button>
                        <button type="submit" name="submit" value="error">ORDER PREMIUM</button>
                        <button type="submit" name="submit" value="error">ORDER BY CONTACT FORM</button>
                    </div>
                </div>
            </div>
            <div class="search">
                <input name="search" type="text" placeholder="Search...">
                <button type="submit" name="submit" value="search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

    </form>