<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{

    public function setGateAndPolicyAccess(){
        $this->defineGateUser();
        $this->defineGateChat();
        $this->defineGateEmployee();
        $this->defineGateRole();
        $this->defineGatePermission();
        $this->defineGateLogo();
        $this->defineGateHistoryData();
        $this->defineGateSlider();
        $this->defineGateNews();
        $this->defineGateProduct();
        $this->defineGateCategory();
        $this->defineGateDashboard();
        $this->defineGateSetting();
        $this->defineGateJobEmail();
        $this->defineGateJobNotification();
        $this->defineGateCategoryNews();
        $this->defineGateSystemBranches();
        $this->defineGateSystemQuotations();
        $this->defineGateCalendars();
        $this->defineGateOrders();
        $this->defineGateVouchers();
        $this->defineGateMedias();
        $this->defineGatePaymentMethods();
        $this->defineGateUserTransactions();
        $this->defineGateUserPoints();
        $this->defineGateBanks();
        $this->defineGateBankCashIns();
        $this->defineGateMemberships();
        $this->defineGateShippingMethods();
        $this->defineGateProductComments();
        $this->defineGateFlashSales();
    }
    public function defineGateFlashSales(){
        Gate::define('flash_sales-list','App\Policies\FlashSalePolicy@view');
        Gate::define('flash_sales-add','App\Policies\FlashSalePolicy@create');
        Gate::define('flash_sales-edit','App\Policies\FlashSalePolicy@update');
        Gate::define('flash_sales-delete','App\Policies\FlashSalePolicy@delete');
    }

    public function defineGateProductComments(){
        Gate::define('product_comments-list','App\Policies\ProductCommentPolicy@view');
        Gate::define('product_comments-add','App\Policies\ProductCommentPolicy@create');
        Gate::define('product_comments-edit','App\Policies\ProductCommentPolicy@update');
        Gate::define('product_comments-delete','App\Policies\ProductCommentPolicy@delete');
    }

    public function defineGateShippingMethods(){
        Gate::define('shipping_methods-list','App\Policies\ShippingMethodPolicy@view');
        Gate::define('shipping_methods-add','App\Policies\ShippingMethodPolicy@create');
        Gate::define('shipping_methods-edit','App\Policies\ShippingMethodPolicy@update');
        Gate::define('shipping_methods-delete','App\Policies\ShippingMethodPolicy@delete');
    }

    public function defineGateMemberships(){
        Gate::define('memberships-list','App\Policies\MembershipPolicy@view');
        Gate::define('memberships-add','App\Policies\MembershipPolicy@create');
        Gate::define('memberships-edit','App\Policies\MembershipPolicy@update');
        Gate::define('memberships-delete','App\Policies\MembershipPolicy@delete');
    }

    public function defineGateBankCashIns(){
        Gate::define('bank_cash_ins-list','App\Policies\BankCashInPolicy@view');
        Gate::define('bank_cash_ins-add','App\Policies\BankCashInPolicy@create');
        Gate::define('bank_cash_ins-edit','App\Policies\BankCashInPolicy@update');
        Gate::define('bank_cash_ins-delete','App\Policies\BankCashInPolicy@delete');
    }

    public function defineGateBanks(){
        Gate::define('banks-list','App\Policies\BankPolicy@view');
        Gate::define('banks-add','App\Policies\BankPolicy@create');
        Gate::define('banks-edit','App\Policies\BankPolicy@update');
        Gate::define('banks-delete','App\Policies\BankPolicy@delete');
    }

    public function defineGateUserPoints(){
        Gate::define('user_points-list','App\Policies\UserPointPolicy@view');
        Gate::define('user_points-add','App\Policies\UserPointPolicy@create');
        Gate::define('user_points-edit','App\Policies\UserPointPolicy@update');
        Gate::define('user_points-delete','App\Policies\UserPointPolicy@delete');
    }

    public function defineGateUserTransactions(){
        Gate::define('user_transactions-list','App\Policies\UserTransactionPolicy@view');
        Gate::define('user_transactions-add','App\Policies\UserTransactionPolicy@create');
        Gate::define('user_transactions-edit','App\Policies\UserTransactionPolicy@update');
        Gate::define('user_transactions-delete','App\Policies\UserTransactionPolicy@delete');
    }

    public function defineGatePaymentMethods(){
        Gate::define('payment_methods-list','App\Policies\PaymentMethodPolicy@view');
        Gate::define('payment_methods-add','App\Policies\PaymentMethodPolicy@create');
        Gate::define('payment_methods-edit','App\Policies\PaymentMethodPolicy@update');
        Gate::define('payment_methods-delete','App\Policies\PaymentMethodPolicy@delete');
    }

    public function defineGateMedias(){
        Gate::define('medias-list','App\Policies\MediaPolicy@view');
        Gate::define('medias-add','App\Policies\MediaPolicy@create');
        Gate::define('medias-edit','App\Policies\MediaPolicy@update');
        Gate::define('medias-delete','App\Policies\MediaPolicy@delete');
    }

    public function defineGateJobNotification(){
        Gate::define('job_notifications-list','App\Policies\JobNotificationPolicy@view');
        Gate::define('job_notifications-add','App\Policies\JobNotificationPolicy@create');
        Gate::define('job_notifications-edit','App\Policies\JobNotificationPolicy@update');
        Gate::define('job_notifications-delete','App\Policies\JobNotificationPolicy@delete');
    }

    public function defineGateJobEmail(){
        Gate::define('job_emails-list','App\Policies\JobEmailPolicy@view');
        Gate::define('job_emails-add','App\Policies\JobEmailPolicy@create');
        Gate::define('job_emails-edit','App\Policies\JobEmailPolicy@update');
        Gate::define('job_emails-delete','App\Policies\JobEmailPolicy@delete');
    }

    public function defineGateSetting(){
        Gate::define('settings-list','App\Policies\SettingPolicy@view');
        Gate::define('settings-add','App\Policies\SettingPolicy@create');
        Gate::define('settings-edit','App\Policies\SettingPolicy@update');
        Gate::define('settings-delete','App\Policies\SettingPolicy@delete');
    }

    public function defineGateDashboard(){
        Gate::define('dashboard-list','App\Policies\DashboardPolicy@view');
        Gate::define('dashboard-add','App\Policies\DashboardPolicy@create');
        Gate::define('dashboard-edit','App\Policies\DashboardPolicy@update');
        Gate::define('dashboard-delete','App\Policies\DashboardPolicy@delete');
    }

    public function defineGateCategory(){
        Gate::define('categories-list','App\Policies\CategoryPolicy@view');
        Gate::define('categories-add','App\Policies\CategoryPolicy@create');
        Gate::define('categories-edit','App\Policies\CategoryPolicy@update');
        Gate::define('categories-delete','App\Policies\CategoryPolicy@delete');
    }

    public function defineGateProduct(){
        Gate::define('products-list','App\Policies\ProductPolicy@view');
        Gate::define('products-add','App\Policies\ProductPolicy@create');
        Gate::define('products-edit','App\Policies\ProductPolicy@update');
        Gate::define('products-delete','App\Policies\ProductPolicy@delete');
    }

    public function defineGateNews(){
        Gate::define('news-list','App\Policies\NewsPolicy@view');
        Gate::define('news-add','App\Policies\NewsPolicy@create');
        Gate::define('news-edit','App\Policies\NewsPolicy@update');
        Gate::define('news-delete','App\Policies\NewsPolicy@delete');
    }

    public function defineGateSlider(){
        Gate::define('sliders-list','App\Policies\SliderPolicy@view');
        Gate::define('sliders-add','App\Policies\SliderPolicy@create');
        Gate::define('sliders-edit','App\Policies\SliderPolicy@update');
        Gate::define('sliders-delete','App\Policies\SliderPolicy@delete');
    }

    public function defineGateUser(){
        Gate::define('users-list','App\Policies\UserPolicy@view');
        Gate::define('users-add','App\Policies\UserPolicy@create');
        Gate::define('users-edit','App\Policies\UserPolicy@update');
        Gate::define('users-delete','App\Policies\UserPolicy@delete');
    }

    public function defineGateChat(){
        Gate::define('chats-list','App\Policies\ChatPolicy@view');
        Gate::define('chats-add','App\Policies\ChatPolicy@create');
        Gate::define('chats-edit','App\Policies\ChatPolicy@update');
        Gate::define('chats-delete','App\Policies\ChatPolicy@delete');
    }

    public function defineGateEmployee(){
        Gate::define('employees-list','App\Policies\EmployeePolicy@view');
        Gate::define('employees-add','App\Policies\EmployeePolicy@create');
        Gate::define('employees-edit','App\Policies\EmployeePolicy@update');
        Gate::define('employees-delete','App\Policies\EmployeePolicy@delete');
    }

    public function defineGateRole(){
        Gate::define('roles-list','App\Policies\RolePolicy@view');
        Gate::define('roles-add','App\Policies\RolePolicy@create');
        Gate::define('roles-edit','App\Policies\RolePolicy@update');
        Gate::define('roles-delete','App\Policies\RolePolicy@delete');
    }

    public function defineGatePermission(){
        Gate::define('permissions-list','App\Policies\PermissionPolicy@view');
        Gate::define('permissions-add','App\Policies\PermissionPolicy@create');
        Gate::define('permissions-edit','App\Policies\PermissionPolicy@update');
        Gate::define('permissions-delete','App\Policies\PermissionPolicy@delete');
    }

    public function defineGateLogo(){
        Gate::define('logos-list','App\Policies\LogoPolicy@view');
        Gate::define('logos-add','App\Policies\LogoPolicy@create');
        Gate::define('logos-edit','App\Policies\LogoPolicy@update');
        Gate::define('logos-delete','App\Policies\LogoPolicy@delete');
    }

    public function defineGateHistoryData(){
        Gate::define('history_datas-list','App\Policies\HistoryDataPolicy@view');
        Gate::define('history_datas-add','App\Policies\HistoryDataPolicy@create');
        Gate::define('history_datas-edit','App\Policies\HistoryDataPolicy@update');
        Gate::define('history_datas-delete','App\Policies\HistoryDataPolicy@delete');
    }

    public function defineGateCategoryNews(){
        Gate::define('category_news-list','App\Policies\CategoryNewPolicy@view');
        Gate::define('category_news-add','App\Policies\CategoryNewPolicy@create');
        Gate::define('category_news-edit','App\Policies\CategoryNewPolicy@update');
        Gate::define('category_news-delete','App\Policies\CategoryNewPolicy@delete');
    }

    public function defineGateSystemBranches(){
        Gate::define('system_branches-list','App\Policies\SystemBranchPolicy@view');
        Gate::define('system_branches-add','App\Policies\SystemBranchPolicy@create');
        Gate::define('system_branches-edit','App\Policies\SystemBranchPolicy@update');
        Gate::define('system_branches-delete','App\Policies\SystemBranchPolicy@delete');
    }

    public function defineGateSystemQuotations(){
        Gate::define('quotations-list','App\Policies\QuotationPolicy@view');
        Gate::define('quotations-add','App\Policies\QuotationPolicy@create');
        Gate::define('quotations-edit','App\Policies\QuotationPolicy@update');
        Gate::define('quotations-delete','App\Policies\QuotationPolicy@delete');
    }

    public function defineGateCalendars(){
        Gate::define('calendars-list','App\Policies\CalendarsPolicy@view');
        Gate::define('calendars-add','App\Policies\CalendarsPolicy@create');
        Gate::define('calendars-edit','App\Policies\CalendarsPolicy@update');
        Gate::define('calendars-delete','App\Policies\CalendarsPolicy@delete');
    }

    public function defineGateOrders(){
        Gate::define('orders-list','App\Policies\OrderPolicy@view');
        Gate::define('orders-add','App\Policies\OrderPolicy@create');
        Gate::define('orders-edit','App\Policies\OrderPolicy@update');
        Gate::define('orders-delete','App\Policies\OrderPolicy@delete');
    }

    public function defineGateVouchers(){
        Gate::define('vouchers-list','App\Policies\VoucherPolicy@view');
        Gate::define('vouchers-add','App\Policies\VoucherPolicy@create');
        Gate::define('vouchers-edit','App\Policies\VoucherPolicy@update');
        Gate::define('vouchers-delete','App\Policies\VoucherPolicy@delete');
    }

}
