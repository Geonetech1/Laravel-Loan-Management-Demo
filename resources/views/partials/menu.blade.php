<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <select class="searchable-field form-control">

                </select>
            </li>
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_alert_access')
                            <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.user-alerts.index") }}">
                                    <i class="fa-fw fas fa-bell">

                                    </i>
                                    <span>{{ trans('cruds.userAlert.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="{{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                <a href="{{ route("admin.audit-logs.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.auditLog.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('contract_access')
                <li class="{{ request()->is("admin/contracts") || request()->is("admin/contracts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.contracts.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.contract.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('status_access')
                <li class="{{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "active" : "" }}">
                    <a href="{{ route("admin.statuses.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.status.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('nda_access')
                <li class="{{ request()->is("admin/ndas") || request()->is("admin/ndas/*") ? "active" : "" }}">
                    <a href="{{ route("admin.ndas.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.nda.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('comment_access')
                <li class="{{ request()->is("admin/comments") || request()->is("admin/comments/*") ? "active" : "" }}">
                    <a href="{{ route("admin.comments.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.comment.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('license_access')
                <li class="{{ request()->is("admin/licenses") || request()->is("admin/licenses/*") ? "active" : "" }}">
                    <a href="{{ route("admin.licenses.index") }}">
                        <i class="fa-fw fas fa-cogs">

                        </i>
                        <span>{{ trans('cruds.license.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('client_management_setting_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-cog">

                        </i>
                        <span>{{ trans('cruds.clientManagementSetting.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('currency_access')
                            <li class="{{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.currencies.index") }}">
                                    <i class="fa-fw fas fa-money-bill">

                                    </i>
                                    <span>{{ trans('cruds.currency.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('transaction_type_access')
                            <li class="{{ request()->is("admin/transaction-types") || request()->is("admin/transaction-types/*") ? "active" : "" }}">
                                <a href="{{ route("admin.transaction-types.index") }}">
                                    <i class="fa-fw fas fa-money-check">

                                    </i>
                                    <span>{{ trans('cruds.transactionType.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_source_access')
                            <li class="{{ request()->is("admin/income-sources") || request()->is("admin/income-sources/*") ? "active" : "" }}">
                                <a href="{{ route("admin.income-sources.index") }}">
                                    <i class="fa-fw fas fa-database">

                                    </i>
                                    <span>{{ trans('cruds.incomeSource.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_status_access')
                            <li class="{{ request()->is("admin/client-statuses") || request()->is("admin/client-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.client-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.clientStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('project_status_access')
                            <li class="{{ request()->is("admin/project-statuses") || request()->is("admin/project-statuses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.project-statuses.index") }}">
                                    <i class="fa-fw fas fa-server">

                                    </i>
                                    <span>{{ trans('cruds.projectStatus.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('client_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-briefcase">

                        </i>
                        <span>{{ trans('cruds.clientManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('client_access')
                            <li class="{{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "active" : "" }}">
                                <a href="{{ route("admin.clients.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.client.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('project_access')
                            <li class="{{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "active" : "" }}">
                                <a href="{{ route("admin.projects.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.project.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('note_access')
                            <li class="{{ request()->is("admin/notes") || request()->is("admin/notes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.notes.index") }}">
                                    <i class="fa-fw fas fa-sticky-note">

                                    </i>
                                    <span>{{ trans('cruds.note.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('document_access')
                            <li class="{{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "active" : "" }}">
                                <a href="{{ route("admin.documents.index") }}">
                                    <i class="fa-fw fas fa-file-alt">

                                    </i>
                                    <span>{{ trans('cruds.document.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('transaction_access')
                            <li class="{{ request()->is("admin/transactions") || request()->is("admin/transactions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.transactions.index") }}">
                                    <i class="fa-fw fas fa-credit-card">

                                    </i>
                                    <span>{{ trans('cruds.transaction.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('client_report_access')
                            <li class="{{ request()->is("admin/client-reports") || request()->is("admin/client-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.client-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.clientReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('vendor_access')
                            <li class="{{ request()->is("admin/vendors") || request()->is("admin/vendors/*") ? "active" : "" }}">
                                <a href="{{ route("admin.vendors.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.vendor.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                        <a href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>
    </section>
</aside>