







<script>
    function openMenu(menuName) {
    var i;
    var x = document.getElementsByClassName("Menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(menuName).style.display = "block"; 
}
</script>

<div id="fh5co-menus" data-section="menu">
    <div class="container">
        <div class="row text-center fh5co-heading row-padded">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="heading to-animate">Food Menu</h2>
                <p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
<div class="w3-bar w3-black">
  <button class="w3-bar-item w3-button" onclick="openMenu('Starters')">Starters</button>
  <button class="w3-bar-item w3-button" onclick="openMenu('Mains')">Mains</button>
  <button class="w3-bar-item w3-button" onclick="openMenu('Desserts')">Desserts</button>
  <button class="w3-bar-item w3-button" onclick="openMenu('SetMenu')">Set Menu</button>
</div>



    <div class="row row-padded">
        <div style="display:none" id="Starters" class="Menu">
            <div class="col-md-6">
                <div class="fh5co-food-menu to-animate-2">
                    <h2 class="fh5co-drinks">Starters</h2>
                    <ul>
                    @foreach( $items as $item)
                        @if($item->section_id === 1 )
                            <li>
                                <div class="fh5co-food-desc">
                                    <!--<figure>
                                        <img src="images/res_img_3.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">
                                    </figure>-->
                                    <div>
                                        <h3>{{ $item->name}}</h3>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                <div class="fh5co-food-pricing">
                                    £{{ $item->price}}                               
                                </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--MAINS START-->
        <div style="display:none" id="Mains" class="Menu">
            <div class="col-md-6">
                <div  class="fh5co-food-menu to-animate-2">
                    <h2 class="fh5co-dishes">Steak</h2>
                    <ul>
                    @foreach( $items as $item)
                        @if($item->section_id === 2 )
                            <li>
                                <div class="fh5co-food-desc">
                                    <!--<figure>
                                        <img src="images/res_img_3.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">
                                    </figure>-->
                                    <div>
                                        <h3>{{ $item->name}}</h3>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                <div class="fh5co-food-pricing">
                                    £{{ $item->price}}                               
                                </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div  class="fh5co-food-menu to-animate-2">
                    <h2 class="fh5co-drinks">Poultry</h2>
                    <ul>
                       @foreach( $items as $item)
                        @if($item->section_id === 3 )
                            <li>
                                <div class="fh5co-food-desc">
                                    <!--<figure>
                                        <img src="images/res_img_3.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">
                                    </figure>-->
                                    <div>
                                        <h3>{{ $item->name}}</h3>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                <div class="fh5co-food-pricing">
                                    £{{ $item->price}}                               
                                </div>
                            </li>
                        @endif
                    @endforeach 
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div  class="fh5co-food-menu to-animate-2">
                    <h2 class="fh5co-dishes">Sides</h2>
                    <ul>
                    @foreach( $items as $item)
                        @if($item->section_id === 5 )
                            <li>
                                <div class="fh5co-food-desc">
                                    <!--<figure>
                                        <img src="images/res_img_3.jpg" class="img-responsive" alt="Free HTML5 Templates by FREEHTML5.co">
                                    </figure>-->
                                    <div>
                                        <h3>{{ $item->name}}</h3>
                                        <!--<p>{{ $item->description }}</p>-->
                                    </div>
                                </div>
                                <div class="fh5co-food-pricing">
                                    £{{ $item->price}}                               
                                </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center to-animate-2">
                <p><a href="#" class="btn btn-primary btn-outline">More Food Menu</a></p>
            </div>
        </div>
    </div>
</div>