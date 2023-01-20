<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    @if($errors->any())
    <div class="alert alert-danger">
        {{$errors->first()}}
    </div>
    @endif
    <div class="main">
    <div class="loginBox">
        <img class="user" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeJ2yzh3wtFCtTKmKevj-HctKubaVAJo3Rkw&usqp=CAU" height="100px" width="100px">
        <h3>Login</h3><small>Please Sign in to Login</small>
        <form action="{{route('admin.login')}}" method="post">
            @csrf
            <div class="inputBox">
                <h4>Signageid</h4> 
                <input id="uname" type="email" name="email" placeholder="Enter your signageid">
                <h4>Password</h4>
                <input id="pass" type="password" name="password" placeholder="Enter your Password">
                <i class="bi bi-lock"></i>
            </div>
                <input type="submit" name="login" value="Login">
        </form>
      </div>
    </div>
<style>
body{
    background: #9256c4;
}
body{
    margin: 0;padding: 0;
    background:#9256c4;
    font-family:sans-serif;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    overflow: hidden
    }
@media screen and (max-width: 600px;)
{body{background-size: cover;: fixed}}
#particles-js{height: 100%}
.loginBox{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 330px;
    min-height: 350px;
    background: white;
    border-radius: 8px;
    padding: 40px;
    box-sizing: border-box
    }
.user{
    margin: 0 auto;
    border-radius: 60px;
    display: block;
    margin-bottom: 15px;
    }
h3{
    margin: 0;
    padding: 0 0 15px;
    color: black;
    font-size: 28px;
    text-align: center
    }
small{
    margin-left: 60px;;
    padding: 0 0 10px;
    color:gray;
    }
h4{
    margin-bottom: 5px;
    padding: 0 0 0 10px;
    color:black;
    font-size: 15px;
    text-align:left;
    }
.loginBox input{width: 100%;margin-bottom: 20px}
.loginBox input[type="email"],
.loginBox input[type="password"]{
    border: none;
    border-bottom: 2px solid #262626;
    outline: none;
    height: 40px;
    background: transparent;
    font-size: 16px;
    padding-left: 20px;
    box-sizing: border-box;
    }
.loginBox input[type="email"]:hover,
.loginBox input[type="password"]:hover{
    color: black;
} 
.loginBox input[type="email"]:focus,
.loginBox input[type="password"]:focus{
    border-bottom: 1px solid black;
    }
.inputBox{
    position: relative
    }
.inputBox span{
    position: absolute;
    top: 10px;
    color: #262626
    }
.loginBox input[type="submit"]{
    margin-top: 25px;
    border: none;
    outline: none;
    height: 40px;
    font-size: 16px;
    background: #59238F;
    color: #fff;
    cursor: pointer
    }
.loginBox a{
    color: #262626;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    text-align: center;
    display: block
    }
a:hover{
    color: #00ffff
    }
p{
    color: #0000ff
    }
</style>
</body>
</html>