<style>
.app-nav .nav-icon {
    position: absolute;
    left: 1rem;
    top: .6rem;
}
</style>

<div id="app-sidepanel" class="app-sidepanel"> 

    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    
    <div class="sidepanel-inner d-flex flex-column">

        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>

        <div class="app-branding">
            <a class="app-logo" href="{{ route('admin.dashboard') }}">
                <img class="logo-icon me-2" src="{{ asset('/a-portal/images/logo_tp.png') }}" alt="logo">
                <span class="logo-text">TP</span>
            </a>
        </div>
        
        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <a 
                        class="nav-link d-flex align-items-center {{ Request::segment(2) == 'dashboard' ? 'active' : null }}" 
                        href="{{ route('admin.dashboard') }}"
                    >
                        <span class="nav-icon p-0">
                            <i class="bi bi-bar-chart" style="font-size: 1.5em;" role="img" aria-label="bootstrap-icon"></i>
                        </span>
                        <span class="nav-link-text">Панель</span>
                    </a>
                </li>

                <li class="nav-item has-submenu">

                <li class="nav-item">
                    <a 
                        class="nav-link {{ Request::segment(2) == 'clients' ? 'active' : null }}" 
                        href="{{ route('admin.client.list') }}"
                    >
                        <span class="nav-icon">
                            <i 
                                class="bi bi-building" 
                                style="font-size: 1.5em;" 
                                role="img" 
                                aria-label="bootstrap-icon"
                            ></i>
                        </span>
                        <span class="nav-link-text">Клиенты</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a 
                        class="nav-link {{ Request::segment(2) == 'payments' ? 'active' : null }}" 
                        href="{{ route('admin.payments.list') }}"
                    >
                        <span class="nav-icon">
                            <i 
                                class="bi bi-credit-card" 
                                style="font-size: 1.5em;" 
                                role="img" 
                                aria-label="bootstrap-icon"
                            ></i>
                        </span>
                        <span class="nav-link-text">Оплаты</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a 
                        class="nav-link {{ Request::segment(2) == 'transactions' ? 'active' : null }}" 
                        href="{{ route('admin.transactions.list') }}"
                    >
                        <span class="nav-icon">
                            <i 
                                class="bi bi-card-list" 
                                style="font-size: 1.5em;" 
                                role="img" 
                                aria-label="bootstrap-icon"
                            ></i>
                        </span>
                        <span class="nav-link-text">Транзакции</span>
                    </a>
                </li>

                <li class="nav-item has-submenu">
      
                    <a 
                        class="nav-link submenu-toggle {{ Request::segment(2) == 'statistics' ? 'active' : null }}"
                        href="#"
                        data-bs-toggle="collapse" 
                        data-bs-target="#submenu-1" 
                        aria-expanded="false" 
                        aria-controls="submenu-1"
                    >
                        <span class="nav-icon">
                            <i 
                                class="bi bi-file-spreadsheet" 
                                style="font-size: 1.5em;" 
                                role="img" 
                                aria-label="bootstrap-icon"
                            ></i>
        
                        </span>
                        <span class="nav-link-text">Статистика</span>
                        <span class="submenu-arrow">
                            <i 
                                class="bi bi-chevron-down" 
                                style="font-size: 1.5em;" 
                                role="img" 
                                aria-label="bootstrap-icon"
                            ></i>
                        </span>
                    </a>
                    <div 
                        id="submenu-1"
                        class="collapse submenu submenu-1" 
                        data-bs-parent="#menu-accordion"
                    >
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item">
                                <a 
                                    class="submenu-link" 
                                    href="{{ route('admin.statistics.payments.main') }}"
                                >Оплаты - У1</a>
                            </li>
                            <li class="submenu-item">
                                <a 
                                    class="submenu-link" 
                                    href="{{ route('admin.statistics.transactions.main') }}"
                                >Транзакции</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a 
                        class="nav-link {{ Request::segment(2) == 'support' ? 'active' : null }}" 
                        href="{{ route('admin.support.tickets.list') }}"
                    >
                        <span class="nav-icon pt-1">
                            <i 
                                class="fa fa-life-ring" 
                                style="font-size: 1.5em;" 
                                role="img" 
                                aria-label="bootstrap-icon"
                            ></i>
                        </span>
                        <span class="nav-link-text">Тикеты</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="app-sidepanel-footer">
            <nav class="app-nav app-nav-footer">
                <ul class="app-menu footer-menu list-unstyled">
                    <li class="nav-item">
                        <a 
                            class="nav-link" 
                            href="{{ route('admin.settings') }}"
                        >
                            <span class="nav-icon">
                                <i 
                                    class="bi bi-gear" 
                                    style="font-size: 1.5em;" 
                                    role="img" 
                                    aria-label="bootstrap-icon"
                                ></i>
                            </span>
                            <span class="nav-link-text">Настройки</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>