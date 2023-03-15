<div class="barcode">
@foreach ($data as $product)

<div class="barcode">
    <label for="">Producto: {{$product->name}}</label>    
    <p>Price: {{$product->price}}</p>
    {!! DNS1D::getBarcodeHTML($product->nircode, "C128",1.4,20,'green') !!}
    <p></p>  
    <p></p>
    {!! DNS2D::getBarcodeHTML($product->nircode, "QRCODE",2,2) !!}
    <p>{{$product->nircode}}</p>
</div>

    @endforeach
</div>