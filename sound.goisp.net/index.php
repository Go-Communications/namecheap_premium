<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Soundbox Rental Service</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Soundbox Rental Service</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#services">Services</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="#reserve">Reserve</a></li>
        </ul>
    </nav>
    <main>
        <section id="services">
            <h2>Our Services</h2>
            <ul>
                <li>Soundbox Rentals</li>
                <li>Live Sound Reinforcement</li>
                <li>Audio Recording</li>
                <li>Lighting and Visual Effects</li>
            </ul>
        </section>
        <section id="pricing">
            <h2>Pricing</h2>
            <p>Our prices start at $100 per day for soundbox rentals. Contact us for more information on live sound reinforcement, audio recording, and lighting and visual effects services and pricing.</p>
        </section>
        <section id="reserve">
            <h2>Reserve a Soundbox</h2>
            <form action="submit-form.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name"><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br>
                <label for="dates">Dates:</label>
                <input type="text" id="dates" name="dates"><br>
                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 Soundbox Rental Service</p>
    </footer>
</body>
</html>
