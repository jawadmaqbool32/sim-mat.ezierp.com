<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="../index.html">
            <img alt="Logo" src="{{asset('assets/media/logos/default-dark.svg')}}" class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{asset('assets/media/logos/default-small.svg')}}"
                class="h-20px app-sidebar-logo-minimize" />
        </a>
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
        </div>
    </div>
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <a href="{{ route('dashboard') }}"><span class="menu-link">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="2" y="2" width="9" height="9" rx="2"
                                            fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                            rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                            rx="2" fill="currentColor" />
                                        <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                            rx="2" fill="currentColor" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">Dashboards</span>
                        </span></a>
                </div>
                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Pages</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">User Profile</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/user-profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Overview</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/user-profile/documents.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Documents</span>
                            </a>
                        </div>


                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z"
                                        fill="currentColor" />
                                    <path
                                        d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Accounts</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../account/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Overview</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/settings.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Settings</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/security.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Security</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/activity.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Activity</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/billing.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Billing</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/statements.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Statements</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/referrals.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Referrals</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/api-keys.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">API Keys</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../account/logs.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Logs</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Blog</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/blog/home.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Home</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/blog/post.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Blog Post</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.0021 10.9128V3.01281C13.0021 2.41281 13.5021 1.91281 14.1021 2.01281C16.1021 2.21281 17.9021 3.11284 19.3021 4.61284C20.7021 6.01284 21.6021 7.91285 21.9021 9.81285C22.0021 10.4129 21.5021 10.9128 20.9021 10.9128H13.0021Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M11.0021 13.7128V4.91283C11.0021 4.31283 10.5021 3.81283 9.90208 3.91283C5.40208 4.51283 1.90209 8.41284 2.00209 13.1128C2.10209 18.0128 6.40208 22.0128 11.3021 21.9128C13.1021 21.8128 14.7021 21.3128 16.0021 20.4128C16.5021 20.1128 16.6021 19.3128 16.1021 18.9128L11.0021 13.7128Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21.9021 14.0128C21.7021 15.6128 21.1021 17.1128 20.1021 18.4128C19.7021 18.9128 19.0021 18.9128 18.6021 18.5128L13.0021 12.9128H20.9021C21.5021 12.9128 22.0021 13.4128 21.9021 14.0128Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">FAQ</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/faq/classic.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">FAQ Classic</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/faq/extended.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">FAQ Extended</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M20.859 12.596L17.736 13.596L10.388 20.944C10.2915 21.0406 10.1769 21.1172 10.0508 21.1695C9.9247 21.2218 9.78953 21.2486 9.65302 21.2486C9.5165 21.2486 9.3813 21.2218 9.25519 21.1695C9.12907 21.1172 9.01449 21.0406 8.918 20.944L2.29999 14.3229C2.10543 14.1278 1.99619 13.8635 1.99619 13.588C1.99619 13.3124 2.10543 13.0481 2.29999 12.853L11.853 3.29999C11.9495 3.20341 12.0641 3.12679 12.1902 3.07452C12.3163 3.02225 12.4515 2.9953 12.588 2.9953C12.7245 2.9953 12.8597 3.02225 12.9858 3.07452C13.1119 3.12679 13.2265 3.20341 13.323 3.29999L21.199 11.176C21.3036 11.2791 21.3797 11.4075 21.4201 11.5486C21.4605 11.6898 21.4637 11.8391 21.4295 11.9819C21.3953 12.1247 21.3249 12.2562 21.2249 12.3638C21.125 12.4714 20.9989 12.5514 20.859 12.596Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14.8 10.184C14.7447 10.1843 14.6895 10.1796 14.635 10.1699L5.816 8.69997C5.55436 8.65634 5.32077 8.51055 5.16661 8.29469C5.01246 8.07884 4.95035 7.8106 4.99397 7.54897C5.0376 7.28733 5.18339 7.05371 5.39925 6.89955C5.6151 6.7454 5.88334 6.68332 6.14498 6.72694L14.963 8.19692C15.2112 8.23733 15.435 8.36982 15.59 8.56789C15.7449 8.76596 15.8195 9.01502 15.7989 9.26564C15.7784 9.51626 15.6642 9.75001 15.479 9.92018C15.2939 10.0904 15.0514 10.1846 14.8 10.184ZM17 18.6229C17 19.0281 17.0985 19.4272 17.287 19.7859C17.4755 20.1446 17.7484 20.4521 18.0821 20.6819C18.4158 20.9117 18.8004 21.0571 19.2027 21.1052C19.605 21.1534 20.0131 21.103 20.3916 20.9585C20.7702 20.814 21.1079 20.5797 21.3758 20.2757C21.6437 19.9716 21.8336 19.607 21.9293 19.2133C22.025 18.8195 22.0235 18.4085 21.925 18.0154C21.8266 17.6223 21.634 17.259 21.364 16.9569L19.843 15.257C19.7999 15.2085 19.7471 15.1697 19.688 15.1432C19.6289 15.1167 19.5648 15.1029 19.5 15.1029C19.4352 15.1029 19.3711 15.1167 19.312 15.1432C19.2529 15.1697 19.2001 15.2085 19.157 15.257L17.636 16.9569C17.2254 17.4146 16.9988 18.0081 17 18.6229ZM10.388 20.9409L17.736 13.5929H1.99999C1.99921 13.7291 2.02532 13.8643 2.0768 13.9904C2.12828 14.1165 2.2041 14.2311 2.29997 14.3279L8.91399 20.9409C9.01055 21.0381 9.12539 21.1152 9.25188 21.1679C9.37836 21.2205 9.51399 21.2476 9.65099 21.2476C9.78798 21.2476 9.92361 21.2205 10.0501 21.1679C10.1766 21.1152 10.2914 21.0381 10.388 20.9409Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Pricing</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/pricing/column.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Column Pricing</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../pages/pricing/table.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Table Pricing</span>
                            </a>
                        </div>
                    </div>
                </div>





                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">eCommerce</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Catalog</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/catalog/products.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Products</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/catalog/categories.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Categories</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/catalog/add-product.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Product</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/catalog/edit-product.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Edit Product</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/catalog/add-category.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Category</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/catalog/edit-category.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Edit Category</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sales</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/sales/listing.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Orders Listing</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/sales/details.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Order Details</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/sales/add-order.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Add Order</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/sales/edit-order.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Edit Order</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Customers</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/customers/listing.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Customer Listing</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/customers/details.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Customer Details</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reports</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/reports/view.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Products Viewed</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/reports/sales.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Sales</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/reports/returns.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Returns</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/reports/customer-orders.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Customer Orders</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/ecommerce/reports/shipping.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Shipping</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/ecommerce/settings.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Settings</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M7 20.5L2 17.6V11.8L7 8.90002L12 11.8V17.6L7 20.5ZM21 20.8V18.5L19 17.3L17 18.5V20.8L19 22L21 20.8Z"
                                        fill="currentColor" />
                                    <path d="M22 14.1V6L15 2L8 6V14.1L15 18.2L22 14.1Z" fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Contacts</span>
                        <span class="menu-arrow"></span>
                    </span>

                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Support Center</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/support-center/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Overview</span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Tickets</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/support-center/tickets/list.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Tickets List</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/support-center/tickets/view.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">View Ticket</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="../apps/support-center/faq.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">FAQ</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="../apps/support-center/contact.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Contact Us</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">User Management</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Users</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/user-management/users/list.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Users List</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/user-management/users/view.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">View User</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Roles</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/user-management/roles/list.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Roles List</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/user-management/roles/view.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">View Role</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/user-management/permissions.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Permissions</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.7 8L7.49998 15.3L4.59999 20.3C3.49999 18.4 3.1 17.7 2.3 16.3C1.9 15.7 1.9 14.9 2.3 14.3L8.8 3L11.7 8Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M11.7 8L8.79999 3H13.4C14.1 3 14.8 3.4 15.2 4L20.6 13.3H14.8L11.7 8ZM7.49997 15.2L4.59998 20.2H17.6C18.3 20.2 19 19.8 19.4 19.2C20.2 17.7 20.6 17 21.7 15.2H7.49997Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Customers</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/customers/getting-started.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Getting Started</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/customers/list.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Customer Listing</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/customers/view.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Customer Details</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22 7H2V11H22V7Z" fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Invoice Manager</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">View Invoices</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/invoices/view/invoice-1.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Invoice 1</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/invoices/view/invoice-2.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Invoice 2</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="../apps/invoices/view/invoice-3.html">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">Invoice 3</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../apps/invoices/create.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Create Invoice</span>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Layouts</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M20 21H11C10.4 21 10 20.6 10 20V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V20C21 20.6 20.6 21 20 21Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Layout Options</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../layouts/light-sidebar.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Light Sidebar</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../layouts/dark-sidebar.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dark Sidebar</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../layouts/light-header.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Light Header</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../layouts/dark-header.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dark Header</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17 11H7C6.4 11 6 10.6 6 10V9C6 8.4 6.4 8 7 8H17C17.6 8 18 8.4 18 9V10C18 10.6 17.6 11 17 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM18 20V19C18 18.4 17.6 18 17 18H7C6.4 18 6 18.4 6 19V20C6 20.6 6.4 21 7 21H17C17.6 21 18 20.6 18 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Toolbars</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../toolbars/classic.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Classic</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../toolbars/saas.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">SaaS</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../toolbars/accounting.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Accounting</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../toolbars/extended.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Extended</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../toolbars/reports.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Reports</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="../layout-builder.html">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z"
                                        fill="currentColor" />
                                    <path d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Layout Builder</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs" target="blank">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                        fill="currentColor" />
                                    <path
                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Documentation</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link"
                        href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog"
                        target="blank">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Changelog v8.1.5</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>
