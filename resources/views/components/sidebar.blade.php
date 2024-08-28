<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
                <ul class="menu-content">
                    @if (auth()->user()->role_id==1)
                    <li class="active"><a class="menu-item" href="/createjob"><i></i><span data-i18n="eCommerce">Create Job</span></a>
                    </li>
                    <li><a class="menu-item" href="/mycreatedjobs"><i></i><span data-i18n="Crypto">View Jobs</span></a>
                    </li>
                    <li><a class="menu-item" href="dashboard-sales.html"><i></i><span data-i18n="Sales">Extra</span></a>
                    </li>
                    @elseif(auth()->user()->role_id==2)
                    <li class="active"><a class="menu-item" href="/alljobs"><i></i><span data-i18n="eCommerce">Search Jobs</span></a>
                    </li>
                    <li><a class="menu-item" href="/myappliedjobs"><i></i><span data-i18n="Crypto">View Applied Jobs</span></a>
                    </li>
                    <li><a class="menu-item" href="/myprofile"><i></i><span data-i18n="Sales">My Profile</span></a>
                    </li>
                    @endif

                </ul>
            </li>

        </ul>
    </div>
</div>
