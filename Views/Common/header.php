<form class="header" id="navbar" action="?page=board" method="POST">
        <div class="uppHeader">
            <?php
                if(!isset($_SESSION['id']))
                {
                    $url = "http://$_SERVER[HTTP_HOST]/";
                    header("Location: {$url}?page=sessionTimedOut");
                }
            ?>
            <button class="style2" type="submit" name="submit" value="cart">
                <i class="fas fa-shopping-cart"></i> Cart(<?=$_SESSION['total_quantity']?>)</button>
                <button class="style3" type="submit" name="submit" value="orders-panel">
                <i class="fas fa-sort-amount-down"></i> ORDERS</Button>
            <div class="dropdown_user">
                <div  class="dropbtnUser">
                <i class="far fa-user"></i> <?=$_SESSION['id']?></div>
                <div class="dropdown-content-user">
                    <button type="submit" name="submit" value="logout"><i class="fas fa-sign-out-alt"></i> Log Out</button>
                    <button type="submit" name="submit" value="settings"><i class="fas fa-user-cog"></i> Settings</button>
                    <?php
                        if($_SESSION['role'] == 1)
                        {
                            ?><button type="submit" name="submit" value="admin-panel">Admin Panel</button><?php
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
                        <button type="submit" name="submit" value="popular">POPULAR</button>
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
                        <?php if($_SESSION['role'] == 3){ ?>
                        <button type="submit" name="submit" value="order">ORDER STANDARD</button>
                        <?php
                        }?>
                        <button type="submit" name="submit" value="order-premium">ORDER PREMIUM</button>
                        <button type="submit" name="submit" value="contactForm">ORDER BY CONTACT FORM</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="search">
                <input name="xD" type="none" placeholder="Search...">
                <button type="none" name="xD" value="search">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>

    