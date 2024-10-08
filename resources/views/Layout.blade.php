<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

header {
    background-color: #333;
    color: white;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px;
}

.logo {
    font-size: 24px;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links li {
    position: relative;
}

.nav-links a {
    color: white;
    text-decoration: none;
    padding: 10px;
    transition: background-color 0.3s;
}

.nav-links a:hover {
    background-color: #555; /* Change color on hover */
    border-radius: 5px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f4f4f4;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block; /* Show dropdown on hover */
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.toggle-btn {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    cursor: pointer;
}

@media (max-width: 768px) {
    .nav-links {
        display: none; /* Hide links by default on mobile */
        flex-direction: column;
        width: 100%;
        position: absolute;
        top: 60px; /* Position below the navbar */
        left: 0;
        background-color: #333;
    }

    .nav-links.active {
        display: flex; /* Show links when active */
    }

    .toggle-btn {
        display: block; /* Show toggle button on mobile */
    }

    .nav-links li {
        width: 100%; /* Make items full width */
    }
}

.sidebar {
    width: 25%;
    background-color: #f4f4f4;
    padding: 15px;
    border-right: 2px solid #ddd;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.sidebar h2 {
    margin-bottom: 15px;
    color: #333;
}

.sidebar ul {
    list-style: none;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    text-decoration: none;
    color: #333;
    padding: 10px;
    display: block;
    border-radius: 3px;
    transition: background-color 0.3s;
}

.sidebar ul li a:hover {
    background-color: #ddd;
}
/* dropdown */
.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    position: relative;
    margin: 10px 0;
}

.dropdown {
    display: none; /* Hide the dropdown initially */
    position: absolute;
    left: 0; /* Align dropdown to the left of the parent */
    top: 100%; /* Position it below the parent */
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    z-index: 1000;
}

.sidebar ul li:hover .dropdown {
    display: block; /* Show dropdown on hover */
}

.dropdown li {
    margin: 5px 0;
}

.dropdown li a {
    text-decoration: none;
    color: #333;
    padding: 5px 10px;
    display: block;
    transition: background-color 0.3s;
}

.dropdown li a:hover {
    background-color: #ddd; /* Highlight on hover */
}

/* dropwon */
.content {
    width: 75%;
    padding: 15px;
}

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px 0;
    position: relative;
    bottom: 0;
    width: 100%;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.social-icons {
    margin: 10px 0;
}

.social-icons a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
    font-size: 20px;
    transition: color 0.3s;
}

.social-icons a:hover {
    color: #ddd;
}

.footer-links {
    list-style: none;
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.footer-links li {
    margin: 0 15px;
}

.footer-links a {
    color: white;
    text-decoration: none;
    transition: color 0.3s;
}

.footer-links a:hover {
    color: #ddd;
}

   
}

@media (max-width: 768px) {
    .nav-links {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        border-right: none;
        border-bottom: 2px solid #ddd;
    }

    .content {
        width: 100%;
    }
}


    </style>
</head>
<body>
<header>
    <nav>
        <div class="logo">My Site</div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Services</a>
                <div class="dropdown-content">
                    <a href="#">Web Development</a>
                    <a href="#">App Development</a>
                    <a href="#">SEO</a>
                </div>
            </li>
            <li><a href="#">Contact</a></li>
        </ul>
        <button class="toggle-btn" onclick="toggleNav()">☰</button>
    </nav>
</header>


    <div class="container">
        <aside class="sidebar">
            <h2>Sidebar</h2>
            <ul>
                

            <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li> <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li> <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li> <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li> <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="dropdown-toggle">Item 1</a>
            <ul class="dropdown">
                <li><a href="#">Sub Item 1.1</a></li>
                <li><a href="#">Sub Item 1.2</a></li>
                <li><a href="#">Sub Item 1.3</a></li>
            </ul>
        </li>

            </ul>
        </aside>

        <main class="content">
           
        </main>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 My Site. All rights reserved.</p>
            <p>Follow us on social media:</p>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <ul class="footer-links">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
    </footer>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
