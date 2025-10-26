<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laracasts PHP for Beginners - Combined</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f8f9fa;
        }
        h1 {
            color: #333;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
        }
        section {
            background: #fff;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        code {
            background: #f0f0f0;
            padding: 2px 5px;
            border-radius: 3px;
        }
        ul {
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <!-- VIDEO 3 -->
    <section>
        <h1>Video 3 - Your First PHP Tag</h1>
        <h2>
            <?php
            echo "Hello World!";
            ?>
        </h2>
    </section>

    <!-- VIDEO 4 -->
    <section>
        <h1>Video 4 - Variables</h1>
        <?php
        $greeting = "Hello";
        echo "<p>$greeting Everybody!</p>";
        ?>
    </section>

    <!-- VIDEO 5 -->
    <section>
        <h1>Video 5 - Conditionals and Booleans</h1>
        <?php
        $name = "BioShock";
        $read = true;
        $message = $read ? "You have read $name" : "You have not read $name";
        ?>
        <p><?php echo $message; ?></p>
    </section>

    <!-- VIDEO 6 -->
    <section>
        <h1>Video 6 - Arrays</h1>
        <?php
        $games = ["Halo", "Bioshock", "Last of Us"];
        ?>
        <ul>
            <?php foreach ($games as $game): ?>
                <li><?= $game; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- VIDEO 7 -->
    <section>
        <h1>Video 7 - Associative Arrays</h1>
        <?php
        $games = [
            [
                'name' => 'Assassins Creed',
                'publisher' => 'Ubisoft',
                'purchaseUrl' => 'https://store.steampowered.com/',
                'releaseYear' => 2013
            ],
            [
                'name' => 'GTA 5',
                'publisher' => 'Rockstar',
                'purchaseUrl' => 'https://store.steampowered.com/',
                'releaseYear' => 2013
            ],
            [
                'name' => 'League of Legends',
                'publisher' => 'Riot Games',
                'purchaseUrl' => 'https://store.steampowered.com/',
                'releaseYear' => 2009
            ]
        ];
        ?>
        <ul>
            <?php foreach ($games as $game): ?>
                <li>
                    <a href="<?= $game['purchaseUrl'] ?>">
                        <?= $game['name']; ?> (<?= $game['releaseYear']; ?>)
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- VIDEO 8 -->
    <section>
        <h1>Video 8 - Functions and Filtering</h1>
        <?php
        function filterByPublisher($games, $publisher) {
            $filteredGames = [];
            foreach ($games as $game) {
                if ($game['publisher'] === $publisher) {
                    $filteredGames[] = $game;
                }
            }
            return $filteredGames;
        }

        $filteredGames = filterByPublisher($games, 'Riot Games');
        ?>
        <ul>
            <?php foreach ($filteredGames as $game): ?>
                <li>
                    <a href="<?= $game['purchaseUrl'] ?>">
                        <?= $game['name']; ?> (<?= $game['releaseYear'] ?>) - By <?= $game['publisher'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- VIDEO 9 -->
    <section>
        <h1>Video 9 - Lambdas and Filtering</h1>
        <?php
        $filteredGames = array_filter($games, function($game) {
            return $game['releaseYear'] >= 2009 && $game['releaseYear'] <= 2018;
        });
        ?>
        <ul>
            <?php foreach ($filteredGames as $game): ?>
                <?php if ($game['publisher'] == 'Riot Games'): ?>
                    <li>
                        <a href="<?= $game['purchaseUrl'] ?>">
                            <?= $game['name']; ?> (<?= $game['releaseYear'] ?>) - By <?= $game['publisher'] ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- VIDEO 10 -->
    <section>
        <h1>Video 10 - Separate Logic from Template</h1>
        <?php
        $games = [
            ['name' => 'Assassins Creed', 'publisher' => 'Ubisoft', 'purchaseUrl' => 'https://store.steampowered.com/', 'releaseYear' => 2015],
            ['name' => 'GTA 5', 'publisher' => 'Rockstar', 'purchaseUrl' => 'https://store.steampowered.com/', 'releaseYear' => 2013],
            ['name' => 'League of Legends', 'publisher' => 'Riot Games', 'purchaseUrl' => 'https://store.steampowered.com/', 'releaseYear' => 2009]
        ];
        $filteredGames = array_filter($games, function ($game) {
            return $game['releaseYear'] >= 2009 && $game['releaseYear'] <= 2018;
        });
        ?>
        <ul>
            <?php foreach ($filteredGames as $game): ?>
                <?php if ($game['publisher'] == 'Riot Games'): ?>
                    <li>
                        <a href="<?= $game['purchaseUrl'] ?>">
                            <?= $game['name']; ?> (<?= $game['releaseYear'] ?>) - By <?= $game['publisher'] ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>

    <!-- VIDEO 11 -->
    <section>
        <h1>Video 11 - Technical Check 1 (Database Connection)</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "business_app";

        $conn = @new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo "<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>";
        } else {
            echo "<p style='color:green;'>Database connection successful!</p>";
        }
        ?>
        <h3>Create Account Form</h3>
        <form action="register.php" method="POST">
            <label>Name:</label>
            <input type="text" name="name" required><br><br>

            <label>Email:</label>
            <input type="email" name="email" required><br><br>

            <label>Password:</label>
            <input type="password" name="password" required><br><br>

            <button type="submit">Register</button>
        </form>
    </section>

</body>
</html>
