<!DOCTYPE html>
<html>
<head>
    <title>Cosmetic Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            scroll-behavior: smooth;
            background: linear-gradient(to right, #e0f7fa, #e1f5fe);
        }

        nav ul {
            background: linear-gradient(to right,rgb(182, 218, 208),rgb(88, 89, 95));
            
            overflow: hidden;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            color: #fff;
            font-size: 1rem;
            padding: 14px 20px;
            display: block;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #575757;
        }

        nav h2 {
            color: white;
            text-align: center;
            margin: 0;
            padding: 10px;
            background: linear-gradient(to right, #396afc, #2948ff);
        }

        /* Hero Section with Carousel */
        .hero-section {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            /* margin-bottom: 30px; */
        }

        .carousel-slide {
            display: flex;
            width: 100%;
            height: 500px;
            animation: slide 16s infinite;
        }

        .carousel-slide img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            flex-shrink: 0;
            border-radius: 0;
        }

        @keyframes slide {
            0% { transform: translateX(0%); }
            20% { transform: translateX(0%); }
            25% { transform: translateX(-100%); }
            45% { transform: translateX(-100%); }
            50% { transform: translateX(-200%); }
            70% { transform: translateX(-200%); }
            75% { transform: translateX(-300%); }
            95% { transform: translateX(-300%); }
            100% { transform: translateX(0%); }
        }

        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
            font-size: 2.5rem;
            font-weight: bold;
            width: 80%;
        }

        /* Existing Styles */

        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            flex-wrap: wrap;
        }

        .card {
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            text-align: center;
            background-color: white;
            border-radius: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .about-section {
            display: flex;
            flex-wrap: wrap;
            padding: 50px;
            align-items: center;
            justify-content: center;
            background-color: #fff3e0;
        }

        .about-text {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }

        .about-text h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about-text p {
            font-size: 18px;
            line-height: 1.6;
        }

        .about-images {
            flex: 1;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            min-width: 300px;
        }

        .about-images img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .about-images img:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        h2.section-heading {
            text-align: center;
            padding: 20px;
            font-size: 2rem;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #222;
        }

        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 40px;
        }

        #contact {
            background: #fce4ec;
            padding: 50px 20px;
            text-align: center;
        }

        #contact h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        #contact p {
            font-size: 16px;
            color: #444;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .contact-form button {
            background: #e91e63;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .contact-form button:hover {
            background: #c2185b;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            font-size: 20px;
            color: #e91e63;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #c2185b;
        }

        /* Modal Styling */
        #productModal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        #productModal .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            position: relative;
        }

        #productModal .modal-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        #productModal .modal-content button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .buy-now {
            background-color: #00bcd4;
        }

        .buy-now:hover {
            background-color: #0288d1;
        }

        .add-cart {
            background-color: #4caf50;
        }

        .add-cart:hover {
            background-color: #388e3c;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }
        nav{
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav>
    <h2>Welcome to Suman Cosmetic Shop</h2>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#products">Products</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</nav>

<!-- Hero Section with Carousel -->
<section class="hero-section">
    <div class="carousel-slide">
        <img src="assets/images/hero1.jpg" alt="Hero Image 1">
        <img src="assets/images/hero2.jpg" alt="Hero Image 2">
        <img src="assets/images/hero3.jpg" alt="Hero Image 3">
        <img src="assets/images/hero4.jpg" alt="Hero Image 4">
    </div>
    <div class="hero-text">
        Discover the Beauty Within <br>
        Top Quality Cosmetics for You
    </div>
</section>

<!-- Product Section -->
<h2 class="section-heading" id="products">Our Products</h2>
<div class="card-container">
    <?php for ($i = 1; $i <= 12; $i++): ?>
        <div class="card" onclick="showProductDetails(<?php echo $i; ?>)">
            <img src="assets/images/pic<?php echo $i; ?>.jpg" alt="Product <?php echo $i; ?>">
            <p>Product <?php echo $i; ?></p>
        </div>
    <?php endfor; ?>
</div>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="about-text">
        <h2>About Our Cosmetic Shop</h2>
        <p>We provide top-quality skincare and beauty products to make you glow with confidence.</p>
    </div>
    <div class="about-images">
        <img src="assets/images/cosmetic1.jpg" alt="Cosmetic 1">
        <img src="assets/images/cosmetic2.jpg" alt="Cosmetic 2">
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <h2>Contact Us</h2>
    <p>Email: support@cosmeticshop.com<br>Phone: +91-9876543210</p>
    <div class="contact-form">
        <input type="text" placeholder="Your Name">
        <input type="email" placeholder="Your Email">
        <textarea rows="5" placeholder="Your Message"></textarea>
        <button>Send Message</button>
    </div>
    <div class="social-icons">
        <a href="#"><i>🌐</i></a>
        <a href="#"><i>📘</i></a>
        <a href="#"><i>📸</i></a>
    </div>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Cosmetic Shop. All rights reserved.</p>
</footer>

<!-- Product Modal -->
<div id="productModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" alt="Product Image">
        <h3 id="modalTitle">Product Title</h3>
        <p id="modalDescription">Product description goes here.</p>
        <button class="buy-now">Buy Now</button>
        <button class="add-cart">Add to Cart</button>
    </div>
</div>

<!-- JavaScript -->
<script>
    function showProductDetails(index) {
        document.getElementById('modalImage').src = 'assets/images/pic' + index + '.jpg';
        document.getElementById('modalTitle').textContent = 'Product ' + index;
        document.getElementById('modalDescription').textContent = 'This is a premium quality cosmetic product. It helps you look radiant and feel confident.';
        document.getElementById('productModal').style.display = 'flex';
        window.scrollTo(0, 0);
    }

    function closeModal() {
        document.getElementById('productModal').style.display = 'none';
    }
</script>

</body>
</html>
