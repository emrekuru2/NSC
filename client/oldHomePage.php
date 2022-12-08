<?php
    $title = "Homepage";
    include_once 'includes/components/newheader.php';

    $conn = OpenCon();
?>
<br>
<div class="container">

    <div class="row">
        <img src="img/logo.png" class="img-fluid" alt="Responsive image">
    </div>

    <br>


    <div class="row">
        <div class="col-md-8 mb-5">
            <h2><?php if (isset($_SESSION['LoggedIn'])) {
                echo "Hello " . $_SESSION['FirstName']. "!";
                } else {
                echo "Hello there!";
                }
                ?>
                </h2>
            <hr>
			<p>Welcome to the official Nova Scotia Cricket Association website. Here you can stay updated on upcoming matches, events and other important bulletins. New members, whether you are a player or a fan of the game, are always welcome.</p>
			<p></p>
            <a class="btn light-blue text-white btn-lg" href="#">Call to Action &raquo;</a>
        </div>
        <div class="col-md-4 mb-5">
            <h2>Contact Us</h2>
            <hr>
            <address>
                <strong><a href="mailto:nsca@cricketnovascotia.ca" target="_top">Email Us</strong>
                <br><a href=https://m.me/novascotiacricket target="blank">Message Us on Facebook</a></br>
                <br>
            </address>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn light-blue text-white">Find Out More!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam ut praesentium aut.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn light-blue text-white">Find Out More!</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn light-blue text-white">Find Out More!</a>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
    include 'includes/components/footer.php'
?>

