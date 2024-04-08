<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:loginpage.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <link rel="stylesheet" href="topicalmedicines.php">
    <link rel="stylesheet" href="devices.php">
    <link rel="stylesheet" href="tablets.php">
    <link rel="stylesheet" href="injections.php">
    <link rel="stylesheet" href="loginpage.php">
    <link rel="stylesheet" href="learnmore.html">
    <title>GASAA Pharmacy</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;1,300;1,400;1,500;1,700;1,900&display=swap');

      body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #a9130c;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .qa-panel {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 300px;
        }

        .close-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    
    <!-- Header Section -->
    <header>

        <a href="#" class="logo"><i class="fas-fa-untensils"></i>GASAA Pharmacy</a>

        <nav class="navbar">
            <a class="active" href="#home">Home</a>
            <a href="#offers">Offers</a>
            <a href="#about">About Us</a>
            <a href="#category">Category</a>
            <a href="#review">Review</a>
            <a href="#contact">Contact Us</a>
        </nav>
         
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <!-- <a href="#" class="fas fa-heart"></a> -->
            <a href="viewcart.php" class="fas fa-shopping-cart"></a>
            <a href="user_page.php" class="fas fa-user"></a>
        </div>

    </header>

    <!-- Search Section -->
    <form action="#" id="search-form">
    <input type="search" placeholder="Search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

  


    <!-- GASAA Chatbot -->
        <div class="floating-button" onclick="redirectToChatbot()">
            Q&A
        </div>

        <div class="qa-panel" id="qaPanel">
            <div class="close-button" onclick="toggleQAPanel()">Close</div>
        </div>
    <script>
    function toggleQAPanel() {
    const qaPanel = document.getElementById('qaPanel');
    qaPanel.style.display = qaPanel.style.display === 'none' ? 'block' : 'none';
    }
    function redirectToChatbot() {
        window.location.href = 'chatbot.html';
    }
    </script>


    <!-- Home Section -->
    <section class="home" id="home">
        <div class="swiper home-slider">

            <div class="swiper-wrapper wrapper">

                <div class="swiper-slide slide">

                    <div class="content">
                        <span> Our special offers on</span>
                        <h3>Lab Test</h3>
                        <p>Diagnostic lab tests analyze samples to assess health and detect medical conditions.</p>
                        <a href="viewcart.php" class="btn">Continue</a>
                    </div>
                    <div class="image">
                        <img src="./images/labtest.jpg" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span> Our special offers on</span>
                        <h3>HealthCare Products</h3>
                        <p>Innovative healthcare products enhance well-being, offering solutions for improved health and comfort.</p>
                        <a href="viewcart.php" class="btn">Order Now</a>
                    </div>
                    <div class="image">
                        <img src="./images/HEalthcare.jpeg" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span> Our special offers on</span>
                        <h3>Selected Medicines</h3>
                        <p>Pharmaceuticals alleviate ailments, promoting health and well-being through targeted treatments and medications.</p>
                        <a href="viewcart.php" class="btn">Order Now</a>
                    </div>
                    <div class="image">
                        <img src="./images/Medicine.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!-- Offers Section -->
    <section class="offers" id="offers">
        <h3 class="sub-heading">Our Special</h3>
        <h1 class="heading">Offers</h1>

        <div class="box-container" id="item-container">

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/asprin.jpg" alt="">
                <h3>Asprin <br> <h4>(20 Tablet Bottle)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>1500 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/detol.jpg" alt="">
                <h3>Detol <br><h4>(Buy 4 get 2 free)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>340 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/nasalspary.jpg" alt="">
                <h3>Nasal Spray <br><h4>(Buy 1 get 1 free)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>990 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/panadol.jpg" alt="">
                <h3>Panadol <br> <h4>(Buy 2 and Get 1 free)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>425 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/iodex.jpg" alt="">
                <h3>Iodex <br><h4>(Price reduced in 10%)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>100 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/dipers.jpeg" alt="">
                <h3>Fems <br> <h4>(Buy 3 get 1 free)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>420 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/ktape.jpg" alt="">
                <h3>Kinesiology Tape <br> <h4>(Price reduced in 15%)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>1250 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>

            <div class="box">
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
                <img src="./images/wheelchair.jpg" alt="">
                <h3>wheelchair <br> <h4>(Priced reduced in 25%)</h4></h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <span>19990 LKR</span>
                <!-- <a href="#" class="btn">Add to Cart</a> -->
            </div>
            
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">

        <h3 class="sub-heading"> About Us</h3>
        <h1 class="heading">Why Choose Us?</h1>
        
        <div class="row">
            <div class="image">
                <img src="./images/LOGOwithname1.jpg" alt="">
            </div>   

            <div class="content">
                <h3>Best Medicine supplier in the country</h3>
                <p>GASAA stands as the nation's premier pharmacy, delivering unparalleled healthcare solutions. With a commitment to excellence, we offer a vast range of quality medications, expert guidance, and personalized service. </p>
                <p>Our state-of-the-art facilities prioritize patient well-being, ensuring accessibility, affordability, and the highest standards of pharmaceutical care for a healthier tomorrow.</p>
                    <div class="icons-container">
                        <div class="icons">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Free Delivery</span>
                        </div>

                        <div class="icons">
                            <i class="fas fa-dollar-sign"></i>
                            <span>Easy Payments</span>
                        </div>

                        <div class="icons">
                            <i class="fas fa-headset"></i>
                            <span>24/7 service</span>
                        </div>
                    </div>
                <a href="learnmore.html" class="btn">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section class="category" id="category">

        <h3 class="sub-heading"> Our Categories</h3>
        <h1 class="heading">Today's Speciality</h1>

        <div class="box-container" id="item-container">
            <div class="box">
                <div class="image">
                    <img src="./images/tabletanddrops.png" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Tablets And Drops</h3>
                    <p>Tablets provide convenient, solid doses, while drops offer precise liquid measures—two versatile forms for efficient medication and supplementation.</p>
                    <center><a href="tablets.php" class="btn">View Tablets & Drops</a></center>
                    
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="./images/topicalmedicines.png" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Topical Medicines</h3>
                    <p>Topical medicines are applied to the skin's surface for localized treatment, providing relief or addressing specific dermatological conditions effectively and safely.</p>
                    <center><a href="topicalmedicines.php" class="btn">View Topical Medicines</a></center>
                    
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="./images/injections.png" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Injections</h3>
                    <p>Injections administer medications or vaccines directly into the body, offering efficient and targeted delivery for therapeutic purposes, disease prevention procedures.</p>
                    <center><a href="injections.php" class="btn">View Injections</a></center>
                    
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="./images/DevicesAndEquipments.jpg" alt="">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h3>Devices and Equipments</h3>
                    <p>Dispensers, scales, autoclaves, pill counters, refrigerators; ensuring precise dosage, storage, and safety.</p>
                    <center><a href="devices.php" class="btn">View Devices & Equipments</a></center>
                    
                </div>
            </div>
        </div>

    </section>

    <!-- Review Section -->
    <section class="review" id="review">

        <h3 class="sub-heading"> Customer's Review</h3>
        <h1 class="heading">What they say</h1>

        <div class=" swiper-container review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="./images/anujaellepola.jpg" alt="">
                        <div class="user-info">
                            <h3>Anuja Ellepola</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p>"Exceptional service! Knowledgeable staff, quick prescriptions, and a wide range of products. My go-to pharmacy for friendly assistance and a seamless experience."</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="./images/ajanthadevi.jpg" alt="">
                        <div class="user-info">
                            <h3>Ajantha Devi</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>"Outstanding customer care! Courteous team, prompt service, and a well-stocked inventory. Grateful for their efficiency and professionalism. Highly recommend this pharmacy!"</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="./images/gihanpitawala.jpg" alt="">
                        <div class="user-info">
                            <h3>Gihan Pitawala</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>"Impressed with the pharmacy's efficiency. Friendly and helpful staff, timely prescriptions, and a clean environment. Trustworthy and reliable—always a positive experience."</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src="./images/shadhir.jpg" alt="">
                        <div class="user-info">
                            <h3>Mohommad Shadhir</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>"Top-notch service! Knowledgeable pharmacists, quick turnaround, and a welcoming atmosphere. This pharmacy sets the standard for excellence in customer care. Truly satisfied."</p>
                </div>

                <div class="swiper-slide slide">
                    <i class="fas fa-quote-right"></i>
                    <div class="user">
                        <img src= "./images/athiff.jpg" alt="">
                        <div class="user-info">
                            <h3>Athiff Riyaz</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                    <p>"Exceptional experience every time! Courteous and efficient staff, fast service, and a well-organized pharmacy. Grateful for their dedication to customer satisfaction. Highly recommend."</p>
                </div>

            </div>
        </div>

    </section>

    <!-- Footer Section -->
    <section class="footer" id="contact">

        <div class="box-container">

            <div class="box">
                <h3>Location</h3>
                <a href="https://maps.app.goo.gl/xzRqbgtETReVExvq5">Kandy</a>
            </div>

            <div class="box">
                <h3>Quick Links</h3>
                <a href="#home">Home</a>
                <a href="#offers">Offers</a>
                <a href="#about">About Us</a>
                <a href="#category">Categories</a>
                <a href="#review">Review</a>
            </div>

            <div class="box-simple">
                <h3>Contact Information</h3>
                <a href="#">+94 77 704 7371</a>
                <a href="#">+94 77 318 1234</a>
                <a href="https://accounts.google.com/servicelogin?hl=en-gb">gasaa.pharmacy@gmail.com</a>
            </div>

            <div class="box">
                <h3>Follow Us</h3>
                <a href="https://www.facebook.com/">Facebook</a>
                <a href="https://www.instagram.com/accounts/login/">Instagram</a>
                <a href="https://twitter.com/login">Twitter</a>
            </div>
        </div>
        <div class="credit">Copyright © by <a href="https://codexharbor.com/"><span>CodexHarbor</span></a></div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="javascripts/script.js"></script>
    <script src="javascripts/search.js"></script>

</body>
</html>