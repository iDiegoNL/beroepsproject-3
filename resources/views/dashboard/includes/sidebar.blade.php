<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Avatar::create(Auth::user()->voornaam)->toBase64() }}" class="img-circle" alt="Avatar">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->voornaam }}</p>
                <!-- Status -->
                <a><i class="fa fa-circle text-maroon"></i> Dev</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Zoeken...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="far fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{ route('dashboard.home') }}"><i class="far fa-home"></i> <span>Home</span></a></li>

            <!-- Producten -->
            <li class="header">PRODUCTEN</li>
            <li class="treeview {{ (request()->is('admin/producten*')) ? 'active menu-open' : '' }}">
                <a href="#"><i class="far fa-box-open"></i> <span>Producten</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (request()->is('admin/producten')) ? 'active' : '' }}"><a href="{{ route('dashboard.producten.overzicht') }}"><i class="far fa-boxes-alt"></i> Overzicht</a></li>
                    <li class="{{ (request()->is('admin/producten/nieuw')) ? 'active' : '' }}"><a href="{{ route('dashboard.producten.nieuw') }}"><i class="far fa-parachute-box"></i> Product Toevoegen</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->is('admin/categorieen*')) ? 'active menu-open' : '' }}">
                <a href="#"><i class="far fa-folders"></i> <span>Categorieën</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (request()->is('admin/categorieen')) ? 'active' : '' }}"><a href="{{ route('dashboard.categorieen.overzicht') }}"><i class="far fa-folder-open"></i> Overzicht</a></li>
                    <li class="{{ (request()->is('admin/categorieen/nieuw')) ? 'active' : '' }}"><a href="{{ route('dashboard.categorieen.nieuw') }}"><i class="far fa-folder-plus"></i> Categorie Toevoegen</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->is('admin/subcategorieen*')) ? 'active menu-open' : '' }}">
                <a href="#"><i class="far fa-folder-tree"></i> <span>Subcategorieën</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (request()->is('admin/subcategorieen')) ? 'active' : '' }}"><a href="{{ route('dashboard.subcategorieen.overzicht') }}"><i class="far fa-folder-open"></i> Overzicht</a></li>
                    <li class="{{ (request()->is('admin/subcategorieen/overzicht')) ? 'active' : '' }}"><a href="{{ route('dashboard.subcategorieen.nieuw') }}"><i class="far fa-folder-plus"></i> Subcategorie Toevoegen</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->is('admin/aanbiedingen*')) ? 'active menu-open' : '' }}">
                <a href="#"><i class="far fa-badge-percent"></i> <span>Aanbiedingen</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (request()->is('admin/aanbiedingen')) ? 'active' : '' }}"><a href="{{ route('dashboard.aanbiedingen.overzicht') }}"><i class="far fa-list-ul"></i> Overzicht</a></li>
                    <li class="{{ (request()->is('admin/aanbiedingen/toevoegen')) ? 'active' : '' }}"><a href="{{ route('dashboard.aanbiedingen.nieuw') }}"><i class="far fa-plus-circle"></i> Aanbieding Toevoegen</a></li>
                </ul>
            </li>
            <!-- /.Producten -->

            <!-- Bestellingen -->
            <li class="header">BESTELLINGEN</li>
            <li class="{{ (request()->is('admin/bestellingen')) ? 'active' : '' }}"><a href="#"><i class="far fa-clipboard"></i> <span>Overzicht</span></a></li>
            <li class="{{ (request()->is('admin/bestellingen/toevoegen')) ? 'active' : '' }}"><a href="#"><i class="far fa-cart-plus"></i> <span>Bestelling Toevoegen</span></a></li>
            <!-- /.Bestellingen -->

            <!-- Bezorger -->
            <li class="header">BEZORGING</li>
            <li class="{{ (request()->is('admin/bezorging')) ? 'active' : '' }}"><a href="#"><i class="far fa-box-check"></i> <span>Bezorglijst</span></a></li>
            <li class="{{ (request()->is('admin/bezorging/overzicht')) ? 'active' : '' }}"><a href="#"><i class="far fa-search"></i> <span>Pakket Zoeken</span></a></li>
            <!-- /.Bezorger -->

            <!-- Instellingen -->
            <li class="header">INSTELLINGEN</li>
            <li class="treeview {{ (request()->is('admin/gebruikers*')) ? 'active menu-open' : '' }}">
                <a href="#"><i class="far fa-users"></i> <span>Gebruikers</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{ (request()->is('admin/gebruikers/klanten*')) ? 'active menu-open' : '' }}">
                        <a href="#"><i class="far fa-users"></i> Klanten
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li class="{{ (request()->is('admin/gebruikers/klanten')) ? 'active' : '' }}"><a href="#"><i class="far fa-users-class"></i> Overzicht</a></li>
                            <li class="{{ (request()->is('admin/gebruikers/klanten/toevoegen')) ? 'active' : '' }}"><a href="#"><i class="far fa-user-plus"></i> Klant Toevoegen</a></li>
                        </ul>
                    </li>
                    <li class="treeview {{ (request()->is('admin/gebruikers/medewerkers*')) ? 'active menu-open' : '' }}">
                        <a href="#"><i class="far fa-users-crown"></i> Medewerkers
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" style="display: none;">
                            <li class="{{ (request()->is('admin/gebruikers/medewerkers')) ? 'active' : '' }}"><a href="#"><i class="far fa-users-class"></i> Overzicht</a></li>
                            <li class="{{ (request()->is('admin/gebruikers/medewerkers/toevoegen')) ? 'active' : '' }}"><a href="#"><i class="far fa-user-plus"></i> Medewerker Toevoegen</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="{{ (request()->is('admin/instellingen/btw')) ? 'active' : '' }}"><a href="#"><i class="far fa-sack-dollar"></i> <span>BTW</span></a></li>
            <!-- /.Instellingen -->
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>