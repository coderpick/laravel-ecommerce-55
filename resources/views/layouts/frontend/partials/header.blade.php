<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
                            <li><i class="ti-email"></i> <a href="https://wpthemesgrid.com/cdn-cgi/l/email-protection"
                                    class="__cf_email__"
                                    data-cfemail="582b2d2828372a2c182b303728302d3a763b3735">[email&#160;protected]</a>
                            </li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-location-pin"></i> Store location</li>
                            <li><i class="ti-alarm-clock"></i> <a href="index.html#">Daily deal</a></li>
                            @guest
                                <li><i class="ti-power-off"></i><a href="{{ route('login') }}">Login</a></li>
                            @else
                                <li><i class="ti-user"></i> <a href="index.html#">My account</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            @endguest


                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/frontend/images/logo.png') }}"
                                alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="index.html#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option selected="selected">All Category</option>
                                <option>watch</option>
                                <option>mobile</option>
                                <option>kid’s item</option>
                            </select>
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        <div class="sinlge-bar">
                            <a href="index.html#" class="single-icon"><i class="fa fa-heart-o"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar">
                            <a href="index.html#" class="single-icon"><i class="fa fa-user-circle-o"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="index.html#" class="single-icon"><i class="ti-bag"></i> <span
                                    class="total-count">2</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Items</span>
                                    <a href="index.html#">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    <li>
                                        <a href="index.html#" class="remove" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="index.html#"><img src="images/product-1.jpg"
                                                alt="#"></a>
                                        <h4><a href="index.html#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                    </li>
                                    <li>
                                        <a href="index.html#" class="remove" title="Remove this item"><i
                                                class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="index.html#"><img src="images/product-2.jpg"
                                                alt="#"></a>
                                        <h4><a href="index.html#">Woman Necklace</a></h4>
                                        <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <a href="checkout.html" class="btn animate">Checkout</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">
                        {{-- <div class="all-category">
                            <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                            <ul class="main-category">
                                <li><a href="index.html#">New Arrivals <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                    <ul class="sub-category">
                                        <li><a href="index.html#">accessories</a></li>
                                        <li><a href="index.html#">best selling</a></li>
                                        <li><a href="index.html#">top 100 offer</a></li>
                                        <li><a href="index.html#">sunglass</a></li>
                                        <li><a href="index.html#">watch</a></li>
                                        <li><a href="index.html#">man’s product</a></li>
                                        <li><a href="index.html#">ladies</a></li>
                                        <li><a href="index.html#">westrn dress</a></li>
                                        <li><a href="index.html#">denim </a></li>
                                    </ul>
                                </li>
                                <li class="main-mega"><a href="index.html#">best selling <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                    <ul class="mega-menu">
                                        <li class="single-menu">
                                            <a href="index.html#" class="title-link">Shop Kid's</a>
                                            <div class="image">
                                                <img src="images/mega-menu1.jpg" alt="#">
                                            </div>
                                            <div class="inner-link">
                                                <a href="index.html#">Kids Toys</a>
                                                <a href="index.html#">Kids Travel Car</a>
                                                <a href="index.html#">Kids Color Shape</a>
                                                <a href="index.html#">Kids Tent</a>
                                            </div>
                                        </li>
                                        <li class="single-menu">
                                            <a href="index.html#" class="title-link">Shop Men's</a>
                                            <div class="image">
                                                <img src="images/mega-menu2.jpg" alt="#">
                                            </div>
                                            <div class="inner-link">
                                                <a href="index.html#">Watch</a>
                                                <a href="index.html#">T-shirt</a>
                                                <a href="index.html#">Hoodies</a>
                                                <a href="index.html#">Formal Pant</a>
                                            </div>
                                        </li>
                                        <li class="single-menu">
                                            <a href="index.html#" class="title-link">Shop Women's</a>
                                            <div class="image">
                                                <img src="images/mega-menu3.jpg" alt="#">
                                            </div>
                                            <div class="inner-link">
                                                <a href="index.html#">Ladies Shirt</a>
                                                <a href="index.html#">Ladies Frog</a>
                                                <a href="index.html#">Ladies Sun Glass</a>
                                                <a href="index.html#">Ladies Watch</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="index.html#">accessories</a></li>
                                <li><a href="index.html#">top 100 offer</a></li>
                                <li><a href="index.html#">sunglass</a></li>
                                <li><a href="index.html#">watch</a></li>
                                <li><a href="index.html#">man’s product</a></li>
                                <li><a href="index.html#">ladies</a></li>
                                <li><a href="index.html#">westrn dress</a></li>
                                <li><a href="index.html#">denim </a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="index.html#">Home<i
                                                        class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="index.html">Home Ecommerce V1</a></li>
                                                    <li><a href="index2.html">Home Ecommerce V2</a></li>
                                                    <li><a href="index3.html">Home Ecommerce V3</a></li>
                                                    <li><a href="index4.html">Home Ecommerce V4</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="index.html#">Product</a></li>
                                            <li><a href="index.html#">Service</a></li>
                                            <li><a href="index.html#">Shop<i class="ti-angle-down"></i><span
                                                        class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                                    <li><a href="shop-list.html">Shop List</a></li>
                                                    <li><a href="shop-single.html">shop Single</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="index.html#">Pages<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="mail-success.html">Mail Success</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="index.html#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                                                    <li><a href="blog-single.html">Blog Single</a></li>
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
