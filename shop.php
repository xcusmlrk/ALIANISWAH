<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hindasy Batik</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <section id="top-header">
            <a href="#"><img src="img/logo.png" class="logo" alt=""></a>

            <div class="">
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a class="active" href="Login.php"><i class="fal fa-shopping-bag"></i></a></li>
                    <li>
                        <a href="index.php" class="fal fa-user"> Log out</a>
                    </li>
                </ul>
            </div>
        </section>

        <section id="shop-header">
            <h2>#produklokal</h2>
            <p>Pakaian berkualitas untuk orang-orang berkualitas.</p>
        </section>

        <section id="product1" class="section-p1">
            <?php
            // Class Produk
            class Product {
                public $name;
                public $price;

                public function __construct($name, $price) {
                    $this->name = $name;
                    $this->price = $price;
                }
            }       
            
            // Class Keranjang
            Class ShoppingCart {
                private $items = [];
                
                public function addToCart($product) {
                    array_push($this->items, $product);
                }
                  
                public function removeFromCart() {
                    if (!empty($this->items)) {
                        array_pop($this->items);
                    }
                }
                
                public function displayCart() {
                    if (empty($this->items)) {
                        echo '<span></span>';
                        echo '<h2>Keranjang Belanja</h2>';
                        echo 'Keranjang belanja kosong.';
                    } else {
                        $totalPrice = 0;
                        echo '<span></span>';
                        echo '<h2>Keranjang Belanja</h2>';
                        foreach ($this->items as $index => $item) {
                            echo '<p>' . $item->name . ' - Rp' . $item->price . '</p>';
                            $totalPrice += $item->price;
                        }
                        echo '<p>Total harga: Rp' . $totalPrice . '</p>';
                    }
                }
            }

            //Array
            $products = [                    
                new Product('Kemeja Motif Brajamukti', 95000),
                new Product('Kemeja Motif Harimau', 100000),
                new Product('Kemeja Motif Gajahmada', 95000),
                new Product('Kemeja Motif Pandawa', 100000),
                new Product('Tunik Kasta', 115000),
                new Product('Tunik Diamond', 115000),
                new Product('Tunik Gajahmada', 115000),
                new Product('Tunik Merakpari', 115000)
            ];

            $cart = new ShoppingCart();
  
            if (isset($_POST['add_to_cart'])) {
                $selectedProductIndex = $_POST['product_index'];
                if (isset($products[$selectedProductIndex])) {
                    $cart->addToCart($products[$selectedProductIndex]);
                }
            } elseif (isset($_POST['remove_from_cart'])) {
                $cart->removeFromCart();
            }
            
            //Display Produk
            echo '<div class="pro-container">';
            foreach ($products as $index => $product) {
                echo '<div class="pro">';
                echo '<div class="des shop">';
                echo '<h5>' . $product->name . '</h5>';
                echo '<h4>' . $product->price . '</h4>';
                echo '</div>';
                echo '<form method="post">';
                echo '<input type="hidden" name="product_index" value="' . $index . '">';
                echo '<button type="submit" name="add_to_cart"><a href="cart.php"></a><i class="fal fa-shopping-cart cart" name="add-to-cart"></i>';
                echo '</form>';
                echo '</div>';
            }
            echo '</div>';

            // Display Cart            
            $cart->displayCart(); 
            ?>
            <form method="post">
                <input type="submit" name="remove_from_cart" value="Hapus dari Keranjang">
            </form>
        </section>

        <section id="footer">
            <div class="footer">
                Copyright &copy; 2023 - All Rights Reserved - Hindasy
            </div> 
        </section>

        <script src="script.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    </body>
</html>