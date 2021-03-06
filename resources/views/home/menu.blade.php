
<div id="fh5co-menus" data-section="menu">
    <div class="container">
        <div class="row text-center fh5co-heading row-padded">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="heading to-animate">Food Menu</h2>
                <!-- <p class="sub-heading to-animate">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
            </div>
        </div>

<div class="col-md-12 text-center">
    @foreach( $sections as $section)
        <button class="snip1582" id="btn_{{ $section->name }}" onclick="openMenu('{{ $section->name }}')">{{ $section->name }}</button>
    @endforeach
</div>

<div class="row row-padded">
    @foreach( $sections as $section )
        <div style="display:none" id="{{ $section->name }}" class="Menu">
        <h2 class="">{{ $section->name }}</h2>

            @foreach($categories as $category)
                @if($category->menu_section_id == $section->id)
                <div class="col-md-6">
                    <div class="fh5co-food-menu to-animate-2">
                    <h2 class="">

                        @if($category->name != 'NONE')
                            {{ $category->name }}
                            
                        @endif    
                        </h2>
                    
                        <ul>
                        @foreach( $items as $item)
                            @if($item->section_id === $section->id && $category->id == $item->menu_category_id)
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
                @endif
                
                @endforeach
                
        </div>
    @endforeach
    </div>
    </div>
</div>