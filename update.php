<?php
include("config.php");
if(isset($_GET['id'])){
    $update=$_GET['id'];
    echo$update;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <title>GASAA Pharmacy - Edit User</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: grid;
            height: 100%;
            width: 100%;
            place-items: center;
            background: url(https://t4.ftcdn.net/jpg/05/77/84/27/360_F_577842756_DWiS65lNLDG5DPaozrJk3c9TgkGGBwCb.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
        }

        ::selection {
            background: #4158d0;
            color: #fff;
        }

        .card {
            width: 380px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
        }

        .card .title {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            line-height: 55px;
            color: #fff;
            user-select: none;
            border-radius: 15px 15px 0 0;
            background: linear-gradient(-135deg, #d34646, #417fd0);
        }

        .card .logo {
            max-width: 100%;
            height: 255px;
            display: block;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        .card form {
            padding: 0 30px 50px 30px;
        }

        .card form .field {
            height: 50px;
            width: 100%;
            margin-top: 20px;
            position: relative;
        }

        .card form .field input {
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 17px;
            padding-left: 20px;
            border: 1px solid lightgrey;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .card form .field input:focus,
        form .field input:valid {
            border-color: #4158d0;
        }

        .card form .field label {
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
        form .field input:valid ~ label {
            top: 0%;
            font-size: 16px;
            color: #4158d0;
            background: #fff;
            transform: translateY(-50%);
        }

        form .content {
            display: flex;
            width: 100%;
            height: 50px;
            font-size: 16px;
            align-items: center;
            justify-content: space-around;
        }

        form .content .checkbox {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form .content input {
            width: 15px;
            height: 15px;
            background: red;
        }

        form .content label {
            color: #262626;
            user-select: none;
            padding-left: 5px;
        }

        form .content .pass-link {
            color: "";
        }

        form .field input[type="submit"] {
            color: #fff;
            border: none;
            padding-left: 0;
            margin-top: -10px;
            font-size: 20px;
            font-weight: 500;
            cursor: pointer;
            background: linear-gradient(-135deg, #d34646, #417fd0);
            transition: all 0.3s ease;
        }

        form .field input[type="submit"]:active {
            transform: scale(0.95);
        }

        form .signup-link {
            color: #262626;
            margin-top: 20px;
            text-align: center;
        }

        form .pass-link a,
        form .signup-link a {
            color: #4158d0;
            text-decoration: none;
        }

        form .pass-link a:hover,
        form .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'gassa_db');
    $query = "select * from user_form where id=$update";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>
    <br>
    <br>
    <br>
    <br>
    <div class="card">
        <div class="title">Edit User</div>
        <img src="./images/LOGOwithname.jpg" alt="GASAA Logo" class="logo">
        <form action="updatedb.php?id=<?php echo $_GET['id']; ?>" method="POST">

            <div class="field">
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
                <label>Name</label>
            </div>

            <div class="field">
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                <label>Email</label>
            </div>

            <input type="hidden" name="password" value="<?php echo $row['password']; ?>" required>

            <div class="field">
                <input type="text" readonly name="user_type" value="<?php echo $row['user_type']; ?>" required>
            </div>

            <div class="field">
                <input type="submit" class="registerbtn" value="Submit" name="submit">
            </div>
        </form>
    </div>
</body>

</html>
