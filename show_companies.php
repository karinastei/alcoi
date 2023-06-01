<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="stylelist.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,500&display=swap"
        rel="stylesheet">
    <title>Company List</title>
</head>
<body>
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
<?php
include_once 'database.php'; // Include the database connection file

$result = mysqli_query($conn, "SELECT CompanyPublic.*, Company.* FROM CompanyPublic INNER JOIN Company ON CompanyPublic.CompanyPublic_id = Company.CompanyPublic_id WHERE CompanyPublic.Deleted = 0;");
?>
<div class="boxes-container">
    <?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>
            <a href="show_company.php?company_id=<?php echo $row['CompanyPublic_id']; ?>">
                <div class="box">
                    <div class="image-container">
            <img src="pictures/<?php echo $row["Picture_1"]; ?>.jpg" alt="Company Picture" class="company-image">
            </div>
        </a>
                
        <span class="box-text"><?php echo $row["Company_name"]; ?></span>
        </div>

        <?php
    }
} else {
    echo "No result found";
}
?>

</div>
 <a href="add_company.php"><button>Add Company</button></a>
</body>
</html>
