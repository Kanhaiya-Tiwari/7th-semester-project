<?php
session_start();
?>
<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="Sharda Boys Hostel - FAQs">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>FAQs • Sharda Boys Hostel</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; padding-top: 72px; }
        .section-title { color:#224abe; font-weight:800; }
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
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#facilities">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="faqs.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#login">Student Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5 bg-light border-bottom">
        <div class="container">
            <h1 class="display-6 mb-2">Frequently Asked Questions</h1>
            <p class="text-muted mb-0">Find answers to common questions about the hostel, rent, food, and facilities.</p>
        </div>
    </header>

    <main class="py-5">
        <div class="container">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1h">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                            What are the monthly hostel charges?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" aria-labelledby="faq1h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Room Rent is <strong>₹6000/month</strong> including fooding & lodging.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                            Is fooding included in ₹6000?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" aria-labelledby="faq2h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Yes, the ₹6000 charges include lodging and fooding.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                            What is the tiffin charge and how many meals are provided?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" aria-labelledby="faq3h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Tiffin charge is <strong>₹90/day</strong> which includes 3 meals.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq4h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                            How far is the hostel from AKS University?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" aria-labelledby="faq4h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">We are located near AKS University, Panna Road, Dherganj, Satna (M.P.) – 485001.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq5h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                            What facilities are available in rooms?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" aria-labelledby="faq5h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Rooms are equipped with study table, proper ventilation, clean washrooms access, and high-speed WiFi.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq6h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6">
                            Are guests or parents allowed to visit?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse" aria-labelledby="faq6h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Visitors are allowed during designated hours as per hostel rules.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq7h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7" aria-expanded="false" aria-controls="faq7">
                            What are the hostel rules and timing?
                        </button>
                    </h2>
                    <div id="faq7" class="accordion-collapse collapse" aria-labelledby="faq7h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Maintain cleanliness, follow in/out timing, respect co-residents, and adhere to security protocols.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq8h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8" aria-expanded="false" aria-controls="faq8">
                            Is WiFi and laundry service available?
                        </button>
                    </h2>
                    <div id="faq8" class="accordion-collapse collapse" aria-labelledby="faq8h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Yes, WiFi and laundry are available to residents.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq9h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9" aria-expanded="false" aria-controls="faq9">
                            How is security maintained in the hostel?
                        </button>
                    </h2>
                    <div id="faq9" class="accordion-collapse collapse" aria-labelledby="faq9h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">24x7 security with CCTV surveillance and adherence to visitor protocols.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq10h">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10" aria-expanded="false" aria-controls="faq10">
                            Whom to contact for room booking or inquiries?
                        </button>
                    </h2>
                    <div id="faq10" class="accordion-collapse collapse" aria-labelledby="faq10h" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">Please contact <strong>9425173209</strong> (Owner: Mr. Anirudh Tripathi).</div>
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
