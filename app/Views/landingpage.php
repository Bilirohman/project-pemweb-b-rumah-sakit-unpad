<?php
// Include any PHP logic or variables here, if needed.
$title = "Rumah Sakit UNPAD";
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="shortcut icon" href="<?= base_url('assets/logo/Lambang_Universitas_Padjadjaran.svg.png') ?>">
        <link rel="stylesheet" href="<?= base_url('style/landingpage.css') ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    </head>
    <body>
        
        <!-- Hero Section -->
        <section id="hero">
    
            <!-- Navigation -->
            <nav class="navigation">
                <input type="checkbox" class="menu-btn" id="menu-btn">
                <label for="menu-btn" class="menu-icon">
                    <span class="nav-icon"></span>
                </label>

                <a href="/" class="logo"><span>RS</span>UNPAD</a>

                <ul class="menu">
                    <li><a href="#our-team">Find A Doctor</a></li>
                    <li><a href="#our-services">Our Services</a></li>
                </ul>

                <a href="#" class="nav-appointment-btn">Appointment</a>
            </nav><!--nav-end-->
    
            <!-- Content -->
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Sahabat Keluarga Sehat dan Cerdas</h1>
                    <p>Jln. Ir. Soekarno km. 21 Jatinangor, Kab. Sumedang 45363 Jawa Barat.</p>
                    <div class="hero-text-btns">
                        <a href="#"><i class="fa-solid fa-magnifying-glass"></i> Find Doctor's</a>
                        <a href="/login"><i class="fa-solid fa-check"></i> Book Appointment</a>
                    </div>
                </div>

                <div class="hero-img">
                <img alt="" src="<?= base_url('assets/hero/hospital_no_background.png') ?>">
                </div>
            </div>
    
            
        </section><!--hero-end-->
    
        <!-- Appointment Search Section-->
        <div class="appointment-search-container">
            <h3>Find Best HealthCare</h3>
            <form class="appointment-search">

            <div class="appo-search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search Doctor Here">
            </div>

            <button>
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            </form>
        </div>
    
    
        <!-- Short Services Section -->
        <section class="what-we-provide">
    
            <div class="w-info-box w-i-box1">
                <div class="w-info-icon">
                    <i class="fa-solid fa-capsules"></i>
                </div>
                <div class="w-info-text">
                    <strong>Specialised Service</strong>
                </div>
            </div>
            <div class="w-info-box w-i-box2">
                <div class="w-info-icon">
                    <i class="fa-regular fa-comments"></i>
                </div>
                <div class="w-info-text">
                    <strong>24/7 Advanced Care</strong>
                </div>
            </div>
            <div class="w-info-box w-i-box3">
                <div class="w-info-icon">
                    <i class="fa-solid fa-square-poll-horizontal"></i>
                </div>
                <div class="w-info-text">
                    <strong>Online Result</strong>
                </div>
            </div>
        
        </section><!-- Short Services end-->
    
        <!-- About Us Section -->
        <section id="our_story">
    
            <div class="our-story-img">
                <img src="assets/hero/rs-unpad-bg.jpg" />
                <a href="https://youtu.be/Nhogd0TvoiE?si=BJtOfKWjGeIx0Asc" target="_blank" class="story-play-btn">
                    <i class="fa-solid fa-play"></i>
                    Play Video
                </a>
            </div>
            <div class="our-stroy-text">
                <h2>About Our Hospital</h2>
                <p>Rumah Sakit Unpad, hadir dengan membawa manfaat baik bagi Unpad sendiri maupun bagi masyarakat luas. Bagi Unpad Rumah Sakit ini memberikan wadah bagi para tenaga kesehatan berkualitas, untuk mempraktikkan kemampuan hasil pendidikannya untuk menolong sesama.</p>
                <p>Selain itu, Rumah Sakit Unpad memungkinkan warga Unpad untuk mendapatkan layanan kesehatan profesional yang terjangkau, tidak hanya dari segi biaya namun juga lokasi. Bertempat di dalam lingkungan kampus Unpad jatinangor, warga Unpad tidak perlu melangkah terlalu jauh untuk mengakses layanan rumah sakit tersebut.</p>
                <div class="story-numbers-container">
                    <div class="story-numbers-box s-n-box1">
                        <strong>2000+</strong>
                        <span>Happy Patients</span>
                    </div>
                    <div class="story-numbers-box s-n-box2">
                        <strong>115+</strong>
                        <span>Expert Doctor</span>
                    </div>
                    <div class="story-numbers-box s-n-box3">
                        <strong>200+</strong>
                        <span>Hospital Room's</span>
                    </div>
                    <div class="story-numbers-box s-n-box4">
                        <strong>15+</strong>
                        <span>Award Wining</span>
                    </div>
                </div>
            </div>
            
        </section><!--About us end-->
    
        <!-- Services Section -->
        <section id="our-services">
    
            <div class="services-heading">
                <div class="services-heading-text">
                    <strong>Our Services</strong>
                    <h2>High Quality Services For You</h2>
                </div>
                <div class="service-slide-btns">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
    
            <div class="services-box-container">
    
                <div class="swiper mySwiperservices">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                        <div class="service-box s-box1">
                            <i class="fa-solid fa-tooth"></i>
                            <strong>Dental Care</strong>
                            <p>Layanan kesehatan gigi dan mulut yang mencakup pemeriksaan rutin, pembersihan gigi, penambalan, pencabutan, perawatan saluran akar, hingga prosedur estetika seperti pemutihan gigi dan pemasangan veneer. Tim profesional kami siap menjaga senyum sehat dan percaya diri Anda.</p>
                            <a href="#">Read More</a>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="service-box s-box2">
                            <i class="fa-solid fa-eye"></i>
                            <strong>Eye Care</strong>
                            <p>Layanan perawatan mata yang mencakup pemeriksaan rutin, pengobatan penyakit mata seperti katarak dan glaukoma, konsultasi refraksi untuk kacamata atau lensa kontak, serta prosedur bedah mata yang canggih guna mendukung kesehatan penglihatan Anda.</p>
                            <a href="#">Read More</a>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="service-box s-box3">
                            <i class="fa-solid fa-face-smile"></i>
                            <strong>Skin Care</strong>
                            <p>Layanan dermatologi profesional untuk mengatasi berbagai masalah kulit seperti jerawat, penuaan dini, alergi, atau kondisi kulit kronis. Disediakan juga perawatan estetika seperti pengelupasan kulit (peeling), terapi laser, dan konsultasi perawatan kulit untuk menjaga kecantikan dan kesehatan kulit Anda.</p>
                            <a href="#">Read More</a>
                        </div>
                        </div>
                        <div class="swiper-slide">
                        <div class="service-box s-box4">
                            <i class="fa-solid fa-user-doctor"></i>
                            <strong>Surgical</strong>
                            <p>Pelayanan bedah modern yang dilakukan oleh tim ahli bedah berpengalaman. Meliputi prosedur bedah umum, bedah minimal invasif, hingga operasi spesialisasi dengan dukungan teknologi terkini untuk memastikan keamanan dan pemulihan optimal bagi pasien.</p>
                            <a href="#">Read More</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <span class="service-btn">Contact Us For Need Any Help And Services <a href="#">Let's get Started</a></span>
        
        </section><!--services-end-->
    
        <!-- Contact Section -->
        <section id="why-choose-us">
    
            <div class="why-choose-us-left">
                <h3>Why Choose Us?</h3>
                <div class="why-choose-box-container">
                    <div class="why-choose-box">
                        <i class="fa-solid fa-check"></i>
                        <div class="why-choose-box-text">
                            <strong>Advance Care</strong>
                            <p>Layanan perawatan kesehatan tingkat lanjut dengan teknologi</p>
                        </div>
                    </div>
                    <div class="why-choose-box">
                        <i class="fa-solid fa-check"></i>
                        <div class="why-choose-box-text">
                            <strong>Online Medicine</strong>
                            <p>Fasilitas pembelian obat secara online yang aman dan praktis</p>
                        </div>
                    </div>
                    <div class="why-choose-box">
                        <i class="fa-solid fa-check"></i>
                        <div class="why-choose-box-text">
                            <strong>Medical & Surgical</strong>
                            <p>Pelayanan medis dan bedah terpadu</p>
                        </div>
                    </div>
                    <div class="why-choose-box">
                        <i class="fa-solid fa-check"></i>
                        <div class="why-choose-box-text">
                            <strong>Lab Test's</strong>
                            <p>Layanan pemeriksaan laboratorium yang lengkap dan akurat.</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="why-choose-us-btn">Make Appointment</a>
            </div>
    
            <div class="why-choose-us-right">
                <h3>Emergency?<br/>
                    Contact Us
                </h3>
                <p>Pelayanan darurat yang tersedia 24/7 untuk menangani kasus medis mendesak dengan cepat dan efisien. Tim kami siap memberikan pertolongan pertama kapan saja dibutuhkan.</p>
                <div class="w-right-contact-container">
                    <div class="w-right-contact-box">
                        <i class="fa-solid fa-phone"></i>
                        <div class="w-right-contact-box-text">
                            <span>Call Us Now</span>
                            <strong>+62 858 1234 4321</strong>
                        </div>
                    </div>
                    <div class="w-right-contact-box">
                        <i class="fa-solid fa-envelope"></i>
                        <div class="w-right-contact-box-text">
                            <span>Mail Us</span>
                            <strong>rs@unpad.ac.id</strong>
                        </div>
                    </div>
                </div>
            </div>
    
        </section><!--Contact end-->
    
        <!-- Our Team Section -->
        <section id="our-team">
    
            <div class="our-team-heading">
                <h3>Meet Our Specialist</h3>
                <p>Kenali tim spesialis kami yang berpengalaman di berbagai bidang medis</p>
            </div>
    
            <div class="team-box-container">
                <div class="swiper mySwiperteam">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="team-box">
                            <div class="team-img">
                                <img alt="" src="assets/doctor/18_gunawan.jpg">
                            </div>
                            <div class="team-text">
                                <strong>Gunawan Sabili Rohman</strong>
                                <span>Skin Care Specialist</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box">
                            <div class="team-img">
                                <img alt="" src="assets/doctor/84_bim.jpg">
                            </div>
                            <div class="team-text">
                                <strong>Bim Yusuf Karang</strong>
                                <span>Psychiatrist</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box">
                            <div class="team-img">
                                <img alt="" src="assets/doctor/34_adzari.jpg">
                            </div>
                            <div class="team-text">
                                <strong>Achmad Dzaki Azhar</strong>
                                <span>Pulmonologist</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box">
                            <div class="team-img">
                                <img alt="" src="assets/doctor/Dr.-Yudi-Mulyana-Hidayat-dr.-SpOGK.jpg">
                            </div>
                            <div class="team-text">
                                <strong>Prof Dr. Yudi Mulyana Hidayat, dr., SpOG(K)-Onk, DMAS.</strong>
                                <span>Dekan Fakultas Kedokteran</span>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="team-box">
                            <div class="team-img">
                                <img alt="" src="assets/doctor/Irvan-Afriandi-dr.MPH_.Dr_.-PH.jpg">
                            </div>
                            <div class="team-text">
                                <strong>Irvan Afriandi, dr., MPH., Dr. PH.</strong>
                                <span>Wakil Dekan Bidang Sumber Daya dan Organisasi.</span>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    
        </section><!--team section-end-->
    
        <!-- Subscribe Section -->
        <section id="subscribe">
            <h3>Subscribe For New Updates From WeCare</h3>
            <form class="subscribe-box">
                <input type="email" placeholder="Example@gmail.com">
                <button>Subscribe</button>
            </form>
        </section><!--Subscribe end-->
    
    
        <!-- Footer -->
        <footer>
            <div class="footer-container">
                <div class="footer-company-box">
                    <a href="#" class="logo"><span>RS</span>UNPAD</a>
                    <p>Jln. Ir. Soekarno km. 21 Jatinangor, Kab. Sumedang 45363 Jawa Barat.</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/unpad" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/rsunpad" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://x.com/rsunpad" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.youtube.com/@unpad" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-link-box">
                    <strong>Main Link's</strong>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#our_story">About</a></li>
                        <li><a href="#our-services">Services</a></li>
                        <li><a href="#why-choose-us">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-link-box">
                    <strong>External Link's</strong>
                    <ul>
                        <li><a href="#">Our Product's</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                        <li><a href="#">Trem's and Condition's</a></li>
                    </ul>
                </div>
    
            </div>
    
            <div class="footer-bottom">
                <span class="footer-owner">Made By Padjadjaran University</span>
                <span class="copyright">&#169; Copyright 2024 -  Padjadjaran University</span>
            </div>
        </footer> <!--Footer End-->
    
        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    
        <!-- Initialize Swiper -->
        <script src="<?= base_url('js/swiper.js') ?>"></script>
    </body>
</html>
       