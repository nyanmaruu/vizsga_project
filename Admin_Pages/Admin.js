$(document).ready(function () {
    addOrderToTable(); 
    displayCountedOrdersAtAdminPage();
    displayCountedUsersAtAdminPage(); 
    displayCountedAdminsAtAdminPage();
    displayCountedProductsAtAdminPage() 


    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        if (this.checked) {
            checkbox.each(function () {
                this.checked = true;
            });
        } else {
            checkbox.each(function () {
                this.checked = false;
            });
        }
    });
    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});





function addOrderToTable() 
{
    
    $.ajax({
        url: "Admin_actions.php",
        type: "POST",
        data: {
            action: "getOrder"
            
        },
        success: function(response) {
            $("#displayOrders").html(response);
          
        }
    })
}

function deleteOrder(id)
        {
            
            $.ajax({
                url: "Admin_actions.php",
                type: "POST",
                data: {
                    action: "deleteOrder",
                   orderId:id
                },
                success: function(response) {
                    $("#displayOrders").html(response);
                    addOrderToTable();
                  
                }
            })
        }

function displayCountedOrdersAtAdminPage() 
{
    $.ajax({
        url: "Admin_actions.php",
        type: "POST",
        data: {
            action: "countOrders",
        },
        success: function(response) {
            $("#displayOrdersNumber").html(response);
        }
    })
}


function displayCountedUsersAtAdminPage() 
{
    $.ajax({
        url: "Admin_actions.php",
        type: "POST",
        data: {
            action: "countUsers",
        },
        success: function(response) {
            $("#displayUsersNumber").html(response);
        }
    })
}

function displayCountedAdminsAtAdminPage() 
{
    $.ajax({
        url: "Admin_actions.php",
        type: "POST",
        data: {
            action: "countAdmins",
        },
        success: function(response) {
            $("#displayAdminsNumber").html(response);
        }
    })
}

function displayCountedProductsAtAdminPage() 
{
    $.ajax({
        url: "Admin_actions.php",
        type: "POST",
        data: {
            action: "countProducts",
        },
        success: function(response) {
            $("#displayProductsNumber").html(response);
        }
    })
}