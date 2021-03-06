<!DOCTYPE html>
<html>
<head>

<title>System Udostępniania Wykładów</title>
<?php include 'includes/head-meta.html'; ?>

</head>

<body>

<header>
    <div class="container">
        <div class="columns">
            <div class="column is-6">
            <?php include 'includes/logo.html'; ?>
            </div>
            <div class="column is-6">
            <a href="settings.php" id="settingsButton"><i class="fa fa-cog fa-3x" title="Ustawienia"></i></a>
            <a href="logout.php" id="logoutButton" class="primary-button">Wyloguj</a>
            </div>
        </div>
    </div>
</header>
<section class="section is-medium">
    <main>
        <div class="container">
            <div class="columns">
                <div class="column is-6">
                    <h2 class="title">Pobieranie pliku</h2>
                    <p><a href="main.php">Kurs 1</a><i class="fa fa-chevron-right fa-fw"></i>
                    Wykład 1</p>
                    <p>Masz dostęp do tego pliku.</p>

                    <form action="download.php" method="post">
                      <input type="submit" value="Pobierz" name="download" class="primary-button">
                    </form>
                    <?php
                    include('./config.php');
                    if(isset($_POST['download']))
                    {
                      $name = 'nazwa.pdf';
                      $file->downloadFile($name);
                    }
                    ?>
                </div>

            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>
