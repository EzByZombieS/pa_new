<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            table {
                width: 700px;
            }
            table, th, td {
                border: solid 1px #DDD;
                border-collapse: collapse;
                padding: 2px 3px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="tab">
            <table> 
                <tr>
                    <th class="pro-thumbnail">No</th>
                    <th class="pro-thumbnail">Image</th>
                    <th class="pro-title">Product</th>
                    <th class="pro-price">Price</th>
                    <th class="pro-quantity">Quantity</th>
                    <th class="pro-subtotal">Total</th>
                </tr>
                @foreach($show as $key => $item)
                <tr>
                    <td class="pro-price">{{$key+1}}</td>
                    <td class="pro-thumbnail"><img class="img-fluid" src="{{asset($item->image)}}" alt="Product" /></td>
                    <td class="pro-title">{{$item->name_product}}</td>
                    <td class="pro-price"><span>Rp. {{number_format($item->price_product)}}</span></td>
                    <td class="pro-price"><span>{{$item->qty}}</span></td>
                    <td class="pro-subtotal"><span>Rp. {{number_format($item->price_product * $item->qty)}}</span></td>
                </tr>
                @endforeach
                
            </table>
        </div>
    </body>
</html>