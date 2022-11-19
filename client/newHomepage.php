<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
  </head>
  <body>
    <nav class="navbar bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/headerImg.png" alt="logo" width="30" height="24">
            </a>
                <a class="nav-link waves-effect waves-light" href="../../news.php">
                    <i class="bi bi-bell" style="color: cornflowerblue; "></i>
                </a>
                <a class="nav-link waves-effect waves-light" href="loginform.php">
                        <i class="bi bi-person-circle" style="color: cornflowerblue; "></i> Login
                </a>

        </div>
    </nav>
    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-primary" >
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="width:50vw; margin-left:35vw; text-align:center">
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Club</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Committees</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#">Teams</a>
                    </li>
                </ul>
            </div>
    </nav>

  
  
    <div class="block1 " style="position:relative; width:50vw; margin-left:30vw">
        <img src="img/background.jpeg" alt="about-us">
        <div class="bg-success p-2 text-dark bg-opacity-25" style="position:absolute; z-index:2; left:10px; top:10px;">
            <h3>About us</h3>
            <p style="opacity:1;">
                Some content Some content Some content  Some content
            </p>
        </div>
            

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
  </body>
</html>