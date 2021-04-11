<div>

    @if($msg)
        <p>Hi Mr/Mrs {{ $user_name }},<br/> {{ $msg }}   </p>
    @else
        <p>Hi Mr/Mrs {{ $user_name }},<br/>
            Your Membership payment have been successfully done.
        </p>
    @endif




    <p>Total Amount: {{ $net_amounts }}</p>
    <p>Subscription Start Date: {{ $start_date }}</p>
    <p>Subscription Renewal Date: {{ $renew_date }}</p>
    <p>Source: {{ $source }}</p>
    <p>Payment Type: {{ $payment_type }}</p>
    <p>Order Details:  <?php echo $details; ?></p>

</div>

