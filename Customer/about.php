<?php
session_start();
error_reporting(0);
include('../includes/dbConnection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>AIUB Wedding Planner</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body id="home">
    <?php include_once('includes/header.php'); ?>



    <section class="about" id="about">
        <h1 class="heading"> <span>about</span> us</h1>
        <div class="row">
            <div class="content">
                <h3>Our Planners are Most Experience.</h3>
                <p>Welcome to AIUB Wedding Planner, Your Trusted Wedding Planning Team in Bangladesh!
                    At AIUB Wedding Planner, we understand that your wedding day is one of the most important moments of
                    your life. It's a celebration of love, unity, and the beginning of a beautiful journey together. Our
                    team of passionate wedding planners is here to ensure that your special day is nothing short of
                    perfection.</p>
                <h3> Our Story:</h3>
                <p> Founded in 2017, AIUB Wedding Planner was born out of a shared love for weddings and a desire to
                    help
                    couples turn their dreams into reality. With years of experience in the wedding industry and a deep
                    understanding of Bangladeshi culture and traditions, we have curated a team of talented
                    professionals
                    who are dedicated to making your wedding planning journey seamless and unforgettable..</p>
                <h3>What Sets Us Apart:</h3>
                <p>At AIUB Wedding Planner], we believe in the power of personalization. We know that every couple is
                    unique, and we strive to create weddings that reflect your individual style, personality, and love
                    story. From intimate ceremonies to grand celebrations, we tailor our services to suit your needs and
                    exceed your expectations..</p>
                <h3>Our Approach:</h3>
                <p> From the moment you choose AIUB Wedding Planner as your wedding planners, you become part of our
                    family. We work closely with you every step of the way, offering guidance, support, and creative
                    solutions to bring your vision to life. Whether you're dreaming of a traditional Bangladeshi wedding
                    or a modern fusion affair, we have the expertise and resources to make it happen.</p>


                <h3>Meet Our Team:</h3>
                <p>Behind every successful wedding is a dedicated team of professionals. Our talented planners,
                    designers, coordinators, and vendors are passionate about what they do, and they are committed to
                    delivering excellence in every aspect of your wedding day</p>
                <h3>Let's Create Magic Together:</h3>
                <p> At AIUB Wedding Planner, we believe that love is in the details. From the initial consultation to
                    the final farewell, we handle every aspect of your wedding with care, creativity, and attention to
                    detail. Our goal is simple: to make your wedding day as magical and memorable as you've always
                    imagined..</p>

                <p> Thank you for considering AIUB Wedding Planner for your wedding planning needs. We can't wait to
                    embark on this beautiful journey with you!</p>

            </div>
            <div class="image">
                <img src="../assets/Images/aboutUs.jpg" alt="">
            </div>
        </div>
    </section>

    <?php include_once('includes/footer.php'); ?>

</body>

</html>