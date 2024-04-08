<!DOCTYPE html>
<html>
<head>
  <title>GASAA Pharmacy - Staff Panel</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/styleadmin.css"></link>
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
</head>

<body>

    <?php
        include "./staffheader.php";
        include_once "./config/dbconnect.php";
    ?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6 mb-4">
                <div class="card text-center">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Orders Through Cart</h4>
                    <h5 style="color:white;">
                        <a href="directorders.php" class="btn btn-warning btn-lg" style="background-color: yellow;
                        border: none;
                        color: black;
                        font-weight: bold;
                        padding: 4px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 20px;
                        margin: 4px 2px;
                        cursor: pointer;
                        border-radius: 5px;
                        transition: background-color 0.3s ease;
                        " onmouseover="this.style.backgroundColor='white'" onmouseout="this.style.backgroundColor='yellow'">View Direct Orders</a>
                    </h5>
                </div>
            </div>

            <div class="col-sm-6 mb-4">
                <div class="card text-center">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:white;">Orders Through Prescription</h4>
                    <h5 style="color:white;">
                        <a href="prescription_orders.php" class="btn btn-warning btn-lg" style="background-color: yellow;
                        border: none;
                        color: black;
                        font-weight: bold;
                        padding: 4px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 20px;
                        margin: 4px 2px;
                        cursor: pointer;
                        border-radius: 5px;
                        transition: background-color 0.3s ease;
                        " onmouseover="this.style.backgroundColor='white'" onmouseout="this.style.backgroundColor='yellow'">View Prescription Orders</a>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
