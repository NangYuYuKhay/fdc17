<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <!-- starter -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#starter" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Starter
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="starter" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/page1') }}">Page 1</a>
                        <a class="nav-link" href="{{ url('admin/page2') }}">Page 2</a>
                        <a class="nav-link" href="{{ url('admin/page3') }}">Page 3</a>
                        <a class="nav-link" href="{{ url('admin/page4') }}">Page 4</a>
                        <a class="nav-link" href="{{ url('admin/page5') }}">Page 5</a>
                    </nav>
                </div>
            </div>

            <!-- Routing -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#routing" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Routing
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="routing" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/routing/view-only') }}">View only</a>
                        <a class="nav-link" href="{{ url('admin/routing/passing-data-to-view') }}">Passing data to view</a>
                        <a class="nav-link" href="{{ url('admin/routing/route-parameter/pink/black') }}">Route parameter</a>
                        <a class="nav-link" href="{{ url('admin/routing/dynamic-route') }}">Dynamic route</a>
                        <a class="nav-link" href="{{ url('admin/routing/named-route') }}">Named route</a>
                        <a class="nav-link" href="{{ url('admin/routing/test-middleware') }}">Middleware</a>    
                    </nav>
                </div>
            </div>

            <!-- csrf -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#csrf" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Csrf
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="csrf" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/csrf/lecture1') }}">Lecture 1</a>  
                        <a class="nav-link" href="{{ url('admin/csrf/lecture2') }}">Lecture 2</a>  
                        <a class="nav-link" href="{{ url('admin/csrf/lecture3') }}">Lecture 3</a>  

                    </nav>
                </div>
            </div>

            <!-- session -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#session" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Session
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="session" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/session/lecture') }}">Lecture</a> 
                        <a class="nav-link" href="{{ url('admin/session/tasks') }}">Tasks</a> 
                    </nav>
                </div>
            </div>

            <!-- blade template -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#blade-template" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Blade template
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="blade-template" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/blade-template/component') }}">Component</a> 
                        <a class="nav-link" href="{{ url('admin/blade-template/localization') }}">Localization</a> 
                    </nav>
                </div>
            </div>

            <!-- User Management -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#user-management" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    User Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="user-management" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/users') }}">Users</a> 
                    </nav>
                </div>
            </div>

            <!-- Order Management -->
            <div class="nav">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#order-management" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Order Management
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="order-management" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('admin/brands') }}">Brands</a>
                        <a class="nav-link" href="{{ url('admin/categories') }}">Categories</a>
                        <a class="nav-link" href="{{ url('admin/items') }}">Items</a>
                        <a class="nav-link" href="{{ url('admin/orders') }}">Orders</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>