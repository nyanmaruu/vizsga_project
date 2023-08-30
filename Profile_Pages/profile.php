<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="profile_styles.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-2 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                    <span  id="firstName"><?php echo $_SESSION['useruid'] ?></span>
                       
                        <div id="profileImage"></div>
                    
                    <span class="font-weight-bold">Welcome <?php echo $_SESSION['useruid'] ?>!</span>

                    <a href="../Logout.php" class="btn btn-dark mt-3">Log out
                <span class="bi bi-box-arrow-right"></span>
            </a>
                    
                </div>
            </div>
            <div class="col-md-10 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                   <!-- profile form insert or update display if there is adress or not-->
                    <form id="addressForm" action="./Profile_formAction.php" method="POST">
                   
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>

    <script src="Profile.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>



</html>