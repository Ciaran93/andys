
<div class="js-sticky">
    <div class="fh5co-main-nav">
        <div class="container-fluid">
            <div class="fh5co-menu-1">
                <a href="#" data-nav-section="home">Home</a>

                    @if($showSection->show_about)
                        <a href="#" data-nav-section="about">About</a>
                    @endif

                    @if($showSection->show_featured)
                        <a href="#" data-nav-section="features">Featured</a>
                    @endif

            </div>

            <div class="fh5co-logo">
                <!-- <a href="index.html">Andys</a> -->
                <img src="images/andys_logo_400_x_300.png" style="padding-top: 10px;" width="35%">
            </div>

            <div class="fh5co-menu-2">

                @if($showSection->show_menu)
                    <a href="#" data-nav-section="menu">Menu</a>
                @endif

                @if($showSection->show_gifts)
                    <a href="#" data-toggle="modal" data-target="#myModal">Gifts</a>
                @endif

                @if($showSection->show_reservation)
                    <a href="#" data-nav-section="reservation">Reservation</a>
                @endif

            </div>
        </div>
        
    </div>
</div>

<div id="fh5co-container">
<div id="fh5co-home" class="js-fullheight" data-section="home">

    <div class="flexslider">
        
        <div class="fh5co-overlay"></div>
        <div class="fh5co-text">
            <div class="container">
                <div class="row">
                    <!--<h1 class="to-animate">Andys</h1>
                    <h2 class="to-animate">Bar and Restaurant</a></h2>-->
                    <img class="img-responsive center-block to-animate" src="images/Logo.png" alt="">
                        
                        
                        <ul  class="fh5co-social to-animate">
                            <li class=""><a href="#"><i class="icon-facebook"></i></a></li>
                            <li class=""><a href="#"><i class="icon-twitter"></i></a></li>
                            <li class=""><a href="#"><i class="icon-instagram"></i></a></li>
					    </ul>
                </div>
            </div>
        </div>
        <ul class="slides">
        <li  style="background-image: url('images/andysbar-min.jpg');" data-stellar-background-ratio="1"></li>
        <li style="background-image: url('images/andys5-min.jpg');" data-stellar-background-ratio="0.5"></li>
        <!--<li style="background-image: url(images/slide_2.jpg);" data-stellar-background-ratio="0.5"></li>-->
        <!--<li style="background-image: url(images/slide_3.jpg);" data-stellar-background-ratio="0.5"></li>-->
        </ul>

    </div>
    
</div>




