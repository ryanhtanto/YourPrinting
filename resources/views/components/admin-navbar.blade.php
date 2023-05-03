@auth
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
                <div class="position-sticky">
                        <div class="list-group list-group-flush mx-3 mt-4">
                                <span>Information</span>
                                <a href="../../admin/home" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                        HOME
                                </a>
                                <span>Panel</span>
                                <a href="../../admin/layanan" class="list-group-item list-group-item-action py-2 ripple">
                                        LAYANAN
                                </a>
                                <a href="../../admin/bahan" class="list-group-item list-group-item-action py-2 ripple">
                                        BAHAN
                                </a>
                                <a href="../../admin/ukuran" class="list-group-item list-group-item-action py-2 ripple">
                                        UKURAN
                                </a>
                                <a href="../../admin/add-printing" class="list-group-item list-group-item-action py-2 ripple">
                                        TAMBAH PRINTING
                                </a>
                        </div>
                </div>
        </nav>
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-bars"></i>
                        </button>
                        <a class="navbar-brand fw-bold" href="#">
                                TEMPAT PRINTING
                        </a>
                        <ul class="navbar-nav ms-auto d-flex flex-row">
                                @auth
                                <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ auth()->user()->username}}
                                        </a>
                                        <ul class="dropdown-menu">
                                                <li>
                                                        <form action="/admin/logout" method="post">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">Log Out <i class="fa-solid fa-right-from-bracket"></i></button>
                                                        </form>
                                                </li>
                                        </ul>
                                </li>
                                @else
                                        <li class="nav-item">
                                                <a class="nav-link" href="../admin/login">Login <i class="fa-sharp fa-solid fa-right-to-bracket"></i></a>
                                        </li>
                                @endauth
                        </ul>
                </div>
        </nav>
@endauth