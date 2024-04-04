<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
    </a>
    <div class="navbar-content">
        <div class="search-form" style="width: auto;">
            <div class="input-group">
                <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <input type="text" class="form-control" id="input_search_method" placeholder="Tìm kiếm..."
                       oninput="onSearchMethod()">
            </div>
        </div>
        <ul class="navbar-nav">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown_1" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img style="width: 25px;" src="https://cdn.weatherapi.com/weather/64x64/day/176.png">
                    <span id="label_weather" class="ms-1 me-1 d-none d-md-inline-block">Thời tiết</span>

                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown_1">
                    <span href="#" class="dropdown-item py-2"><i class="flag-icon flag-icon-us"
                                                                         title="us" id="us"></i> <span
                            class="ms-1"> English </span></span>

                </div>
            </li>


            <li class="nav-item dropdown">
                <span class="ms-1 me-1 d-none d-md-inline-block">
                    <i class="fa-regular fa-floppy-disk"></i>
                    {{round(\App\Models\Helper::diskUsedSize(),2)}} /
                    {{round(\App\Models\Helper::diskTotalSize(),2)}} GB  <span
                        class="{{\App\Models\Helper::diskUsed() > 50 && \App\Models\Helper::diskUsed() < 90 ? 'text-warning' : ""}} {{\App\Models\Helper::diskUsed() >= 90 ? 'text-danger' : ''}}">({{\App\Models\Helper::diskUsed()}})</span></span>
            </li>

            <li class="nav-item dropdown">
                <span class="ms-1 me-1 d-none d-md-inline-block">
                    <i class="fa-regular fa-clock"></i>
                    <span class="ms-1">
                        {{\Carbon\Carbon::now()->toDateTimeString()}}
                    </span>
                </span>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flag-icon flag-icon-vn mt-1" title="us"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="languageDropdown">
                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us"
                                                                         id="us"></i> <span
                            class="ms-1"> English </span></a>
                    {{--                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>--}}
                    {{--                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>--}}
                    {{--                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>--}}
                    {{--                    <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>--}}
                </div>
            </li>
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu p-0" aria-labelledby="appsDropdown">--}}
            {{--                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
            {{--                        <p class="mb-0 fw-bold">Web Apps</p>--}}
            {{--                        <a href="javascript:;" class="text-muted">Edit</a>--}}
            {{--                    </div>--}}
            {{--                    <div class="row g-0 p-1">--}}
            {{--                        <div class="col-3 text-center">--}}
            {{--                            <a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square icon-lg mb-1"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><p class="tx-12">Chat</p></a>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-3 text-center">--}}
            {{--                            <a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-lg mb-1"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><p class="tx-12">Calendar</p></a>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-3 text-center">--}}
            {{--                            <a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail icon-lg mb-1"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><p class="tx-12">Email</p></a>--}}
            {{--                        </div>--}}
            {{--                        <div class="col-3 text-center">--}}
            {{--                            <a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram icon-lg mb-1"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg><p class="tx-12">Profile</p></a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
            {{--                        <a href="javascript:;">View all</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            {{--            <li class="nav-item dropdown">--}}
            {{--                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>--}}
            {{--                </a>--}}
            {{--                <div class="dropdown-menu p-0" aria-labelledby="messageDropdown">--}}
            {{--                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">--}}
            {{--                        <p>9 New Messages</p>--}}
            {{--                        <a href="javascript:;" class="text-muted">Clear all</a>--}}
            {{--                    </div>--}}
            {{--                    <div class="p-1">--}}
            {{--                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
            {{--                            <div class="me-3">--}}
            {{--                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
            {{--                            </div>--}}
            {{--                            <div class="d-flex justify-content-between flex-grow-1">--}}
            {{--                                <div class="me-4">--}}
            {{--                                    <p>Leonardo Payne</p>--}}
            {{--                                    <p class="tx-12 text-muted">Project status</p>--}}
            {{--                                </div>--}}
            {{--                                <p class="tx-12 text-muted">2 min ago</p>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
            {{--                            <div class="me-3">--}}
            {{--                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
            {{--                            </div>--}}
            {{--                            <div class="d-flex justify-content-between flex-grow-1">--}}
            {{--                                <div class="me-4">--}}
            {{--                                    <p>Carl Henson</p>--}}
            {{--                                    <p class="tx-12 text-muted">Client meeting</p>--}}
            {{--                                </div>--}}
            {{--                                <p class="tx-12 text-muted">30 min ago</p>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
            {{--                            <div class="me-3">--}}
            {{--                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
            {{--                            </div>--}}
            {{--                            <div class="d-flex justify-content-between flex-grow-1">--}}
            {{--                                <div class="me-4">--}}
            {{--                                    <p>Jensen Combs</p>--}}
            {{--                                    <p class="tx-12 text-muted">Project updates</p>--}}
            {{--                                </div>--}}
            {{--                                <p class="tx-12 text-muted">1 hrs ago</p>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
            {{--                            <div class="me-3">--}}
            {{--                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
            {{--                            </div>--}}
            {{--                            <div class="d-flex justify-content-between flex-grow-1">--}}
            {{--                                <div class="me-4">--}}
            {{--                                    <p>Amiah Burton</p>--}}
            {{--                                    <p class="tx-12 text-muted">Project deatline</p>--}}
            {{--                                </div>--}}
            {{--                                <p class="tx-12 text-muted">2 hrs ago</p>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">--}}
            {{--                            <div class="me-3">--}}
            {{--                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">--}}
            {{--                            </div>--}}
            {{--                            <div class="d-flex justify-content-between flex-grow-1">--}}
            {{--                                <div class="me-4">--}}
            {{--                                    <p>Yaretzi Mayo</p>--}}
            {{--                                    <p class="tx-12 text-muted">New record</p>--}}
            {{--                                </div>--}}
            {{--                                <p class="tx-12 text-muted">5 hrs ago</p>--}}
            {{--                            </div>--}}
            {{--                        </a>--}}
            {{--                    </div>--}}
            {{--                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">--}}
            {{--                        <a href="javascript:;">View all</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </li>--}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <div class="indicator">
                        <div class="circle"></div>
                    </div>
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
                    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
                        <p>6 New Notifications</p>
                        <a href="javascript:;" class="text-muted">Clear all</a>
                    </div>
                    <div class="p-1">
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-gift icon-sm text-white">
                                    <polyline points="20 12 20 22 4 22 4 12"></polyline>
                                    <rect x="2" y="7" width="20" height="5"></rect>
                                    <line x1="12" y1="22" x2="12" y2="7"></line>
                                    <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                                    <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                                </svg>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New Order Recieved</p>
                                <p class="tx-12 text-muted">30 min ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-alert-circle icon-sm text-white">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Server Limit Reached!</p>
                                <p class="tx-12 text-muted">1 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30"
                                     alt="userr">
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>New customer registered</p>
                                <p class="tx-12 text-muted">2 sec ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-layers icon-sm text-white">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Apps are ready for update</p>
                                <p class="tx-12 text-muted">5 hrs ago</p>
                            </div>
                        </a>
                        <a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
                            <div
                                class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-download icon-sm text-white">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" y1="15" x2="12" y2="3"></line>
                                </svg>
                            </div>
                            <div class="flex-grow-1 me-2">
                                <p>Download completed</p>
                                <p class="tx-12 text-muted">6 hrs ago</p>
                            </div>
                        </a>
                    </div>
                    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
                        <a href="javascript:;">View all</a>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{auth()->user()->avatar()}}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{auth()->user()->avatar()}}" alt="">
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{auth()->user()->name}}</p>
                            <p class="tx-12 text-muted">{{auth()->user()->email}}</p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">

                        <li class="dropdown-item py-2">
                            <a href="{{route('administrator.password.index')}}" class="text-body ms-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-edit me-2 icon-md">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                <span>Đổi mật khẩu</span>
                            </a>
                        </li>

                        <li class="dropdown-item py-2">
                            <a href="{{route('administrator.logout')}}" class="text-body ms-0 text-danger">
                                <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-log-out me-2 icon-md">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="text-danger">Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>


<script>
    {{--function getWeather() {--}}

    {{--    callAjax(--}}
    {{--        "GET",--}}
    {{--        "{{route('ajax.administrator.weather.get')}}",--}}
    {{--        {},--}}
    {{--        (response) => {--}}
    {{--            console.log(response)--}}
    {{--            // $('#label_weather').html(response.current.condition.text)--}}

    {{--        },--}}
    {{--        (error) => {--}}

    {{--        },--}}
    {{--        false,--}}
    {{--    )--}}

    {{--}--}}

    {{--document.addEventListener("DOMContentLoaded", () => {--}}
    {{--    getWeather()--}}
    {{--});--}}

    {{--var allowGeoRecall = true;--}}
    {{--var countLocationAttempts = 0;--}}

    {{--function getLocation() {--}}
    {{--    console.log('getLocation was called')--}}
    {{--    if(navigator.geolocation) {--}}
    {{--        navigator.geolocation.getCurrentPosition(showPosition,--}}
    {{--            positionError);--}}
    {{--    } else {--}}
    {{--        hideLoadingDiv()--}}
    {{--        console.log('Geolocation is not supported by this device')--}}
    {{--    }--}}
    {{--}--}}

    {{--function positionError() {--}}
    {{--    console.log('Geolocation is not enabled. Please enable to use this feature')--}}

    {{--    if(allowGeoRecall && countLocationAttempts < 5) {--}}
    {{--        countLocationAttempts += 1;--}}
    {{--        getLocation();--}}
    {{--    }--}}
    {{--}--}}

    {{--function showPosition(){--}}
    {{--    console.log('posititon accepted')--}}
    {{--    allowGeoRecall = false;--}}
    {{--}--}}

    {{--getLocation();--}}

</script>
