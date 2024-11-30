<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{route('administrator.dashboard.index')}}" class="sidebar-brand">
            <img style="width: 130px;" src="{{ \App\Models\Helper::logoImagePath() }}">
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="container_slidebar" class="sidebar-body ps">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{route('administrator.dashboard.index')}}" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-box link-icon">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            @can('users-list')
                <li class="nav-item">
                    <a href="{{route('administrator.users.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="link-title ms-3">Khách hàng</span>
                    </a>
                </li>
            @endcan

            @can('chats-list')
                <li class="nav-item">
                    <a href="{{route('administrator.chats.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-message-square link-icon">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="link-title">Chat</span>
                        @if(\App\Models\ParticipantChat::where('user_id', auth()->id())->sum('number_not_read'))
                            <span class="badge bg-danger fw-bolder ms-auto"
                                  style="position: absolute;right: 0;top: 7px;">
                                {{\App\Models\ParticipantChat::where('user_id', auth()->id())->sum('number_not_read')}}
                        </span>
                        @endif
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Bán hàng</li>

            @can('categories-list')
                <li class="nav-item">
                    <a href="{{route('administrator.categories.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Danh mục sản phẩm</span>
                    </a>
                </li>
            @endcan

            @can('products-list')
                <li class="nav-item">
                    <a href="{{route('administrator.products.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Sản phẩm</span>
                    </a>
                </li>
            @endcan

            @can('orders-list')
                <li class="nav-item">
                    <a href="{{route('administrator.orders.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Đơn hàng</span>
                    </a>
                </li>
            @endcan

            @can('vouchers-list')
                <li class="nav-item">
                    <a href="{{route('administrator.vouchers.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Mã giảm giá</span>
                    </a>
                </li>
            @endcan

            @can('product_comments-list')
                <li class="nav-item">
                    <a href="{{route('administrator.product_comments.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Bình luận sản phẩm</span>
                    </a>
                </li>
            @endcan

            @can('flash_sales-list')
                <li class="nav-item">
                    <a href="{{route('administrator.flash_sales.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Flash sales</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Mạng xã hội</li>

            @if(env('APP_ENV') == "local")

                <li class="nav-item nav-category">Temple</li>

                @can("posts-list")
                    <li class="nav-item">
                        <a href="{{route("administrator.posts.index")}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-box link-icon">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                            <span class="link-title">Posts</span>
                        </a>
                    </li>
                @endcan

                /*step_1*/

            @endif

            <li class="nav-item nav-category">Tài chính</li>

            @can('user_transactions-list')
                <li class="nav-item">
                    <a href="{{route('administrator.user_transactions.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Giao dịch</span>
                    </a>
                </li>
            @endcan

            @can('user_points-list')
                <li class="nav-item">
                    <a href="{{route('administrator.user_points.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Điểm</span>
                    </a>
                </li>
            @endcan

            @can('banks-list')
                <li class="nav-item">
                    <a href="{{route('administrator.banks.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Ngân hàng</span>
                    </a>
                </li>
            @endcan

            @can('bank_cash_ins-list')
                <li class="nav-item">
                    <a href="{{route('administrator.bank_cash_ins.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Ngân hàng nạp tiền</span>
                    </a>
                </li>
            @endcan

            @can('payment_methods-list')
                <li class="nav-item">
                    <a href="{{route('administrator.payment_methods.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Phương thức thanh toán</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Hạng</li>

            @can('memberships-list')
                <li class="nav-item">
                    <a href="{{route('administrator.memberships.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Hạng thành viên</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Affiliate</li>

            @can('memberships-list')
                <li class="nav-item">
                    <a href="{{route('administrator.affiliates.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Cây phân cấp</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Lịch</li>

            @can('calendars-list')
                <li class="nav-item">
                    <a href="{{route('administrator.calendars.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Lịch làm việc</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Thông báo</li>

            @can('job_emails-list')
                <li class="nav-item">
                    <a href="{{route('administrator.job_emails.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Email</span>
                    </a>
                </li>
            @endcan

            @can('job_notifications-list')
                <li class="nav-item">
                    <a href="{{route('administrator.job_notifications.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Thông báo ứng dụng</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Phân quyền</li>

            @can('employees-list')
                <li class="nav-item">
                    <a href="{{route('administrator.employees.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Nhân viên</span>
                    </a>
                </li>
            @endcan

            @can('roles-list')
                <li class="nav-item">
                    <a href="{{route('administrator.roles.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Vai trò</span>
                    </a>
                </li>
            @endcan

            @can('user_types-list')
                <li class="nav-item">
                    <a href="{{route('administrator.user_types.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Loại khách hàng</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Nội dung</li>

            @can('sliders-list')
                <li class="nav-item">
                    <a href="{{route('administrator.sliders.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Slider</span>
                    </a>
                </li>
            @endcan

            @can('system_branches-list')
                <li class="nav-item">
                    <a href="{{route('administrator.system_branches.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Danh sách chi nhánh</span>
                    </a>
                </li>
            @endcan

            @can('logos-list')
                <li class="nav-item">
                    <a href="{{route('administrator.logos.add')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Logo</span>
                    </a>
                </li>
            @endcan

            @can('category_news-list')
                <li class="nav-item">
                    <a href="{{route('administrator.category_news.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Danh mục tin tức</span>
                    </a>
                </li>
            @endcan

            @can('news-list')
                <li class="nav-item">
                    <a href="{{route('administrator.news.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Tin tức</span>
                    </a>
                </li>
            @endcan


            @can('f_a_q_s-list')
                <li class="nav-item">
                    <a href="{{route("administrator.f_a_q_s.index")}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">FAQs</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">File</li>

            @can('medias-list')
                <li class="nav-item">
                    <a href="{{route('administrator.medias.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Quản lý file</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Cài đặt</li>

            @can('settings-list')
                <li class="nav-item">
                    <a href="{{route('administrator.settings.edit', ['id' => 1])}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Cài đặt chung</span>
                    </a>
                </li>
            @endcan

            @can('shipping_methods-list')
                <li class="nav-item">
                    <a href="{{route('administrator.shipping_methods.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Phương thức vận chuyển</span>
                    </a>
                </li>
            @endcan

            <li class="nav-item nav-category">Dữ liệu</li>

            @can('history_datas-list')
                <li class="nav-item">
                    <a href="{{route('administrator.register_cities.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Tỉnh thành phố</span>
                    </a>
                </li>
            @endcan

            @can('history_datas-list')
                <li class="nav-item">
                    <a href="{{route('administrator.register_districts.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Quận huyện</span>
                    </a>
                </li>
            @endcan

            @can('history_datas-list')
                <li class="nav-item">
                    <a href="{{route('administrator.register_wards.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Phường xã</span>
                    </a>
                </li>
            @endcan

            @can('history_datas-list')
                <li class="nav-item">
                    <a href="{{route('administrator.history_data.index')}}" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-box link-icon">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span class="link-title">Lịch sử dữ liệu</span>
                    </a>
                </li>
            @endcan

        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</nav>

{{--<nav class="settings-sidebar">--}}
{{--    <div class="sidebar-body">--}}
{{--        <a href="#" class="settings-sidebar-toggler">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                 class="feather feather-settings">--}}
{{--                <circle cx="12" cy="12" r="3"></circle>--}}
{{--                <path--}}
{{--                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>--}}
{{--            </svg>--}}
{{--        </a>--}}
{{--        <h6 class="text-muted mb-2">Sidebar:</h6>--}}
{{--        <div class="mb-3 pb-3 border-bottom">--}}
{{--            <div class="form-check form-check-inline">--}}
{{--                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"--}}
{{--                       value="sidebar-light" checked="">--}}
{{--                <label class="form-check-label" for="sidebarLight">--}}
{{--                    Light--}}
{{--                </label>--}}
{{--            </div>--}}
{{--            <div class="form-check form-check-inline">--}}
{{--                <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"--}}
{{--                       value="sidebar-dark">--}}
{{--                <label class="form-check-label" for="sidebarDark">--}}
{{--                    Dark--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="theme-wrapper">--}}
{{--            <h6 class="text-muted mb-2">Light Theme:</h6>--}}
{{--            <a class="theme-item active" href="../demo1/dashboard.html">--}}
{{--                <img src="../assets/images/screenshots/light.jpg" alt="light theme">--}}
{{--            </a>--}}
{{--            <h6 class="text-muted mb-2">Dark Theme:</h6>--}}
{{--            <a class="theme-item" href="../demo2/dashboard.html">--}}
{{--                <img src="../assets/images/screenshots/dark.jpg" alt="light theme">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<nav class="sidebar-main" style="display: none;">--}}
{{--    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>--}}
{{--    <div id="sidebar-menu">--}}
{{--        <ul class="sidebar-links" id="simple-bar">--}}
{{--            <li class="back-btn"><a href="index.html"><img class="img-fluid" alt=""></a>--}}
{{--                <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"--}}
{{--                                                                      aria-hidden="true"> </i></div>--}}
{{--            </li>--}}

{{--            <li class="sidebar-list">--}}
{{--                <label class="badge badge-light-danger">Latest </label>--}}
{{--                <a--}}
{{--                    class="sidebar-link sidebar-title link-nav" href="/administrator/dashboard">--}}
{{--                    <i class="fa-solid fa-chart-line"></i>--}}
{{--                    <span>Tổng quan</span>--}}
{{--                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            @can('users-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <a--}}
{{--                        class="sidebar-link sidebar-title link-nav" href="/administrator/users">--}}
{{--                        <i class="fa-regular fa-user"></i>--}}
{{--                        <span>Khách hàng</span>--}}
{{--                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('chats-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <label style="color: #000000;background-color: #ffc500;"--}}
{{--                           class="badge badge-light-danger"></label>--}}
{{--                    <a--}}
{{--                        class="sidebar-link sidebar-title link-nav" href="/administrator/chats">--}}
{{--                        <i class="fa-regular fa-comment"></i>--}}
{{--                        <span>Chat</span>--}}
{{--                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            <li class="sidebar-list">--}}
{{--                <a class="sidebar-link sidebar-title" href="javascript:void(0)" data-bs-original-title="" title="">--}}
{{--                    <i class="fa-solid fa-scale-unbalanced-flip"></i>--}}
{{--                    <span class="">Bán hàng</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu" style="display: none;">--}}

{{--                    @can('job_emails-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/categories">--}}
{{--                                <i class="fa-solid fa-stairs"></i>--}}
{{--                                <span>Danh mục sản phẩm</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('products-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/products">--}}
{{--                                <i class="fa-solid fa-shapes"></i>--}}
{{--                                <span>Sản phẩm</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('orders-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/orders">--}}
{{--                                <i class="fa-solid fa-file-invoice"></i>--}}
{{--                                <span>Đơn hàng</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('vouchers-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/vouchers">--}}
{{--                                <i class="fa-solid fa-percent"></i>--}}
{{--                                <span>Mã giảm giá</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('product_comments-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/product-comments">--}}
{{--                                <i class="fa-solid fa-percent"></i>--}}
{{--                                <span>Bình luận sản phẩm</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('flash_sales-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/flash-sales">--}}
{{--                                <i class="fa-solid fa-percent"></i>--}}
{{--                                <span>FlashSale</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                </ul>--}}
{{--            </li>--}}

{{--            @can('user_transactions-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <a class="sidebar-link sidebar-title" href="javascript:void(0)" data-bs-original-title="" title="">--}}
{{--                        <i class="fa-solid fa-money-bill-transfer"></i>--}}
{{--                        <span class="">Giao dịch</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sidebar-submenu" style="display: none;">--}}

{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/user-transactions">--}}
{{--                                <i class="fa-solid fa-money-bill-transfer"></i>--}}
{{--                                <span>Giao dịch khách</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/user-points">--}}
{{--                                <i class="fa-regular fa-star"></i>--}}
{{--                                <span>Điểm</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/banks">--}}
{{--                                <i class="fa-solid fa-building-columns"></i>--}}
{{--                                <span>Ngân hàng</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/bank-cash-ins">--}}
{{--                                <i class="fa-solid fa-wallet"></i>--}}
{{--                                <span>Ngân hàng nạp tiền</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('memberships-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <a--}}
{{--                        class="sidebar-link sidebar-title link-nav"--}}
{{--                        href="/administrator/memberships">--}}
{{--                        <i class="fa-regular fa-star"></i>--}}
{{--                        <span>Hạng thành viên</span>--}}
{{--                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            <li class="sidebar-list">--}}
{{--                <a class="sidebar-link sidebar-title" href="javascript:void(0)" data-bs-original-title="" title="">--}}
{{--                    <i class="fas fa-thin fa-bell"></i>--}}
{{--                    <span class="">Email và thông báo</span>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu" style="display: none;">--}}

{{--                    @can('job_emails-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/job-emails">--}}
{{--                                <i class="fas fa-thin fa-envelope"></i>--}}
{{--                                <span>Gửi Email</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('job_notifications-list')--}}
{{--                        <li class="sidebar-list">--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/job-notifications">--}}
{{--                                <i class="fas fa-light fa-clock"></i>--}}
{{--                                <span>Gửi thông báo</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                </ul>--}}
{{--            </li>--}}


{{--            <li class="sidebar-list">--}}
{{--                <a class="sidebar-link sidebar-title" href="javascript:void(0)" data-bs-original-title="" title="">--}}
{{--                    <i class="fas fa-solid fa-ruler-combined"></i>--}}
{{--                    <span class="">Phân quyền</span>--}}
{{--                    <div class="according-menu"><i class="fas fa fa-angle-right"></i></div>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu" style="display: none;">--}}
{{--                    @can('employees-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/employees">--}}
{{--                                <i class="fas fa-sharp fa-solid fa-person"></i>--}}
{{--                                <span>Nhân viên</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('roles-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav" href="/administrator/roles">--}}
{{--                                <i class="fas fa-regular fa-pen-ruler"></i>--}}
{{--                                <span>Vai trò</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class="sidebar-list">--}}
{{--                <a class="sidebar-link sidebar-title" href="javascript:void(0)" data-bs-original-title="" title="">--}}
{{--                    <i class="fas fa-solid fa-file-pen"></i>--}}
{{--                    <span class="">Nội dung</span>--}}
{{--                    <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu" style="display: none;">--}}

{{--                    @can('sliders-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav" href="/administrator/sliders">--}}
{{--                                <i class="fa-solid fa-sliders"></i>--}}
{{--                                <span>Slider</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('sliders-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav" href="/administrator/system-branches">--}}
{{--                                <i class="fa-solid fa-code-branch"></i>--}}
{{--                                <span>Hệ thống cửa hàng</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('logos-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav" href="/administrator/logos">--}}
{{--                                <i class="fa-brands fa-laravel"></i>--}}
{{--                                <span>Logo</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('news-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/category-news">--}}
{{--                                <i class="fa-solid fa-earth-oceania"></i>--}}
{{--                                <span>Danh mục tin tức</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('news-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav"--}}
{{--                                href="/administrator/news">--}}
{{--                                <i class="fa-regular fa-newspaper"></i>--}}
{{--                                <span>Tin tức</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                </ul>--}}
{{--            </li>--}}

{{--            @can('medias-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <a--}}
{{--                        class="sidebar-link sidebar-title link-nav" href="/administrator/medias">--}}
{{--                        <i class="fa-regular fa-folder-open"></i>--}}
{{--                        <span>Quản lý file</span>--}}
{{--                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('medias-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <a--}}
{{--                        class="sidebar-link sidebar-title link-nav" href="/administrator/payment-methods">--}}
{{--                        <i class="fa-regular fa-credit-card"></i>--}}
{{--                        <span>Quản lý thanh toán</span>--}}
{{--                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            <li class="sidebar-list">--}}
{{--                <a class="sidebar-link sidebar-title" href="javascript:void(0)" data-bs-original-title="" title="">--}}
{{--                    <i class="fa-solid fa-gear"></i>--}}
{{--                    <span class="">Cài đặt</span>--}}
{{--                    <div class="according-menu"><i class="fa fa-angle-right"></i>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <ul class="sidebar-submenu" style="display: none;">--}}

{{--                    @can('settings-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav" href="/administrator/settings/edit/1">--}}
{{--                                <span>Cài đặt chung</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                    @can('shipping_methods-list')--}}
{{--                        <li>--}}
{{--                            <a--}}
{{--                                class="sidebar-link sidebar-title link-nav" href="/administrator/shipping-methods">--}}
{{--                                <span>Phương thức vận chuyển</span>--}}
{{--                                <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endcan--}}

{{--                </ul>--}}
{{--            </li>--}}

{{--            @can('history_datas-list')--}}
{{--                <li class="sidebar-list">--}}
{{--                    <a--}}
{{--                        class="sidebar-link sidebar-title link-nav"--}}
{{--                        href="/administrator/history-datas">--}}
{{--                        <i class="fas fa-solid fa-database"></i>--}}
{{--                        <span>Lịch sử dữ liệu</span>--}}
{{--                        <div class="according-menu"><i class="fa fa-angle-right"></i></div>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--        </ul>--}}
{{--    </div>--}}
{{--    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>--}}
{{--</nav>--}}
