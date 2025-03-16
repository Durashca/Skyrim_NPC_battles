
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skyrim</title>
    <style>
        @import url('css/index.css');
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        html,body{
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background: #f2f2f2;
            /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
        }
        ::selection{
            background: #4158d0;
            color: #fff;
        }
        .wrapper{
            width: 380px;
            /*background: #fff;*/
            border-radius: 15px;
            box-shadow: 10px 15px 20px 1px;
            position: fixed;
            bottom: 8%;

        }
        .wrapper .title{
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            line-height: 80px;
            color: #fff;
            user-select: none;
            border-radius: 15px 15px 0 0;
            background: transparent;
        }
        .wrapper form{
            padding: 5px 25px 45px 25px;
        }
        .wrapper form .field{
            height: 50px;
            width: 100%;
            margin-top: 20px;
            position: relative;
        }
        .wrapper form .field input{
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding-left: 20px;
            border: 1px solid lightgrey;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .wrapper form .field input:focus,
        form .field input:valid{
            border-color: #4158d0;
        }
        .wrapper form .field label{
            position: absolute;
            top: 50%;
            left: 20px;
            color: #999999;
            font-weight: 400;
            font-size: 17px;
            pointer-events: none;
            transform: translateY(-50%);
            transition: all 0.3s ease;
        }
        form .field input:focus ~ label,
        form .field input:valid ~ label{
            top: -17%;;
            font-size: 16px;
            color: white;
            background: transparent;
            transform: translateY(-50%);
        }
        form .content{
            display: flex;
            width: 100%;
            height: 50px;
            font-size: 16px;
            align-items: center;
            justify-content: space-around;
        }
        form .content .checkbox{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        form .content input{
            width: 15px;
            height: 15px;
            background: red;
        }
        form .content label{
            color: #262626;
            user-select: none;
            padding-left: 5px;
        }

        form .field input[type="submit"]{
            color: #fff;
            border: none;
            padding-left: 0;
            margin-top: -10px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            background: linear-gradient(-135deg, #c850c0, #4158d0);
            transition: all 0.3s ease;
        }
        form .field input[type="submit"]:active{
            transform: scale(0.95);
        }
        form .signup-link{
            color: #262626;
            margin-top: 20px;
            text-align: center;
        }
        form .pass-link a,
        form .signup-link a{
            color: #4158d0;
            text-decoration: none;
        }
        form .pass-link a:hover,
        form .signup-link a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body style="margin: 0">
<img style="width: 100%" src="image/background/background_index.jpg" alt="skyrim">
<div class="wrapper">
    <div class="title">
        Login Form
    </div>
    <form action="registration.php" method="post">
        <div class="field">
            <input id="name" name="name" type="text" required>
            <label for="name">Name</label>
        </div>

<!--        <div class="content">-->
<!--            <div class="checkbox">-->
<!--                <input type="checkbox" id="remember-me">-->
<!--                <label for="remember-me">Remember me</label>-->
<!--            </div>-->
<!--            <div class="pass-link">-->
<!--                <a href="#">Forgot password?</a>-->
<!--            </div>-->
<!--        </div>-->
        <div class="field">
            <input type="submit" value="Login">
        </div>
<!--        <div class="signup-link">-->
<!--            Not a member? <a href="menu.php">Signup now</a>-->
<!--        </div>-->
    </form>
<!--    <a href="menu.php">menu</a>-->
</div>
</body>
</html>
