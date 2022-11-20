@php
$ProductCategory = DB::select("SELECT ProductCategoryId, Name
                  FROM productcategory
                  WHERE Status != 'Delete'");
@endphp
<!-- Close Icon -->
<div id="sideMenuClose">
    <i class="ti-close"></i>
</div>
<!--  Side Nav  -->
<div class="nav-side-menu">
    <div class="menu-list">


            <h6>Categories</h6>
            <ul id="menu-content" class="menu-content collapse out">
                @foreach($ProductCategory as $ProductCategory)
                <li data-toggle="collapse" class="collapsed" data-target="#{{$ProductCategory->ProductCategoryId}}">
                    <a href="#">{{$ProductCategory->Name}}</a>
                    <ul class="sub-menu collapse" id="{{$ProductCategory->ProductCategoryId}}">
                        @php
                            $ProductSubCategory = DB::select("SELECT ProductSubCategoryId, Name
                                    FROM productsubcategory
                                    WHERE Status != 'Delete'
                                    and Category_Id= '$ProductCategory->ProductCategoryId'");
                        @endphp
                        @foreach($ProductSubCategory as $ProductSubCategory)
                            <li><a href="#" onclick="productViewByFilter('','{{$ProductSubCategory->ProductSubCategoryId}}')">{{$ProductSubCategory->Name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
                {{-- <li data-toggle="collapse" data-target="#women" class="collapsed active">
                    <a href="#">Woman wear <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="women">
                        <li><a href="#">Midi Dresses</a></li>
                        <li><a href="#">Maxi Dresses</a></li>
                        <li><a href="#">Prom Dresses</a></li>
                        <li><a href="#">Little Black Dresses</a></li>
                        <li><a href="#">Mini Dresses</a></li>
                    </ul>
                </li>
                <li data-toggle="collapse" data-target="#man" class="collapsed">
                    <a href="#">Man Wear <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="man">
                        <li><a href="#">Man Dresses</a></li>
                        <li><a href="#">Man Black Dresses</a></li>
                        <li><a href="#">Man Mini Dresses</a></li>
                    </ul>
                </li>
                <li data-toggle="collapse" data-target="#kids" class="collapsed">
                    <a href="#">Children <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="kids">
                        <li><a href="#">Children Dresses</a></li>
                        <li><a href="#">Mini Dresses</a></li>
                    </ul>
                </li>
                <li data-toggle="collapse" data-target="#bags" class="collapsed">
                    <a href="#">Bags &amp; Purses <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="bags">
                        <li><a href="#">Bags</a></li>
                        <li><a href="#">Purses</a></li>
                    </ul>
                </li>
                <li data-toggle="collapse" data-target="#eyewear" class="collapsed">
                    <a href="#">Eyewear <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="eyewear">
                        <li><a href="#">Eyewear Style 1</a></li>
                        <li><a href="#">Eyewear Style 2</a></li>
                        <li><a href="#">Eyewear Style 3</a></li>
                    </ul>
                </li>
                <li data-toggle="collapse" data-target="#footwear" class="collapsed">
                    <a href="#">Footwear <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="footwear">
                        <li><a href="#">Footwear 1</a></li>
                        <li><a href="#">Footwear 2</a></li>
                        <li><a href="#">Footwear 3</a></li>
                    </ul>
                </li> --}}
            </ul>

            <div class="widget price mb-50">
                <h6 class="widget-title mb-30">Filter by Price</h6>
                <div class="widget-desc">
                    <div class="slider-range">
                        <div data-min="0" data-max="3000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="1350" data-label-result="Price:">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">Price: 0 - 1350</div>
                    </div>
                </div>
            </div>

            <div class="widget color mb-70">
                <h6 class="widget-title mb-30">Filter by Color</h6>
                <div class="widget-desc">
                    <ul class="d-flex justify-content-between">
                        <li class="gray"><a href="#"><span>(3)</span></a></li>
                        <li class="red"><a href="#"><span>(25)</span></a></li>
                        <li class="yellow"><a href="#"><span>(112)</span></a></li>
                        <li class="green"><a href="#"><span>(72)</span></a></li>
                        <li class="teal"><a href="#"><span>(9)</span></a></li>
                        <li class="cyan"><a href="#"><span>(29)</span></a></li>
                    </ul>
                </div>
            </div>

            <div class="widget size mb-50">
            <h6 class="widget-title mb-30">Filter by Size</h6>
                <div class="widget-desc">
                    <ul class="d-flex justify-content-between">
                        <li><a href="#">XS</a></li>
                        <li><a href="#">S</a></li>
                        <li><a href="#">M</a></li>
                        <li><a href="#">L</a></li>
                        <li><a href="#">XL</a></li>
                        <li><a href="#">XXL</a></li>
                    </ul>
                </div>
            </div>


    </div>
</div>