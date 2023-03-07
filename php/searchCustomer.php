<?php
  // session_start();
  include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>Search Customer</title>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  </head>
  <body>
  <div class="sidebar close">
    <ul class="nav-links">
        <li>
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="link_name">Dashboard</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="index.php">Dashboard</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="addCustomer.php">
            <i class='bx bxs-user'></i>
              <span class="link_name">Customers</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Customers</a></li>
            <li><a href="addCustomer.php">Add Customers</a></li>
            <li><a href="manageCustomer.php">Manage Customers</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="addMedicine.php">
            <i class='bx bx-plus-medical' ></i>
              <span class="link_name">Medicine</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Medicine</a></li>
            <li><a href="addMedicine.php">Add Medicine</a></li>
            <li><a href="manageMedicine.php">Manage Medicine</a></li>
          </ul>
        </li>
        <li>
          <a href="search.php">
          <i class='bx bx-search' ></i>
            <span class="link_name">Search</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="search.php">Search</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="addSupplier.php">
              <i class="bx bx-plug"></i>
              <span class="link_name">Suppliers</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Suppliers</a></li>
            <li><a href="addSupplier.php">Add Suppliers</a></li>
            <li><a href="manageSupplier.php">Manage Suppliers</a></li>
          </ul>
        </li>
        <li>
          <a href="stock.php">
          <i class='bx bxs-coin-stack' ></i>
            <span class="link_name">Stock</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="stock.php">Stock</a></li>
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="addPharmacist.php">
            <i class='bx bxs-purchase-tag' ></i>
              <span class="link_name">Pharmacist</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Pharmacist</a></li>
            <li><a href="addPharmacist.php">Add Pharmacist</a></li>
            <li><a href="managePharmacist.php">Manage Pharmacist</a></li>
          </ul>
        </li>
        <li>
          <a href="profileDetails.php">
            <i class="bx bx-cog"></i>
            <span class="link_name">Profile Settings</span>
          </a>
          <ul class="sub-menu blank">
              <li><a class="link_name" href="profileDetails.php">Profile Settings</a></li>
          </ul>
        </li>
        <li>
          <a href="changepassword.php">
          <i class="bx bx-key"></i>
            <span class="link_name">Change Password</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="changepassword.php">Change Password</a></li>
          </ul>
        </li>
        <li>
            <a href="logout.php">
            <i class='bx bx-log-out'></i>
              <span class="link_name">Logout</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="logout.php">Logout</a></li>
            </ul>
        </li> 
      </ul>
  </div>
    <section class="home-section">
      <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #1673FD;">
        <div class="container-fluid">
          <div class="home-content">
            <i class="bx bx-menu"></i>
             <h5>
                <span class="logo_name text-light">Global Medical</span>
             </h5>
          </div>
        </div>
      </nav>
      <div class="p-2">
        <main class="px-4">
          <h4 class="text-center py-3">Search Customer</h4>
          
          <form action="searchCustomer.php" method="post">
                <div class="row">
                    <div class="form-group col-md-12 py-2">
                        <div class="mb-3 d-flex">
                            <input style="width: 250px;" type="text" name="search" class="form-control" id="search" placeholder="Search">
                            <button type="submit" name="submit" class="btn btn-success mx-2">Search</button>
                        </div>
                    </div>
                </div>
          </form>
          <?php
          if(isset($_POST["submit"]))
          {
            $sql = "SELECT * FROM customer WHERE CUSNAME like '%{$_POST["search"]}%' or CUSNUMBER like '%{$_POST["search"]}%' or CUSNIC like '%{$_POST["search"]}%'";
            $result = $db->query($sql);
            if($result->num_rows>0)
            {
              echo "<table class='table table-striped table-hover'>
                      <tr>
                        <th class='text-light'>Customer ID</th>
                        <th class='text-light'>Customer Name</th>
                        <th class='text-light'>Customer Contact Number</th>
                        <th class='text-light'>Customer NIC Number</th>
                        <th class='text-light'>Address</th>
                       
                      </tr>";
                      while($row=$result->fetch_assoc())
                      { 
                        echo "<tr>";
                        echo "<td>{$row["ID"]}</td>";
                        echo "<td>{$row["CUSNAME"]}</td>";
                        echo "<td>{$row["CUSNUMBER"]}</td>";
                        echo "<td>{$row["CUSNIC"]}</td>";
                        echo "<td>{$row["CUSADDRESS"]}</td>";
                       
                        echo "</tr>";
                      }
              echo "</table>";
            }else{
              echo "<p class='alert alert-danger fw-bold w-50' >No searching Customer Rocords Found.</p>";
            }
        }
        ?>
       <h4 class="text-center py-4">View all customer Details</h4>
        <?php
            $sql = "SELECT * FROM customer";
            $result = $db->query($sql);
            if($result->num_rows>0)
            {
              echo "<table class='table table-striped table-hover'>
                      <tr>
                        <th class='text-light'>Customer ID</th>
                        <th class='text-light'>Customer Name</th>
                        <th class='text-light'>Customer Contact Number</th>
                        <th class='text-light'>Customer NIC Number</th>
                        <th class='text-light'>Address</th>
                       
                      </tr>";
                      while($row=$result->fetch_assoc())
                      { 
                        echo "<tr>";
                        echo "<td>{$row["ID"]}</td>";
                        echo "<td>{$row["CUSNAME"]}</td>";
                        echo "<td>{$row["CUSNUMBER"]}</td>";
                        echo "<td>{$row["CUSNIC"]}</td>";
                        echo "<td>{$row["CUSADDRESS"]}</td>";
                       
                        echo "</tr>";
                      }
              echo "</table>";
            }else{
              echo "<p>No Customer Rocords Found.</p>";
            }

          ?>
        </main>
      </div>
    </section>
    <script>
      let arrow = document.querySelectorAll('.arrow')
      for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener('click', (e) => {
          let arrowParent = e.target.parentElement.parentElement 
          arrowParent.classList.toggle('showMenu')
        })
      }
      let sidebar = document.querySelector('.sidebar')
      let sidebarBtn = document.querySelector('.bx-menu')
      console.log(sidebarBtn)
      sidebarBtn.addEventListener('click', () => {
        sidebar.classList.toggle('close')
      })
    </script>
    <script src="jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7c82d299f6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
