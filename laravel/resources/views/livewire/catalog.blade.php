<div>
    @foreach($products as $product)

       <p> {{$product->title}}</p>

    @endforeach
    {{$products->links()}}
</div>
