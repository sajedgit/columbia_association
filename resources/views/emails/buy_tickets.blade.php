<div>
    <p>Hi Mr/Mrs {{ $user_name }},<br/> Your purchase have been successfully done.</p>
     @if($order_id)
     <p>Your order id is : {{ $order_id }}</p>
     @endif
    <p>Payment Type: {{ $payment_type }}</p>
    <p>Order Details:  <?php echo $details; ?></p>
    <p>Total {{ $action }}: {{ $total_tickets }}</p>
    <p>Total Amount: {{ $net_amounts }}</p>

</div>

