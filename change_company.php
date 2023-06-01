<?php
include_once 'database.php';

if (isset($_GET['company_id'])) {
    $company_id = $_GET['company_id'];
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the new company information from the form
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
    $Company_id = $_POST['Company_id'];
    $CIFNIF = $_POST['CIFNIF'];
    $Codigo_primario_CNAE_2009 = $_POST['Codigo_primario_CNAE_2009'];
    $Literal_codigo_CNAE_2009_primario = $_POST['Literal_codigo_CNAE_2009_primario'];
    $Codigos_primario_IAE = $_POST['Codigos_primario_IAE'];
    $Literal_primario_IAE = $_POST['Literal_primario_IAE'];

    // Update the company information in the database
    $updateQuery = "UPDATE CompanyPublic AS CP
        INNER JOIN Company AS C ON CP.CompanyPublic_id = C.CompanyPublic_id
        SET
        CP.Company_name = '$newCompanyName',
        CP.Address = '$newAddress',
        CP.Road = '$newRoad',
        CP.House_number = '$newHouseNumber',
        CP.Zipcode = '$newZipCode',
        CP.Province = '$newProvince',
        CP.Municipality = '$newMunicipality',
        CP.Location = '$newLocation',
        CP.Email = '$newEmail',
        CP.Phone = '$newPhone',
        CP.Founded = '$newFounded',
        CP.General_sector = '$newGeneralSector',
        CP.Specific_sector = '$newSpecificSector',
        CP.`Accessible` = '$newAccessible',
        CP.Opening_hours = '$newOpeningHours',
        CP.Parking = '$newParking',
        CP.WiFi = '$newWiFi',
        CP.Distribution = '$newDistribution',
        CP.Webstore = '$newWebstore',
        CP.Product_name = '$newProductName',
        CP.Picture_1 = '$newPicture1',
        CP.Picture_2 = '$newPicture2',
        C.Company_id = '$Company_id',
        C.CIFNIF = '$CIFNIF',
        C.Codigo_primario_CNAE_2009 = '$Codigo_primario_CNAE_2009',
        C.Literal_codigo_CNAE_2009_primario = '$Literal_codigo_CNAE_2009_primario',
        C.Codigos_primario_IAE = '$Codigos_primario_IAE',
        C.Literal_primario_IAE = '$Literal_primario_IAE'
        WHERE CP.CompanyPublic_id = $CompanyPublic_id";

    if(mysqli_query($conn, $updateQuery)) {
        echo "Company information updated successfully.";
    } else {
        echo "Error updating company information: " . mysqli_error($conn);
    }
}

// Retrieve the company information from the database
$result = mysqli_query($conn, "SELECT CompanyPublic.*, Company.* FROM CompanyPublic INNER JOIN Company ON CompanyPublic.CompanyPublic_id = Company.CompanyPublic_id WHERE CompanyPublic.CompanyPublic_id = $company_id;");
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
<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        ?>

<div class="form-wrapper">
               <h1>Company Form</h1>
        <!-- Form to change the company information -->
        <form method="POST" action="">
            <input type="hidden" name="CompanyPublic_id" value="<?php echo $row['CompanyPublic_id']; ?>">

 <input type="hidden" name="CompanyPublic_id" value="<?php echo $row['CompanyPublic_id']; ?>">
 
            <p>Company name: </p>
            <input type="text" name="Company_name" id="Company_name" value="<?php echo $row["Company_name"]; ?>">

            <p>Address: </p>
            <input type="text"
            <input type="text" name="Address" id="Address" value="<?php echo $row["Address"]; ?>">

            <p>Road: <?php echo $row["Road"]; ?></p>
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
            <input type="text" name="House_number" id="House_number" value="<?php echo $row["House_number"]; ?>">

            <p>Zipcode: </p>
            <input type="text" name="Zipcode" id="Zipcode" value="<?php echo $row["Zipcode"]; ?>">

            <p>Province: </p>
            <input type="text" name="Province" id="Province" value="<?php echo $row["Province"]; ?>">

            <p>Municipality: </p>
            <input type="text" name="Municipality" id="Municipality" value="<?php echo $row["Municipality"]; ?>">

            <p>Location: </p>
            <input type="text" name="Location" id="Location" value="<?php echo $row["Location"]; ?>">

            <p>Email: <?php echo $row["Email"]; ?></p>
            <input type="text" name="Email" id="Email" value="<?php echo $row["Email"]; ?>">

            <p>Phone: <?php echo $row["Phone"]; ?></p>
            <input type="text" name="Phone" id="Phone" value="<?php echo $row["Phone"]; ?>">

            <p>Founded: <?php echo $row["Founded"]; ?></p>
            <input type="text" name="Founded" id="Founded" value="<?php echo $row["Founded"]; ?>">

            <p>General Sector: <?php echo $row["General_sector"]; ?></p>
            <select name="General_sector" id="General_sector">
                <option value="Comerç" <?php if ($row["General_sector"] == "Comerç") echo "selected"; ?>>Comerç</option>
                <option value="Hosteleria" <?php if ($row["General_sector"] == "Hosteleria") echo "selected"; ?>>Hosteleria</option>
                <option value="Servicis de proximitat" <?php if ($row["General_sector"] == "Servicis de proximitat") echo "selected"; ?>>Servicis de proximitat</option>
                <option value="Servicis a PYMES" <?php if ($row["General_sector"] == "Servicis a PYMES") echo "selected"; ?>>Servicis a PYMES</option>
                <option value="Professionals" <?php if ($row["General_sector"] == "Professionals") echo "selected"; ?>>Professionals</option>
                <option value="Industria" <?php if ($row["General_sector"] == "Industria") echo "selected"; ?>>Industria</option>
            </select>

            <p>Specific Sector: <?php echo $row["Specific_sector"]; ?></p>
            <input type="text" name="Specific_sector" id="Specific_sector" value="<?php echo $row["Specific_sector"]; ?>">

            <p>Accessible: <?php echo $row["Accessible"]; ?></p>
            <input type="text" name="Accessible" id="Accessible" value="<?php echo $row["Accessible"]; ?>">

            <p>Opening Hours: <?php echo $row["Opening_hours"]; ?></p>
            <input type="text" name="Opening_hours" id="Opening_hours" value="<?php echo $row["Opening_hours"]; ?>">

            <p>Parking: <?php echo $row["Parking"]; ?></p>
            <input type="text" name="Parking" id="Parking" value="<?php echo $row["Parking"]; ?>">

            <p>WiFi: <?php echo $row["WiFi"]; ?></p>
            <input type="text" name="WiFi" id="WiFi" value="<?php echo $row["WiFi"]; ?>">

            <p>Distribution: <?php echo $row["Distribution"]; ?></p>
            <select name="Distribution" id="Distribution">
                <option value="Delivery" <?php echo $row["Distribution"] == "Delivery" ? 'selected' : ''; ?>>Delivery</option>
                <option value="Self-pickup" <?php echo $row["Distribution"] == "Self-pickup" ? 'selected' : ''; ?>>Self-pickup</option>
                <option value="No delivery" <?php echo $row["Distribution"] == "No delivery" ? 'selected' : ''; ?>>No delivery</option>
            </select>

            <p>Webstore: <?php echo $row["Webstore"]; ?></p>
            <input type="text" name="Webstore" id="Webstore" value="<?php echo $row["Webstore"]; ?>">

            <p>Product Name: <?php echo $row["Product_name"]; ?></p>
            <input type="text" name="Product_name" id
            ="Product_name" value="<?php echo $row["Product_name"]; ?>">

            <p>Picture 1: <?php echo $row["Picture_1"]; ?></p>
            <input type="text" name="Picture_1" id="Picture_1" value="<?php echo $row["Picture_1"]; ?>">

            <p>Picture 2: <?php echo $row["Picture_2"]; ?></p>
            <input type="text" name="Picture_2" id="Picture_2" value="<?php echo $row["Picture_2"]; ?>">

            <p>Company_id: <?php echo $row["Company_id"]; ?></p>
            <input type="text" name="Company_id" value="<?php echo $row['Company_id']; ?>">

            <p>CIFNIF: <?php echo $row["CIFNIF"]; ?></p>
            <input type="text" name="CIFNIF" value="<?php echo $row['CIFNIF']; ?>">

            <p>Codigo_primario_CNAE_2009: <?php echo $row["Codigo_primario_CNAE_2009"]; ?></p>
            <input type="text" name="Codigo_primario_CNAE_2009" value="<?php echo $row['Codigo_primario_CNAE_2009']; ?>">

            <p>Literal_codigo_CNAE_2009_primario: <?php echo $row["Literal_codigo_CNAE_2009_primario"]; ?></p>
            <input type="text" name="Literal_codigo_CNAE_2009_primario" value="<?php echo $row['Literal_codigo_CNAE_2009_primario']; ?>">

            <p>Codigos_primario_IAE: <?php echo $row["Codigos_primario_IAE"]; ?></p>
            <input type="text" name="Codigos_primario_IAE" value="<?php echo $row['Codigos_primario_IAE']; ?>">

            <p>Literal_primario_IAE: <?php echo $row["Literal_primario_IAE"]; ?></p>
            <input type="text" name="Literal_primario_IAE" value="<?php echo $row['Literal_primario_IAE']; ?>">

             <button class="new-submit-button" type="submit" name="submit">Change</button>
        </form>
        </div>

        <?php
    }
} else {
    echo "No result found";
}
?>
</body>
</html>