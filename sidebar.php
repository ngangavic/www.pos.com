<?php
if ($_SESSION['category']=='admin') {
    ?>
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../cashier">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Cashier</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../products">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Products</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../transaction">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Transaction</span>
            </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
      <a class="nav-link" href="../sales">
         <i class="fa fa-fw fa-dashboard"></i>
        <span class="nav-link-text">Sales</span>
      </a>
    </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../details">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Details</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../customer">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Customer</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../departments">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Departments</span>
            </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../employees">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Employees</span>
            </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../reports">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Reports</span>
            </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../tax">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Tax</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../transaction">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Transaction</span>
            </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../discount">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Discount</span>
            </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"
               data-parent="#exampleAccordion">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Price Tags & Stickers</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                    <a href="../price/stickers.php">Stickers</a>
                </li>
                <li>
                    <a href="../price/tags.php">Price Tags</a>
                </li>
            </ul>
        </li>

    </ul>
    <?php
}else{
    ?>
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="../cashier">
                <!-- <i class="fa fa-fw fa-dashboard"></i> -->
                <span class="nav-link-text">Cashier</span>
            </a>
        </li>
    </ul>
    <?php
}
    ?>