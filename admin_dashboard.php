<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            overflow: hidden; /* Prevent scrollbars */
        }

        #background-image {
            background-image: url('img/news/news3.jpg'); /* Image path */
            background-size: cover; /* Cover the entire screen */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* No image repetition */
            position: fixed; /* Fixed position */
            top: 0;
            left: 0;
            width: 100vw; /* Full width of the viewport */
            height: 100vh; /* Full height of the viewport */
            z-index: -1; /* Place the image behind other elements */
        }

        #sidebar {
            background-color: #000000;
            color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            height: 100vh;
            position: fixed;
            width: 250px;
        }

        .nav-link {
            color: #ffffff;
        }

        .nav-link:hover {
            background-color: #007bff;
            color: #ffffff;
        }

        .nav-link.active {
            background-color: #007bff;
            color: #ffffff;
        }

        #content {
            margin-left: 250px;
            color: #ffffff; /* Text color for overlay */
            position: relative; /* Relative position for absolute child elements */
            z-index: 1; /* Place the text above the background image */
        }

        h1 {
            position: absolute; /* Absolute position within the relative parent */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Center accurately */
            font-size: 2em; /* Adjust font size as needed */
        }

        #content {
    margin-left: 250px;
    color: #ffffff;
    position: relative;
    z-index: 1;
    height: 100vh; /* Full height of the viewport */
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
}

h1 {
    font-size: 2em;
}

    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div id="background-image"></div>

        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="candidature.php" onclick="showTab('candidatures')">Candidatures</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" onclick="showTab('contacts')">Contacts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="job.php" onclick="showTab('emplois')">Emplois</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="content">
    <h1>DASHBOARD ADMIN</h1>
</main>

    </div>
</div>

</body>
</html>
