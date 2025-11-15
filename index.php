<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$emailreg=$_POST['emailreg'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE (email=? || regNo=?) and password=? ");
				$stmt->bind_param('sss',$emailreg,$emailreg,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id']=$id;
				$_SESSION['login']=$emailreg;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
             $uid=$_SESSION['id'];
             $uemail=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
$mysqli->query($log);
if($log)
{
header("location:dashboard.php");
				}
}
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>

<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Sharada Boys Hostel - Student Portal">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Sharda Boys Hostel</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; padding-top: 72px; }
        .hero-overlay { position: absolute; inset: 0; background: linear-gradient(90deg, rgba(0,0,0,.55) 0%, rgba(0,0,0,.2) 100%); }
        .hero-caption { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #fff; text-align: center; width: 100%; max-width: 900px; padding: 0 1rem; }
        .hero-caption h1 { font-weight: 800; text-shadow: 0 6px 20px rgba(0,0,0,.25); }
        .btn-cta { padding: .75rem 1.25rem; border-radius: .75rem; font-weight: 600; }
        .section-login { margin-top: -3rem; position: relative; z-index: 5; }
        .login-card { border: none; border-radius: 1rem; box-shadow: 0 .75rem 2rem rgba(0,0,0,.15); overflow: hidden; }
        .login-visual { background: linear-gradient(135deg, #4e73df, #1cc88a); color: #fff; display:flex; align-items:center; justify-content:center; padding: 2rem; }
        .login-visual img { max-width: 180px; border-radius: .75rem; box-shadow: 0 .5rem 1.5rem rgba(0,0,0,.25); }
        .form-control { padding: .9rem 1rem; border-radius: .75rem; border:1px solid #d1d3e2; }
        .form-control:focus{ border-color:#bac8f3; box-shadow: 0 0 0 .2rem rgba(78,115,223,.2); }
        .btn-login { background: linear-gradient(135deg, #4e73df, #36b9cc); border: none; padding: .9rem; border-radius: .75rem; font-weight: 600; }
        .btn-login:hover { filter: brightness(.95); transform: translateY(-1px); }
        .brand-pill { display:inline-flex; align-items:center; gap:.5rem; background:#ffffff; color:#224abe; border-radius: 100rem; padding:.4rem .8rem; font-weight:700; }
        .brand-pill i { color:#f6c23e; }
        .carousel-item img { object-fit: cover; height: 70vh; width:100%; }
        /* Sections */
        .section-title { color:#224abe; font-weight:800; }
        .muted-subtitle { color:#6c757d; }
        .feature-badge { background:#e9f0ff; color:#224abe; border-radius:999px; padding:.35rem .75rem; font-weight:600; font-size:.875rem; }
        .gallery-card { border:none; overflow:hidden; border-radius:.75rem; box-shadow:0 .5rem 1.25rem rgba(0,0,0,.08); transition:transform .25s ease, box-shadow .25s ease; }
        .gallery-card img { height:220px; object-fit:cover; width:100%; }
        .gallery-card:hover { transform: translateY(-4px); box-shadow:0 1rem 2rem rgba(0,0,0,.12); }
        /* Info cards */
        .icon-card { border:0; border-radius:.85rem; box-shadow:0 .5rem 1.25rem rgba(0,0,0,.08); height:100%; }
        .icon-circle { width:48px; height:48px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center; background:#224abe; color:#fff; }
        .info-tile { background:#f8faff; border:1px solid #e6ecff; border-radius:.75rem; padding:1rem; height:100%; }
        .info-tile .icon { width:40px; height:40px; border-radius:10px; display:flex; align-items:center; justify-content:center; background:#224abe; color:#fff; }
        /* Footer */
        /* Navbar glass + scroll state */
        .navbar-glass { backdrop-filter: saturate(180%) blur(8px); background: rgba(13,27,42,.35); transition: background .25s ease, box-shadow .25s ease; }
        .navbar-glass.scrolled { background: #0d1b2a; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15); }
        .footer { background:#0d1b2a; color:#c9d6df; }
        .footer a { color:#e0eaf3; text-decoration:none; }
        .footer a:hover { text-decoration:underline; }
        .social a { display:inline-flex; width:36px; height:36px; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,.2); border-radius:50%; margin-right:.5rem; color:#e0eaf3; }
        @media (max-width: 991.98px){ .section-login{ margin-top: 0; } .carousel-item img { height: 50vh; } }
    </style>
</head>
<body>
    <!-- Navbar (keeps existing route names) -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-glass">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fa-solid fa-hotel me-2"></i>Sharda Boys Hostel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#facilities">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faqs.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#login">Student Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4500">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active position-relative">
                <img src="img/building.jpeg" class="d-block w-100" alt="Hostel Building" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1501183638710-841dd1904471?q=80&w=1600&auto=format&fit=crop';">
                <div class="hero-overlay"></div>
                <div class="hero-caption">
                    <span class="brand-pill mb-3"><i class="fa-solid fa-star"></i> Sharda Boys Hostel</span>
                    <h1 class="display-5 mb-3">Welcome to Sharda Boys Hostel</h1>
                    <p class="lead mb-4">Comfortable rooms, safe environment, and a vibrant student community.</p>
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        <a href="#login" class="btn btn-warning btn-cta"><i class="fa-solid fa-right-to-bracket me-1"></i> Login</a>
                        <a href="registration.php" class="btn btn-light btn-cta"><i class="fa-solid fa-user-plus me-1"></i> Register</a>
                        <a href="admin/" class="btn btn-success btn-cta"><i class="fa-solid fa-user-shield me-1"></i> Admin</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <img src="img/3idiotgroup.jpeg" class="d-block w-100" alt="Student Group" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=1600&auto=format&fit=crop';">
                <div class="hero-overlay"></div>
                <div class="hero-caption">
                    <h1 class="display-6 mb-3">Friendly, Inclusive Community</h1>
                    <p class="lead mb-4">Make friends, collaborate, and grow together.</p>
                    <a href="#login" class="btn btn-primary btn-cta"><i class="fa-solid fa-arrow-down me-1"></i> Get Started</a>
                </div>
            </div>
            <div class="carousel-item position-relative">
                <img src="img/rooms.jpeg" class="d-block w-100" alt="Hostel Rooms" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505691723518-36a5ac3b2d52?q=80&w=1600&auto=format&fit=crop';">
                <div class="hero-overlay"></div>
                <div class="hero-caption">
                    <h1 class="display-6 mb-3">Modern Rooms & Study Areas</h1>
                    <p class="lead mb-4">Designed for comfort and productivity.</p>
                    <a href="registration.php" class="btn btn-success btn-cta"><i class="fa-solid fa-pen-to-square me-1"></i> Apply Now</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Login Section -->
    <section class="section-login py-5" id="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-0 login-card">
                        <div class="col-md-5 login-visual">
                            <img src="img/logo.jpg" alt="Login Illustration" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1551836022-d5d88e9218df?q=80&w=800&auto=format&fit=crop';">
                        </div>
                        <div class="col-md-7 bg-white p-4 p-md-5">
                            <h3 class="fw-bold mb-1" style="color:#224abe;">Student Login</h3>
                            <p class="text-muted mb-4">Access your portal to manage room allocation, fees, and more.</p>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Email / Registration Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="text" placeholder="Email / Registration Number" name="emailreg" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                        <input type="password" placeholder="Password" name="password" class="form-control" required="true">
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <input type="submit" name="login" class="btn btn-primary btn-login" value="login">
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="forgot-password.php" class="text-decoration-none">Forgot password?</a>
                                    <a href="admin/" class="text-decoration-none"><i class="fa-solid fa-user-shield me-1"></i> Admin Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section id="facilities" class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <span class="feature-badge">What You Get</span>
                <h2 class="section-title mt-2">Facilities</h2>
            </div>
            <div class="row g-4">
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-wifi"></i></div><div>WiFi</div></div></div>
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-video"></i></div><div>CCTV</div></div></div>
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-table"></i></div><div>almari</div></div></div>
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-shirt"></i></div><div>Laundry</div></div></div>
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-utensils"></i></div><div>kichen</div></div></div>
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-temperature-high"></i></div><div>Hot Water</div></div></div>
                <div class="col-6 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-square-parking"></i></div><div>Parking</div></div></div>
                <div class="col-12 col-lg-3"><div class="card icon-card p-4 text-center"><div class="icon-circle mx-auto mb-3"><i class="fa-solid fa-tags"></i></div><div>Rent ₹3000 • Tiffin ₹160/day</div></div></div>
            </div>
        </div>
    </section>

    

    <!-- Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <span class="feature-badge">Our Facilities</span>
                <h2 class="section-title mt-2">Gallery</h2>
                <p class="muted-subtitle">A glimpse of living spaces and amenities at Sharda Boys Hostel</p>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/rooms.jpeg" alt="Rooms" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">Rooms</h6></div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/building.jpeg" alt="Stairs" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1504805572947-34fad45aed93?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">hostel outside</h6></div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/entry point.jpeg" alt="Mess" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1564758866811-86b0d4703f2a?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">hostel entrance</h6></div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/room2.jpeg" alt="Washroom" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1615870216515-4f63bdbd3e3d?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">room with bed</h6></div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/bathroom.jpeg" alt="Beds" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1505692794403-34cb0b3d0d52?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">bathroom</h6></div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/kichen.jpeg" alt="kichen" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">kichen</h6></div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card gallery-card">
                        <img src="img/3idiotgroup.jpeg" alt="Students (Group)" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?q=80&w=800&auto=format&fit=crop';">
                        <div class="card-body"><h6 class="mb-0">Students (Optional)</h6></div>
                    </div>
                </div>
            </div>
            <p class="text-muted small mt-3">Tip: Place your real images in the <code>img/</code> folder with the above filenames to display them.</p>
        </div>
    </section>

    <!-- Information Strip (Before Footer) -->
    <section class="py-5">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <div class="info-tile d-flex gap-3 align-items-start">
                        <div class="icon"><i class="fa-solid fa-hotel"></i></div>
                        <div>
                            <div class="fw-bold">Hostel</div>
                            <div>Sharda Boys Hostel</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-tile d-flex gap-3 align-items-start">
                        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div>
                            <div class="fw-bold">Address</div>
                            <div>Near AKS University, Panna Road, Dherganj, Satna (M.P.) – 485001</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-tile d-flex gap-3 align-items-start">
                        <div class="icon"><i class="fa-solid fa-user"></i></div>
                        <div>
                            <div class="fw-bold">Owner</div>
                            <div>Mr. Anirudh Tripathi</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-tile d-flex gap-3 align-items-start">
                        <div class="icon"><i class="fa-solid fa-phone"></i></div>
                        <div>
                            <div class="fw-bold">Phone</div>
                            <div>9425173209</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 text-muted">Developer credit: This application was developed by <strong>Mr. Kanhaiya Tiwari</strong></div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <span class="feature-badge">Get in Touch</span>
                <h2 class="section-title mt-2">Contact Us</h2>
                <p class="muted-subtitle">We’d love to hear from you. Fill the form or find us on the map.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <form action="#" method="post" onsubmit="return false;">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="you@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea rows="4" class="form-control" placeholder="Write your message..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-paper-plane me-1"></i> Send Message
                                </button>
                                <div class="form-text mt-2">Note: This is a UI-only form. Backend remains unchanged.</div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ratio ratio-4x3 shadow-sm rounded">
                        <iframe src="https://www.google.com/maps?q=AKS%20University%20Satna&output=embed" title="Map to Sharda Boys Hostel" style="border:0; border-radius:.5rem;" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Room & Mess Info Section -->
    <section id="info" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <span class="feature-badge">Plans & Facilities</span>
                <h2 class="section-title mt-2">Room Info</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="card icon-card p-4 h-100">
                        <div class="icon-circle mb-3"><i class="fa-solid fa-bed"></i></div>
                        <h5 class="mb-2">Room Rent</h5>
                        <p class="mb-0">₹3000/month for double person and ₹2200 single </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card icon-card p-4 h-100">
                        <div class="icon-circle mb-3"><i class="fa-solid fa-bowl-food"></i></div>
                        <h5 class="mb-2">Tiffin Charge</h5>
                        <p class="mb-0">₹160/day for 2 meals</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="card icon-card p-4 h-100">
                        <div class="icon-circle mb-3"><i class="fa-solid fa-list-check"></i></div>
                        <h5 class="mb-2">Facilities</h5>
                        <p class="mb-0">WiFi, Laundry, Study Table, CCTV, Parking, Hot Water</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer pt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="text-white">Sharda Boys Hostel</h5>
                    <p class="small">Near AKS University, Panna Road, Dherganj, Satna (M.P.) – 485001</p>
                    <p class="small mb-1"><i class="fa-solid fa-phone me-2"></i>9425173209</p>
                    <div class="social mt-2">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white">Quick Links</h6>
                    <ul class="list-unstyled small">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#facilities">Facilities</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="faqs.php">FAQs</a></li>
                        <li><a href="#login">Student Login</a></li>
                        <li><a href="admin/">Admin</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white">Credits</h6>
                    <p class="small mb-1">Owner: <strong>Mr. Anirudh Tripathi</strong></p>
                    <p class="small">Developer: <strong>Mr. Kanhaiya Tiwari</strong></p>
                </div>
            </div>
            <div class="border-top border-secondary mt-4 pt-3 text-center small">© 2025 Sharda Boys Hostel. Developed by <strong>Mr. Kanhaiya Tiwari</strong>. All rights reserved.</div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar background change on scroll
        (function(){
            const nav = document.querySelector('.navbar-glass');
            const onScroll = () => {
                if (!nav) return; 
                if (window.scrollY > 10) nav.classList.add('scrolled');
                else nav.classList.remove('scrolled');
            };
            onScroll();
            window.addEventListener('scroll', onScroll);
        })();
    </script>
</body>

</html>