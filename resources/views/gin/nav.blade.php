<div class="js-sticky">
    <div class="fh5co-main-nav">
        <div class="container-fluid">
            <div class="fh5co-menu-1">
                <a href="/">Home</a>

                    @if($showSection->show_about)
                        <a href="#" data-nav-section="about">About</a>
                    @endif

                     @if($showSection->show_menu)
                        <a href="#" data-nav-section="menu">Menu</a>
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
               
               @if($showSection->show_gift)
                    <a href="#" data-nav-section="gift">Gift Voucher</a>
                @endif

                @if($showSection->show_reservation)
                    <a href="#" data-nav-section="reservation">Reservation</a>
                @endif

            </div>
        </div>
        
    </div>
</div>