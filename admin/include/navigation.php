
<nav id="sidebar">
  <div class="sidebar-header">
    <h3>GEA-ADMIN</h3>
  </div>
  <ul class="list-unstyled components">
    <li class="active">
      <a href="../admin/index.php" >
        <i class="fa fa-qrcode"></i>
        DASHBOARD
      </a>
    </li>
    <li>
      <a href="../admin/users.php"><i class="fa fa-user-circle"></i> ACCOUNTS</a>
    </li>
    <li>
      <a href="#tourism-page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-map-marked-alt"></i> TOURISM</a>
      <ul class="collapse list-unstyled" id="tourism-page">
        <li>
          <a href="../admin/places.php">PLACE</a>
        </li>
        <li>
          <a href="../admin/products.php">PRODUCTS</a>
        </li>
        <li>
          <a href="../admin/festivities.php">FESTIVITIES</a>
        </li>
        <li>
          <a href="barangays.php">BARANGAY</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="#procurement-page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart"></i> PROCUREMENT</a>
      <ul class="collapse list-unstyled" id="procurement-page">
        <li>
          <a href="procurement.php">PROCUREMENT</a>
        </li>
        <li>
          <a href="categories.php">CATEGORIES</a>
        </li>
        <li>
          <a href="project-reference.php">PROJECT REFERENCE</a>
        </li>
        <li>
          <a href="office.php">OFFICE</a>
        </li>
        <li>
          <a href="mode.php">MODE</a>
        </li>

      </ul>
    </li>
    <li>
      <a href="#services-page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-headset"></i> SERVICES</a>
      <ul class="collapse list-unstyled" id="services-page">
        <li>
          <a href="services.php">SERVICES</a>
        </li>
        <li>
          <a href="employee.php">EMPLOYEE</a>
        </li>
        <li>
          <a href="office.php">OFFICE</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="../admin/latest-news.php"><i class="fa fa-newspaper"></i> LATEST NEWS</a>

    </li>
    <li>
      <a href="../admin/ordinance.php"><i class="fa fa-gavel"></i>ORDINANCE</a>

    </li>
    <li>
      <a href="#about-page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-question-circle"></i> ABOUT US</a>
      <ul class="collapse list-unstyled" id="about-page">
        <li>
          <a href="about.php">ABOUT US</a>
        </li>
        <li>
          <a href="contact.php">CONTACTS US</a>
        </li>
      </ul>
    </li>
  </ul>


</nav>

<div class="admin-content">
  <nav class="navbar navbar-expand-lg navbar-light bg-maroon">

    <button type="button" id="sidebarCollapse" class="btn btn-info btn-color">
      <i class="fa fa-align-justify"></i> <span></span>
    </button>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item padpad jec7"><a href="../" class="nav-link"> <i class = "fa fa-home"></i> </a></li>
    <div class="bar"></div>
    <li class="nav-item padpad jec7 jec8"><a href="../" class="nav-link"> <i class = "fa fa-bell"></i> </a></li>
    <div class="bar"></div>

    <li class="nav-item padpad jec5">
      <a href="#user-log" data-toggle="collapse" class="dropdown-toggle "><i class="fa fa-user-cog"></i> Hello <?php echo $user_data['first'] ?>!</a>
      <ul class="collapse list-unstyled jec4" id="user-log">
        <li class = "jec6">
          <a href="Change_password.php">Change Password</a>
        </li>
        <li class = "jec6">
          <a href="logout.php">Logout</a>
        </li>
      </ul>
    </li>

  </ul>

</div>
</nav>
