<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colorful Landing Page</title>
    <Style>
        /* Global Styles */
*{
    scroll-behavior: smooth;
}
body {
    font-family: 'Poppins', Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: #333;
}
a{
    text-decoration: none;
}
.container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
}

/* Hero Section */
.hero{
    background: linear-gradient(135deg, #ff6f61, #ffc107, #4caf50, #00bcd4);
    background-size: 400% 400%;
    animation: gradientMove 10s ease infinite;
    color: #fff;
    padding: 100px 20px;
}
.icon{
    width: 340px;
    position: relative;
    top: -20px;
    justify-self: center;
    border-radius: 10px;
    height: 180px;
    animation: gradientMove 3s ease infinite;
}
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 10px;
    letter-spacing: 2px;
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    background: #fff;
    color: #333;
    padding: 12px 25px;
    text-decoration: none;
    border-radius: 30px;
    font-weight: bold;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, background 0.3s, color 0.3s;
}

.btn:hover {
    transform: scale(1.1);
    background: #333;
    color: #fff;
}

/* Features Section */
.features {
    padding: 50px 20px;
    background: #f8f9fa;

}

.features h2 {
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: #333;
}

.features-grid {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}

.feature {
    max-width: 300px;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    height: 300px;
}

.feature:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
}


img{
    border-radius: 50%;
    width: 150px;
    position: relative;
    top: 13px;
}

.feature h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

/* Footer */
.footer {
    background: linear-gradient(135deg, #333, #555);
    color: #fff;
    padding: 20px;
    text-align: center;
}

.footer p {
    margin: 0;
}
h3, p{
    margin-top: -5px;
}

    </Style>
</head>
<body>
    <header class="hero">
        <div class="container">
            <h1>Platform Techologies</h1>
            <h2>Group 4</h2>
            <a href="#features" class="btn">Discover More</a>
        </div>
    </header>

    <section id="features" class="features">
        <div class="container">
            <h2>MEMBERS</h2>
            <div class="features-grid">
                <a href="/mc/index.php">
                <div class="feature">
                    <div class="icon" style="background: linear-gradient(135deg, #ff5e62, #ffb886, #ffde85, #7f7fd5);"><img src="/mc/img/picnimc.jpg" alt=""></div>
                    <h3>MC C. Celino</h3>
                    <p>"Live a Life You Won't Regret"</p>
                </div></a>
                <div class="feature">
                    <a href="/karry/index.php">
                    <div class="icon" style="background: linear-gradient(135deg, #ff7eb3, #ffb347, #34d1bf, #4e54c8);"><img src="/karry/assets/images/picko.jpg" alt=""></div>
                    <h3>Karry James B. Omay</h3>
                    <p>"Time is Gold"</p>
                </div></a>
                <div class="feature">
                    <a href="">
                    <div class="icon" style="background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb, #a6c1ee);"></div>
                    <h3>Mark Oliver Buduan</h3>
                    <p>"Striving for perfection in everything we do"</p>
                </div></a>
                <div class="feature">
                    <a href="">
                    <div class="icon" style="background: linear-gradient(135deg, #00c6ff, #0072ff, #2af598, #009efd);"></div>
                    <h3>Railey Aquino</h3>
                    <p>"Striving for perfection in everything we do"
                    </p>
                </div></a>
                <div class="feature">
                    <a href="">
                    <div class="icon" style="background: linear-gradient(135deg, #8e2de2, #4a00e0, #ff512f, #dd2476);"></div>
                    <h3>Mark Emmanuel Emplica</h3>
                    <p>"Striving for perfection in everything we do"</p>
                </div></a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>© All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
