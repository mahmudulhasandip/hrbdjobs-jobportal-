 
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Welcome to the site {{$user['fname']}} {{$user['lname']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('candidate/email/verify', $user->verifyCandidate->token)}}">Verify Email</a>
</body>
 
</html>