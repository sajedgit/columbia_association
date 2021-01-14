<div>
    <p>Hi Mr/Mrs {{ $data["name"] }},<br/> Your membership have been created successfully. You are now registered
        {{ $data["ess_type"] }} member. You can now <a href="{{ url('login') }}">login </a> from BAPA website with below credentials.
        Just make sure your membership subscription is updated or not</p>

    <p>Login From: <a href="{{ url('login') }}"> {{ url('login') }} </a></p>
    <p>User: {{ $data["email"] }}</p>
    <p>Password: {{ $data["password"] }}</p>


    <p><B>PLEASE MUST CHANGE THE PASSWORD</B> from <a href="{{ url('profile') }}">Update Profile</a> panel after login  </p>


    <p>If you have facing any problem to login please contact with <b>nypdbapa@gmail.com</b>  </p>


</div>

