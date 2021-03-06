<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{url('image/logo.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Diamante</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
{{--        <!-- Sidebar user panel (optional) -->--}}
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">Alexander Pierce</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Reportes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->id == "1")
                        <li class="nav-item">
                            <a href="{{route('getcomercial')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gerencia General</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administracion y Finanzas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comercial</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produccion</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Indicadores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">


                        <li class="nav-item has-treeview">
                            <a
{{--                                href="{{route('getadministracion')}}" --}}
                                class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Adm. y Finanzas</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a
{{--                                        href="#"--}}
                                        href="{{route('getadministracionalmacen')}}"
                                        class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Almacén</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#"
{{--                                       href="{{route('getadministracioncontabilidad')}}" --}}
                                       class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Contabilidad</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('getadministracioncompras')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Compras</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
{{--                                        href="#"--}}
                                        href="{{route('getadministracioncreditos')}}"
                                        class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Créditos y Cobranzas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
{{--                                        href="#"--}}
                                        href="{{route('getadministracionfinanzas')}}"
                                        class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Finanzas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('getadministraciontesoreria')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Tesorería</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('getadministraciondesarrollohumano')}}" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Desarrollo Humano</p>
                                    </a>
                                </li>

                            </ul>
                        </li>

{{--                        @if(Auth::user()->id == "1")--}}
                            <li class="nav-item has-treeview">
                                <a
                                    {{--                                href="{{route('getcomercial')}}" --}}
                                    class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Comercial</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('getcomercialventas')}}" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Ventas</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('getcomercialmarketing')}}" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>Marketing</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('getcomercialpostventa')}}" class="nav-link">
                                            <i class="far fa-dot-circle nav-icon"></i>
                                            <p>PostVenta</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
{{--                        @endif--}}

                        @if(Auth::user()->id == "1")
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Comercial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produccion</p>
                            </a>
                        </li>
                    </ul>
                    @endif
                </li>

                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

{{--                <li class="nav-item">--}}
{{--                    <a href="pages/widgets.html" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Widgets--}}
{{--                            <span class="right badge badge-danger">New</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-copy"></i>--}}
{{--                        <p>--}}
{{--                            Layout Options--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                            <span class="badge badge-info right">6</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/top-nav.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Top Navigation</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Top Navigation + Sidebar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/boxed.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Boxed</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Fixed Sidebar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-topnav.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Fixed Navbar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/fixed-footer.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Fixed Footer</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/layout/collapsed-sidebar.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Collapsed Sidebar</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}


{{--                <li class="nav-header">EXAMPLES</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="pages/calendar.html" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-calendar-alt"></i>--}}
{{--                        <p>--}}
{{--                            Calendar--}}
{{--                            <span class="badge badge-info right">2</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--                <li class="nav-header">MULTI LEVEL EXAMPLE</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="fas fa-circle nav-icon"></i>--}}
{{--                        <p>Level 1</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-circle"></i>--}}
{{--                        <p>--}}
{{--                            Level 1--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Level 2</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item has-treeview">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>--}}
{{--                                    Level 2--}}
{{--                                    <i class="right fas fa-angle-left"></i>--}}
{{--                                </p>--}}
{{--                            </a>--}}
{{--                            <ul class="nav nav-treeview">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link">--}}
{{--                                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                                        <p>Level 3</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link">--}}
{{--                                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                                        <p>Level 3</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link">--}}
{{--                                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                                        <p>Level 3</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Level 2</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="fas fa-circle nav-icon"></i>--}}
{{--                        <p>Level 1</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-circle text-danger"></i>--}}
{{--                        <p class="text">Important</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-circle text-warning"></i>--}}
{{--                        <p>Warning</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-circle text-info"></i>--}}
{{--                        <p>Informational</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
