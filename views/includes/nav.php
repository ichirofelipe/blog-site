<nav id="navigation" class="bg-bluegray">
    <div class="container">
        <div class="d-flex justify-between align-items-center py-2">
            <a href="/" class="logo">
                Best Bookmarks
            </a>
            

            <div class="menu-btn d-flex d-sm-none">
                <div class="menu-btn__burger" data-target="#menu">
                </div>
            </div>
            <ul id="menu" class="align-items-center d-flex">
                <li class="px-1">
                    <a href="/about">About us</a>
                </li>
                <li class="px-1">
                    <a href="/contact">Contact</a>
                </li>
                <li id="account" class="px-1 position-relative d-none d-sm-block">
                    
                    <a class="d-flex flex-column align-items-center" data-toggle="modal" data-target="login" href="javascript:void(0)">
                        <span class="icon-user-1 overflow-hidden"></span>
                        <?php if(isset($user)){ ?>
                        <p class="m-0 badge"><?= $user['username'] ?></p>
                        <?php } ?>
                    </a>
                    <?php if(isset($user)){ ?>
                    <ul class="dropdown">
                        <li>
                            <a href="/post">Create Post</a>
                        </li>
                        <li>
                            <form method="POST" action="/controller/logout">
                                <input type="hidden" name="redirect" value="<?= $_SERVER['HTTP_REFERER']??$_SERVER['REQUEST_URI'] ?>">
                                <input type="hidden" name="user" value="<?= $user['id'] ?>">
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
                
                <li class="px-1 d-flex d-sm-none">
                    <a data-toggle="modal" data-target="login" href="javascript:void(0)">Login</a>
                </li>
                <li class="px-1 d-flex d-sm-none">
                    <a data-toggle="modal" data-target="signup" href="javascript:void(0)">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>