<!DOCTYPE html>
<html lang="en" class="">
<head>
    @vite('resources/css/app.css')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Admin One Tailwind CSS Admin Dashboard</title>
    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{asset("./assets/css/main.css?v=1628755089081")}}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <meta name="description" content="Admin One - free Tailwind dashboard">
    <script defer    src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>

</head>
<body>

<div id="app">

    <nav id="navbar-main" class="navbar is-fixed-top">
        <div class="navbar-brand">
            <a class="navbar-item mobile-aside-button">
                <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
            </a>
            <div class="navbar-item">
                <div class="control"><input placeholder="Search everywhere..." class="input"></div>
            </div>
        </div>

        <div class="-menu" id="navbar-menu">
            <a class="navbar-item" href="#">
                <span class="icon"><i class="mdi mdi-logout"></i></span>
            </a>
        </div>
    </nav>

    <aside class="aside is-placed-left is-expanded">
        <div class="aside-tools">
            <div>
                Vala <b class="font-black">Administration</b>
            </div>
        </div>
        <div class="menu is-menu-main">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li class="">
                    <a href="{{route("admin.index")}}">
                        <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                        <span class="menu-item-label">Dashboard</span>
                    </a>
                </li>
            </ul>
            <p class="menu-label">Employees</p>
            <ul class="menu-list">
                <li class="">
                    <a href="{{route("admin.employee.index")}}">
                        <span class="icon"><i class="mdi mdi-table"></i></span>
                        <span class="menu-item-label">List Employer</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{route("admin.employee.create")}}">
                        <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                        <span class="menu-item-label">Ajouter Emplyees</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{route("admin.leave.index")}}">
                        <span class="icon"><i  class="mdi mdi-face-agent"></i></span>
                        <span class="menu-item-label">Congees</span>
                    </a>
                </li>
                <li class="">
                    <a href="{{route("admin.post.index")}}">
                        <span class="icon"><i  class="mdi mdi-face-agent"></i></span>
                        <span class="menu-item-label">Posts</span>
                    </a>
                </li>
                <li class="--set-active-profile-html">
                    <a href="profile.html">
                        <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                        <span class="menu-item-label">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="login.html">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        <span class="menu-item-label">Login</span>
                    </a>
                </li>
                <li>
                    <a class="dropdown">
                        <span class="icon"><i class="mdi mdi-view-list"></i></span>
                        <span class="menu-item-label">Submenus</span>
                        <span class="icon"><i class="mdi mdi-plus"></i></span>
                    </a>
                    <ul>
                        <li>
                            <a href="#void">
                                <span>Sub-item One</span>
                            </a>
                        </li>
                        <li>
                            <a href="#void">
                                <span>Sub-item Two</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </aside>




    @yield("content")




    <div id="sample-modal" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sample modal</p>
            </header>
            <section class="modal-card-body">
                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button --jb-modal-close" aria-label="close">Cancel</button>
                <button class="button red modal-close">Confirm</button>
            </footer>
        </div>
    </div>

    <div id="sample-modal-2" class="modal">
        <div class="modal-background --jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Sample modal</p>
            </header>
            <section class="modal-card-body">
                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button --jb-modal-close">Cancel</button>
                <button class="button blue --jb-modal-close">Confirm</button>
            </footer>
        </div>
    </div>
</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src={{asset("assets/js/main.min.js?v=1628755089081")}}></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>


<script>

</script>
@yield("script")

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->

</body>
</html>
