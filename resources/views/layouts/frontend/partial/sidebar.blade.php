<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            {{-- //============= Select All Category =========== // --}}
            @php
            $categories = DB::table('categories')->where('status',true)->get();
            @endphp

            

           @foreach($categories as $category)
           @php
            $count = DB::table('products')
                    ->where('status',true)
                    ->where('category_id',$category->id)
                    ->count();
            @endphp
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="{{ route('category.product',$category->slug) }}"><span class="pull-right">({{ $count }})</span>{{ $category->category_name }}</a></h4>
                </div>
            </div>
            @endforeach

        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    @php
                    $manufactures = DB::table('manufactures')->where('status',true)->take(7)->get();

                    @endphp
                    @foreach($manufactures as $manufacture)
                    @php
                    $count = DB::table('products')
                            ->where('status',true)
                            ->where('manufacture_id',$manufacture->id)
                            ->count();
                    @endphp
                    <li><a href="{{ route('manufacture.product',$manufacture->slug) }}"><span class="pull-right">({{ $count }})</span>{{ $manufacture->manufacture_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
               <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
               <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
           </div>
       </div><!--/price-range-->

       <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->

</div>
</div>