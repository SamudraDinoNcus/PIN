<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">DAIZY</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../view/dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/functions.php">Profile</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search" />
                <button class="btn btn-primary  me-2" type="button">Search</button>
                <a href="../controller/logout.php">
                    <button class="btn btn-warning" type="button">logout</button>
                </a>
            </form>
        </div>
    </div>
</nav>