<?php
// Include the database connection file
require_once "database.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newCompanyName = $_POST['Company_name'];
    $newAddress = $_POST['Address'];
    $newRoad = $_POST['Road'];
    $newHouseNumber = $_POST['House_number'];
    $newZipCode = $_POST['Zipcode'];
    $newProvince = $_POST['Province'];
    $newMunicipality = $_POST['Municipality'];
    $newLocation = $_POST['Location'];
    $newEmail = $_POST['Email'];
    $newPhone = $_POST['Phone'];
    $newFounded = $_POST['Founded'];
    $newGeneralSector = $_POST['General_sector'];
    $newSpecificSector = $_POST['Specific_sector'];
    $newAccessible = $_POST['Accessible'];
    $newOpeningHours = $_POST['Opening_hours'];
    $newParking = $_POST['Parking'];
    $newWiFi = $_POST['WiFi'];
    $newDistribution = $_POST['Distribution'];
    $newWebstore = $_POST['Webstore'];
    $newProductName = $_POST['Product_name'];
    $newPicture1 = $_POST['Picture_1'];
    $newPicture2 = $_POST['Picture_2'];
    $CompanyPublic_id = $_POST['CompanyPublic_id'];
    $CIFNIF = $_POST['CIFNIF'];
    $Codigo_primario_CNAE_2009 = $_POST['Codigo_primario_CNAE_2009'];
    $Literal_codigo_CNAE_2009_primario = $_POST['Literal_codigo_CNAE_2009_primario'];
    $Codigos_primario_IAE = $_POST['Codigos_primario_IAE'];
    $Literal_primario_IAE = $_POST['Literal_primario_IAE'];

    // Insert data into the 'CompanyPublic' table
          $sql1 = "INSERT INTO CompanyPublic (`Company_name`, `Address`, `Road`, `House_number`, `Zipcode`, `Province`, `Municipality`, `Location`, `Email`, `Phone`, `Founded`, `General_sector`, `Specific_sector`, `Accessible`, `Opening_hours`, `Parking`, `WiFi`, `Distribution`, `Webstore`, `Product_name`, `Picture_1`, `Picture_2`)
        VALUES ('$newCompanyName', '$newAddress', '$newRoad', '$newHouseNumber', '$newZipCode', '$newProvince', '$newMunicipality', '$newLocation', '$newEmail', '$newPhone', '$newFounded', '$newGeneralSector', '$newSpecificSector', '$newAccessible', '$newOpeningHours', '$newParking', '$newWiFi', '$newDistribution', '$newWebstore', '$newProductName', '$newPicture1', '$newPicture2')";



    if ($conn->query($sql1) === TRUE) {
        $companyPublicId = $conn->insert_id; // Get the auto-generated CompanyPublic ID
        // Insert data into the 'Company' table, connecting it to the 'CompanyPublic' table
        $sql2 = "INSERT INTO Company (CIFNIF, Codigo_primario_CNAE_2009, CompanyPublic_id, Literal_codigo_CNAE_2009_primario, Codigos_primario_IAE, Literal_primario_IAE) VALUES ('$CIFNIF', '$Codigo_primario_CNAE_2009', '$companyPublicId', '$Literal_codigo_CNAE_2009_primario', '$Codigos_primario_IAE', '$Literal_primario_IAE')";
        if ($conn->query($sql2) === TRUE) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="stylechange.css">
    <!--Fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,500&display=swap"
        rel="stylesheet">
</head>
<body>
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
<div class="form-wrapper">
<h1>Company Registration Form</h1>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <p>Company name:</p>
    <input type="text" name="Company_name" id="Company_name">
    <p>Address: </p>
    <input type="text" name="Address" id="Address">

    <p>Road: </p>
    <select name="Road" id="Road">
        <option value="Carrer" <?php echo $row["Road"] == "Carrer" ? 'selected' : ''; ?>>Carrer</option>
        <option value="Plaça" <?php echo $row["Road"] == "Plaça" ? 'selected' : ''; ?>>Plaça</option>
        <option value="Avinguda" <?php echo $row["Road"] == "Avinguda" ? 'selected' : ''; ?>>Avinguda</option>
        <option value="Polígon" <?php echo $row["Road"] == "Polígon" ? 'selected' : ''; ?>>Polígon</option>
        <option value="Carretera" <?php echo $row["Road"] == "Carretera" ? 'selected' : ''; ?>>Carretera</option>
        <option value="Passeig" <?php echo $row["Road"] == "Passeig" ? 'selected' : ''; ?>>Passeig</option>
        <option value="Placeta" <?php echo $row["Road"] == "Placeta" ? 'selected' : ''; ?>>Placeta</option>
        <option value="Edifici" <?php echo $row["Road"] == "Edifici" ? 'selected' : ''; ?>>Edifici</option>
        <option value="Camí" <?php echo $row["Road"] == "Camí" ? 'selected' : ''; ?>>Camí</option>
    </select>

    <p>House number: </p>
    <input type="text" name="House_number" id="House_number">

    <p>Zipcode: </p>
    <input type="text" name="Zipcode" id="Zipcode">

    <p>Province: </p>
    <input type="text" name="Province" id="Province">

    <p>Municipality: </p>
    <input type="text" name="Municipality" id="Municipality">

    <p>Location: </p>
    <input type="text" name="Location" id="Location">

    <p>Email: </p>
    <input type="text" name="Email" id="Email">

    <p>Phone: </p>
    <input type="text" name="Phone" id="Phone">

    <p>Founded: </p>
    <input type="text" name="Founded" id="Founded">

    <p>General Sector: </p>
    <select name="General_sector" id="General_sector">
        <option value="Comerç" <?php if ($row["General_sector"] == "Comerç") echo "selected"; ?>>Comerç</option>
        <option value="Hosteleria" <?php if ($row["General_sector"] == "Hosteleria") echo "selected"; ?>>Hosteleria</option>
        <option value="Servicis de proximitat" <?php if ($row["General_sector"] == "Servicis de proximitat") echo "selected"; ?>>Servicis de proximitat</option>
        <option value="Servicis a PYMES" <?php if ($row["General_sector"] == "Servicis a PYMES") echo "selected"; ?>>Servicis a PYMES</option>
        <option value="Professionals" <?php if ($row["General_sector"] == "Professionals") echo "selected"; ?>>Professionals</option>
        <option value="Industria" <?php if ($row["General_sector"] == "Industria") echo "selected"; ?>>Industria</option>
    </select>
    <p>Specific Sector: </p>
    <input type="text" name="Specific_sector" id="Specific_sector">
    <p>Accessible: </p>
    <input type="text" name="Accessible" id="Accessible">
    <p>Opening Hours: </p>
    <input type="text" name="Opening_hours" id="Opening_hours">
    <p>Parking: </p>
    <input type="text" name="Parking" id="Parking">
    <p>WiFi: </p>
    <input type="text" name="WiFi" id="WiFi">
    <p>Distribution: </p>
    <select name="Distribution" id="Distribution">
        <option value="Delivery" <?php echo $row["Distribution"] == "Delivery" ? 'selected' : ''; ?>>Delivery</option>
        <option value="Self-pickup" <?php echo $row["Distribution"] == "Self-pickup" ? 'selected' : ''; ?>>Self-pickup</option>
        <option value="No delivery" <?php echo $row["Distribution"] == "No delivery" ? 'selected' : ''; ?>>No delivery</option>
    </select>
    <p>Webstore: </p>
    <input type="text" name="Webstore" id="Webstore">
    <p>Product Name: </p>
    <input type="text" name="Product_name" id="Product_name">
    <p>Picture 1: </p>
    <input type="text" name="Picture_1" id="Picture_1">
    <p>Picture 2: </p>
    <input type="text" name="Picture_2" id="Picture_2">

    <p>CIFNIF: </p>
    <input type="text" name="CIFNIF">
    <p>Codigo_primario_CNAE_2009: </p>
    <input type="text" name="Codigo_primario_CNAE_2009">
    <p>Literal_codigo_CNAE_2009_primario: </p>
    <input type="text" name="Literal_codigo_CNAE_2009_primario">
    <p>Codigos_primario_IAE: </p>
    <input type="text" name="Codigos_primario_IAE">
    <p>Literal_primario_IAE: </p>
    <input type="text" name="Literal_primario_IAE">
    <button class="new-submit-button" type="submit" name="submit">Submit</button>
</form>
</div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>