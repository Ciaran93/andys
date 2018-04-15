

<div id="fh5co-menus" data-section="menu">
    <div class="container">
        <div class="row text-center fh5co-heading row-padded">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="heading to-animate">Food Menu</h2>
                <p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>

<div class="w3-bar w3-black">
    @foreach( $sections as $section)
        <button class="w3-bar-item w3-button" onclick="openMenu('{{ $section->name }}')">{{ $section->name }}</button>
    @endforeach
</div>

<div class="row row-padded">
    @foreach( $sections as $section )
        <div style="display:none" id="{{ $section->name }}" class="Menu">
            <div class="col-md-6">
                <div class="fh5co-food-menu to-animate-2">
                    <h2 class="">{{ $section->name }}</h2>
                    <ul>
                    @foreach( $items as $item)
                        @if($item->section_id === $section->id )
                            <li>
                                <div class="fh5co-food-desc">
                                    <div>
                                        <h3>{{ $item->name}}</h3>
                                        <p>{{ $item->description }}</p>
                                    </div>
                                </div>
                                <div class="fh5co-food-pricing">
                                    &euro;{{ $item->price}}                               
                                </div>
                            </li>
                        @endif
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center to-animate-2">
                <p><a href="#" class="btn btn-primary btn-outline">More Food Menu</a></p>
            </div>
        </div>
    </div>
</div>