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
    <link rel="stylesheet" href="admin_styles.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <!-- sidebar start -->
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">


            <div class="position-sticky">
               
                <a href="#" class="list-group-item list-group-item-action py-2 ripple mt-3">
                    <span>Manage Orders</span>
                </a>

                <a href="../Logout.php" class="list-group-item list-group-item-action py-2 ripple">
                    <span>Log out</span>
                </a>

            </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar start -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Welcome admin text -->
                <a class="navbar-brand mt-3" href="#">
                    <span>Welcome <?php echo $_SESSION["useruid"] ?>! </span>
                </a>
                
            </div>
        </nav>
        <!-- Navbar end-->
    </header>


    <!--Main layout-->
    <main style="margin-top: 58px">
        <div class="container pt-4"></div>
    </main>
    <!--Main layout-->
    <!-- sidebar end-->

    <!-- admin panel cards start -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right">
                            <i class="fa fa-cart-plus f-left"></i><span>486</span>
                        </h2>
                        <p class="m-b-0">
                            Completed Orders<span class="f-right">351</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right">
                            <i class="fa fa-rocket f-left"></i><span>486</span>
                        </h2>
                        <p class="m-b-0">
                            Completed Orders<span class="f-right">351</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right">
                            <i class="fa fa-refresh f-left"></i><span>486</span>
                        </h2>
                        <p class="m-b-0">
                            Completed Orders<span class="f-right">351</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Orders Received</h6>
                        <h2 class="text-right">
                            <i class="fa fa-credit-card f-left"></i><span>486</span>
                        </h2>
                        <p class="m-b-0">
                            Completed Orders<span class="f-right">351</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- admin panel cards end -->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Orders</b></h2>
                        </div>
                        <div class="col-sm-6">
                           
                            <a href="#deleteOrderModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll" />
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="displayOrders">
                      
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-success" value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
                        <input type="submit" class="btn btn-info" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteOrderModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Order</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the order?</p>
                        <p class="text-warning">
                            <small>This action cannot be undone.</small>
                        </p>
                    </div>
                    <div id="deleteOrderWithModal" class="modal-footer">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="Admin.js"></script>


</body>

</html>