<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>GAMAFORCE Hardcode Map Plotter</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="static/leafletDraw/leaflet.draw.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Khageswara Map Plotter</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" active aria-current="page" href="#">Mission List</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="bg-light p-5 rounded">
            <h1>Saved Missions</h1>
        </div>

        <table class="table mb-5">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Mission name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';

                // FIXME: SANITIZE THE QUERY FIRST, POSSIBLE SQL INJECTION BUG IS HERE!!
                $sql = "SELECT id, missionName FROM Mission;";

                $missions = mysqli_query($conn, $sql);

                foreach ($missions as $mission) {
                    $missionID = $mission['id'];
                    $missionName = $mission['missionName'];
                    echo "
                <tr>
                    <th scope='row'>$missionID</th>
                    <td><a href='/openMission.php?id=$missionID'>$missionName</a></td>
                </tr>";
                }

                mysqli_close($conn);

                ?>
            </tbody>
        </table>
    </main>


    <script src="https://unpkg.com/jquery@3.6.0/dist/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
