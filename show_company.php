<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="styleinfo.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,500&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <!--Navbar-->
  <!--Navbar-->
<nav class="navbar">
  <div class="navbar-container">
    <a class="navbar-logo" href="show_companies.php">
      <img src="pictures/logo_alcoy.png" alt="Logo">
    </a>
    <ul class="navbar-items">
      <li><a href="show_companies.php">Catalog</a></li>
      <li><a href="show_companies.php">Data change</a></li>
      <li><a href="show_companies.php">Company info</a></li>
      <li><a href="show_companies.php">View data</a></li>
    </ul>
    <form class="navbar-search">
      <input type="text" placeholder="Search">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>

    <!--Text and picture-->
    <div class="container">
        <div class="textpicture">
            <div class="text-container">
                <?php
                include_once 'database.php';

                if (isset($_GET['company_id'])) {
                    $company_id = $_GET['company_id'];

                    $query = "SELECT CompanyPublic.*, Company.* FROM CompanyPublic INNER JOIN Company ON CompanyPublic.CompanyPublic_id = Company.CompanyPublic_id WHERE CompanyPublic.CompanyPublic_id = $company_id;";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<h1>" . $row["Company_name"] . "</h1>";
                            echo "<div class='row'>";
                            echo "<p>Address: " . $row["Address"] . "</p>";
                            echo "<p>Road: " . $row["Road"] . "</p>";
                            echo "<p>House Number: " . $row["House_number"] . "</p>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<p>Zipcode: " . $row["Zipcode"] . "</p>";
                            echo "<p>Province: " . $row["Province"] . "</p>";
                            echo "<p>Municipality: " . $row["Municipality"] . "</p>";
                            echo "</div>";
                            echo "<div class='row'>";
                            echo "<p>Location: " . $row["Location"] . "</p>";
                            echo "<p>Email: " . $row["Email"] . "</p>";
                            echo "<p>Phone: " . $row["Phone"] . "</p>";
                            echo "</div>";
                            echo "<div class='row'>";
                           
                                 echo "<p>Founded: " . $row["Founded"] . "</p>";
                        echo "<p>General Sector: " . $row["General_sector"] . "</p>";
                        echo "<p>Opening Hours: " . $row["Opening_hours"] . "</p>";
                          echo "<p>Specific Sector: " . $row["Specific_sector"] . "</p>";
                      
                        echo "<p>Accessible: " . $row["Accessible"] . "</p>";
                        echo "<p>Parking: " . $row["Parking"] . "</p>";
                        echo "<p>WiFi: " . $row["WiFi"] . "</p>";
                        echo "<p>Distribution: " . $row["Distribution"] . "</p>";
                        echo "<p>Webstore: " . $row["Webstore"] . "</p>";
                        echo "<p>Product Name: " . $row["Product_name"] . "</p>";
                            echo "</div>";
                        }
                        echo "<div class='row'>";
                        echo "<a href='change_company.php?company_id=" . $company_id . "' class='change-button'>Change Company</a>";
                        echo "<a href='delete.php?company_id=" . $company_id . "' class='delete-button'>Delete Company</a>";
                        echo "</div>";
                    } else {
                        echo "No company found.";
                    }
                } else {
                    echo "Invalid company ID.";
                }

                mysqli_close($conn);
                ?>
            </div>
            <div class="picture-container">
                <img src="pictures/Company8Picture1.jpg" alt="Company Picture" class="company-image">
            </div>
        </div>
    </div>
</body>

</html>
