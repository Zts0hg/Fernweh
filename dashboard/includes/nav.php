<nav id="side-nav" class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <!-- <li class="nav-item">
        <a class="nav-link" href="dashboard.php">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link " href="person.php?username=<?php echo $_SESSION['username'] ?>">
          <span data-feather="shopping-cart"></span>
          My Homepage
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="Categories.php">
          <span data-feather="shopping-cart"></span>
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new-blog.php" target="_blank">
          <span data-feather="users"></span>
          Add New Blog
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage-blogs.php">
          <span data-feather="bar-chart-2"></span>
          Manage Blogs
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage-comments.php">
          <span data-feather="layers"></span>
          Manage Comments
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="change-password.php">
          <span data-feather="layers"></span>
          Change Password
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="setting.php">
          <span data-feather="layers"></span>
          Setting
        </a>
      </li> -->
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Quick Access</span>
      <a class="d-flex align-items-center text-muted" href="#">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="current-month.php">
          <span data-feather="file-text"></span>
          Current month
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="last-quarter.php">
          <span data-feather="file-text"></span>
          Last quarter
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Math
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text"></span>
          Technique
        </a>
      </li> -->
    </ul>
  </div>
</nav>
