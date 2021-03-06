<?php require_once('config.php'); 

	if( $user->is_logged_in() ){
		if ($_SESSION["type_account"] != "admin") 
	{
		header('Location: main.php');
	}
	}
	else
	{		
		header('Location: index.php');
	}
	
	$users = $db->query("SELECT Plik.nazwa, users.login, Pobranie_Pliku.data_dodania, Pobranie_Pliku.ip_user FROM Plik INNER JOIN Pobranie_Pliku ON Plik.ID_Plik = Pobranie_Pliku.nr_plik INNER JOIN kurs ON kurs.ID_Kurs = Pobranie_Pliku.nr_kurs INNER JOIN users ON users.ID_USER = Pobranie_Pliku.nr_user ORDER BY Pobranie_Pliku.data_dodania DESC")->fetchAll(PDO::FETCH_OBJ);
?>

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
			
				<a href="log.php" id="logoutButton" class="primary-button">Logi</a>
				<a href="<?php 	
				if( $user->is_logged_in() ){
			
					if ($_SESSION["type_account"] == "admin") 
					{
						echo "settings_admin.php";
					}
					else
					{
						echo "settings_user.php";
					}
				}
				?>" id="settingsButton"><i class="fa fa-cog fa-3x" title="Ustawienia"></i></a>
				

            <a href="logout.php" id="logoutButton" class="primary-button">Wyloguj</a>
            </div>
        </div>
    </div>
</header>

<section class="section is-medium">
    <main>
        <div class="container">
			<?php
                    if (isset($_GET['error']))
                    {
                        echo "<div class=\"notification is-danger\">";
                        if ($_GET['error'] == 1 ) echo $error[] = "Brak uprawnień administratora";
                        echo "</div>";
                    }
                    ?>
            <div class="columns">
                
                <table class="table is-hoverable is-striped">
                        <thead>
                           <tr>
                                <th>Plik</th>
                                <th>Logn</th>
								<th>Data</th>
								<th>Adres IP</th>
                            </tr>
                        </thead>
                        <?php
                            
							
                            foreach ($users as $row)
                            {
                                echo "<tr>";
								echo "<td>".$row->nazwa." </td>";
                                echo "<td>".$row->login."</td>";
								echo "<td>".$row->data_dodania."</td>";
								echo "<td> ".$row->ip_user." </td>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                
            </div>
        </div>
    </main>
</section>

<?php include 'includes/footer.html'; ?>

</body>
</html>