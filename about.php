<?php
session_start();
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Sharda Boys Hostel - About">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>About • Sharda Boys Hostel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; padding-top: 72px; }
        .section-title { color:#224abe; font-weight:800; }
        .muted-subtitle { color:#6c757d; }
        .navbar-glass { backdrop-filter: saturate(180%) blur(8px); background: #0d1b2a; transition: background .25s ease, box-shadow .25s ease; }
        .footer { background:#0d1b2a; color:#c9d6df; }
        .footer a { color:#e0eaf3; text-decoration:none; }
        .footer a:hover { text-decoration:underline; }
        .social a { display:inline-flex; width:36px; height:36px; align-items:center; justify-content:center; border:1px solid rgba(255,255,255,.2); border-radius:50%; margin-right:.5rem; color:#e0eaf3; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-glass">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php"><i class="fa-solid fa-hotel me-2"></i>Sharda Boys Hostel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#facilities">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faqs.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#login">Student Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5 bg-light border-bottom">
        <div class="container">
            <h1 class="display-6 mb-2">About Sharda Boys Hostel</h1>
            <p class="text-muted mb-0">Comfortable stay near AKS University with a safe and study-friendly environment.</p>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h2 class="section-title">About Sharda Boys Hostel</h2>
                    <p class="muted-subtitle mb-3">Welcome to Sharda Boys Hostel, a trusted and comfortable accommodation for students and working professionals. Located in a safe and accessible area, we provide a peaceful living environment designed to support learning, comfort, and community living.</p>
                    <p class="mb-3">At Sharda Boys Hostel, we believe in offering more than just rooms — we provide a home-like atmosphere with all essential facilities such as clean and spacious rooms, hygienic food, 24×7 water and electricity, high-speed Wi-Fi, and round-the-clock security.</p>
                    <p class="mb-3">Our hostel is managed under the guidance of <strong>Mr. Anirudh Tripathi</strong>, the owner, who ensures that every resident feels safe, respected, and cared for. His vision is to create a welcoming space where students can focus on their studies and personal growth without worrying about daily living needs.</p>
                    <p class="mb-0">Whether you’re new to the city or looking for a reliable place to stay, Sharda Boys Hostel is committed to offering you comfort, discipline, and a friendly environment that feels like home.</p>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm overflow-hidden rounded-4">
                        <img src="img/building.jpeg" class="w-100" style="height:360px; object-fit:cover;" alt="Hostel Overview">
                    </div>
                </div>
            </div>

            <div class="row mt-5 g-4">
                <div class="col-md-4">
                    <div class="card p-4 h-100 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary"><i class="fa-solid fa-bed fa-lg"></i></div>
                            <div>
                                <div class="fw-semibold">Comfortable Rooms</div>
                                <div class="text-muted small">Well-ventilated rooms with study tables.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary"><i class="fa-solid fa-bowl-food fa-lg"></i></div>
                            <div>
                                <div class="fw-semibold">Good Food</div>
                                <div class="text-muted small">Hygienic mess with balanced diet.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-4 h-100 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary"><i class="fa-solid fa-wifi fa-lg"></i></div>
                            <div>
                                <div class="fw-semibold">Connectivity</div>
                                <div class="text-muted small">High-speed internet access for studies.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer pt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="text-white">Sharda Boys Hostel</h5>
                    <p class="small">Near AKS University, Panna Road, Sherganj, Satna (M.P.) – 485001</p>
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
                        <li><a href="index.php#gallery">Gallery</a></li>
                        <li><a href="index.php#facilities">Facilities</a></li>
                        <li><a href="index.php#contact">Contact</a></li>
                        <li><a href="faqs.php">FAQs</a></li>
                        <li><a href="index.php#login">Student Login</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
