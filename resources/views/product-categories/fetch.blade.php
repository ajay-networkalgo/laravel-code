<div id="imageContainer">

    @if(count($productRelatedImage) > 0)
        @foreach($productRelatedImage as $productRelated)
            <img src="/img/product_images/related_products/{{$productRelated->images}}" alt="Image" class="img-thumbnail">
            <button class="btn btn-danger btn-sm">Remove Image</button>
        @endforeach
    @endif
</div>
