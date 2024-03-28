<div class="container-fluid">
    <div class="row">
        
            <nav class="navbar navbar-expand-lg col mt-2">
                <div class="container-fluid">

                    <button 
                    class="navbar-toggler bg-secondary navbar-light ms-auto" 
                    type="button"
                    data-bs-toggle="collapse" 
                    data-bs-target="#navmenu"
                    aria-label="Toggle navigation"
                    aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
                
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav  mx-auto text-center">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?= ($activePage == 'index.php') ? 'active': ''; ?>"> Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="vakantiehuizen.php" class="nav-link <?= ($activePage == 'vakantie') ? 'active': ''; ?>">Vakantiehuizen</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link <?= ($activePage == 'contact') ? 'active': ''; ?>"> Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
