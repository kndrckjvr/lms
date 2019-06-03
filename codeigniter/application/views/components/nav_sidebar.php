<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("user") ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-swatchbook"></i>
    </div>
    <div class="sidebar-brand-text mx-3">LMS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php
        $items = array(
            array(
                "title" => "Dashboard",
                "href" => "user",
                "icon" => "fa-tachometer-alt",
                "auth" => 2
            ),
            array(
                "title" => "Search Books",
                "href" => "book/search",
                "icon" => "fa-search",
                "auth" => 0
            ),
            array(
                "title" => "Reserve Book",
                "href" => "book/reserve",
                "icon" => "fa-bookmark",
                "auth" => 0
            ),
            array(
                "title" => "Book Manager",
                "href" => "book/manager",
                "icon" => "fa-book",
                "auth" => 1
            ),
            array(
                "title" => "Section Manager",
                "href" => "section/manager",
                "icon" => "fa-sort-alpha-up",
                "auth" => 1
            ),
            array(
                "title" => "User Manager",
                "href" => "user/manager",
                "icon" => "fa-user-cog",
                "auth" => 1
            ),
            array(
                "title" => "Manage Payment",
                "href" => "transaction/pay",
                "icon" => "fa-money-bill-alt",
                "auth" => 1
            ),
            array(
                "title" => "Manage Penalty",
                "href" => "penalty/manager",
                "icon" => "fa-dollar-sign",
                "auth" => 1
            ),
            array(
                "title" => "Transactions",
                "href" => "transaction/reports",
                "icon" => "fa-list",
                "auth" => 2
            ),
            array(
                "title" => "User Profile",
                "href" => "user/profile",
                "icon" => "fa-user-alt",
                "auth" => 2
            ),
            array(
                "title" => "Logout",
                "href" => "user/logout",
                "icon" => "fa-sign-out-alt",
                "auth" => 2
            ),
        );
        foreach($items as $item) {
            if($item["auth"] == 2 || $item["auth"] == $this->session->userdata("user_type")) {
                
    ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($item["title"] == $currentActive) echo "active"; ?>">
    <a class="nav-link" href="<?= base_url($item["href"]); ?>">
        <i class="fas fa-fw <?= $item["icon"] ?>"></i>
        <span><?= $item["title"] ?></span></a>
    </li>
    <?php 
            }
        }
    ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div class="container-fluid">        