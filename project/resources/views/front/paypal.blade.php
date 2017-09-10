
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="currency_code" value="THB">
<input type="hidden" name="business" value="Tkncreated@hotmail.com">
<?php $count = 0;?>
@foreach($cartitems as $cartitem)
<?php $count++; ?>
<input type="hidden" name="item_name_{{$count}}" value="{{$cartitem->name}}">
<input type="hidden" name="item_number_{{$count}}" value="{{$cartitem->options->pro_code}}">
<input type="hidden" name="quantity_{{$count}}" value="{{$cartitem->qty}}">
<input type="hidden" name="amount_{{$count}}" value="{{$cartitem->price}}">
@endforeach

<input type="image" name="submit" formaction="https://www.paypal.com/cgi-bin/webscr"
src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/gold-rect-paypal-60px.png" alt="PayPal Checkout">
<img alt="" width="1" height="1"src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
