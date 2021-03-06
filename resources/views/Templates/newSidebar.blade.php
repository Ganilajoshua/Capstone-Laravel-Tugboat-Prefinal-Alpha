        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                @if(Auth::user()->enumUserType == 'Admin')
                    <div class="sidebar-brand">
                        <a href="/administrator/dashboard">Administrator</a>
                    </div>
                @elseif( Auth::user()->enumUserType == 'Affiliates')
                    <div class="sidebar-brand">
                        <a href="/affilates/dashboard">Affiliates</a>
                    </div>
                @endif
                <div class="sidebar-user">
                    <div class="sidebar-user-picture">
                        <img alt="image" src="/others/stisla_admin_v1.0.0/dist/img/avatar/avatar-5.jpeg">
                    </div>
                    <div class="sidebar-user-details">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        {{-- <div class="user-name">John Carlos Pagaduan</div> --}}
                        @if( Auth::user()->enumUserType == 'Admin')
                            <div class="user-role">
                                Administrator
                            </div>
                        @elseif( Auth::user()->enumUserType == 'Affiliates')
                            <div class="user-role">
                                Affiliates
                            </div>
                        @endif
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li id="dashboardMenu">
                        <a href="/administrator/dashboard"><i class="ion ion-speedometer"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">Main Navigation</li>
                    <li id="maintenanceTree">
                        <a href="#" class="has-dropdown"><i class="fas fa-cog"></i><span>Maintenance</span></a>
                        <ul class="menu-dropdown">
                            @if(Auth::user()->enumUserType == 'Admin')
                                <li id="pierMenu"><a href="/administrator/maintenance/pier"><i class="fas fa-life-ring"></i> Pier</a></li>
                                <li id="berthMenu"><a href="/administrator/maintenance/berth"><i class="fas fa-life-ring"></i>Berth</a></li>
                                <li id="positionMenu"><a href="/administrator/maintenance/position"><i class="fas fa-sitemap"></i>Position</a></li>
                                <li id="employeesMenu"><a href="/administrator/maintenance/employees"><i class="ion ion-person"></i> Employee</a></li>
                                <li id="goodsMenu"><a href="/administrator/maintenance/goods"><i class="fas fa-cube"></i>Goods</a></li>
                                <li id="tugboatTypeMenu"><a href="/administrator/maintenance/tugboattype"><i class="ion ion-android-boat"></i>Tugboat Type</a></li>
                                <li id="tugboatMenu"><a href="/administrator/maintenance/tugboat"><i class="ion ion-android-boat"></i>Tugboats</a></li>
                                <li id="vesselTypeMenu"><a href="/administrator/maintenance/vesseltype"><i class="ion ion-android-boat"></i>Vessel Type</a></li>
                            @elseif(Auth::user()->enumUserType == 'Affiliates')
                                <li id="positionMenu"><a href="/affiliates/maintenance/position"><i class="fas fa-sitemap"></i>Position</a></li>
                                <li id="employeesMenu"><a href="/affiliates/maintenance/employees"><i class="ion ion-person"></i> Employee</a></li>
                                <li id="tugboatMenu"><a href="/affiliates/maintenance/tugboat"><i class="ion ion-android-boat"></i>Tugboats</a></li>
                            @endif
                                <!--<li id="equipmentsMenu"><a href="/equipment"><i class="fas fa-anchor"></i> Equipment</a></li>-->
                                {{-- <li id="insurancesMenu"><a href="/administrator/maintenance/insurances"><i class="ion ion-medkit"></i>Insurances</a></li> --}}
                                {{-- <li id="standardMenu"><a href="/administrator/maintenance/standard"><i class="fas fa-life-ring"></i>Standard Rates</a></li>
                                <li id="termsconditionMenu"><a href="/administrator/maintenance/termsandcondition"><i class="fas fa-life-ring"></i>Terms and Conditions</a></li>
                                <li id="agreementsMenu"><a href="/administrator/maintenance/agreements"><i class="ion ion-android-document"></i>Agreements</a></li>
                                {{-- <li id="usertypeMenu"><a href="/administrator/maintenance/usertype"><i class="ion ion-person-stalker"></i>User Type</a></li> --}}
                            {{-- @elseif(Auth::user()->enumUserType == 'Affiliates')
                                <li id="positionMenu"><a href="/administrator/maintenance/position"><i class="fas fa-sitemap"></i>Position</a></li>
                                <li id="employeesMenu"><a href="/administrator/maintenance/employees"><i class="ion ion-person"></i> Employee</a></li>
                            @endif --}}
                        </ul>
                    </li>
                    <li id="transactionTree">
                        <a href="#" class="has-dropdown"><i class="fas fa-tasks"></i><span>Transactions</span></a>
                        @if(Auth::user()->enumUserType == 'Admin')
                            <ul class="menu-dropdown">
                                <li id="tConsignee"><a href="#" class="has-dropdown"><i class="ion ion-android-people"></i>Consignee</a>
                                    <ul class="menu-dropdown">
                                        <li id="activeconsigneeMenu"><a href="/administrator/transactions/consignee"><i class="ion ion-document-text"></i>Consignee Accounts</a></li>
                                        <li id="contractRequestsMenu"><a href="/administrator/transactions/contractrequests"><i class="ion ion-document-text"></i>Contract Requests</a></li>
                                        <li id="contractsMenu"><a href="/administrator/transactions/contracts"><i class="ion ion-ios-paper"></i>Contracts</a></li>
                                    </ul>
                                </li>
                                <li id="tDispatch"><a href="#" class="has-dropdown waves-effect"><i class="ion ion-android-boat"></i>Dispatch &amp; Hauling</a>
                                    <ul class="menu-dropdown">
                                        <li id="menuForwardReq"><a href="/administrator/transactions/forwardrequests"><i class="ion-ios-upload"></i>Forward Requests</a></li>
                                        <li id="menuJobOrder"><a class="waves-effect" href="/administrator/transactions/dispatchandhauling/joborders"><i class="ion ion-ios-list"></i>Job Order</a></li>
                                        <li id="menuTugboatAssignment"><a class="waves-effect" href="/administrator/transactions/dispatchandhauling/tugboatassignment"><i class="ion ion-android-boat"></i>Tugboat Assignment</a></li>
                                        <li id="menuTeamBuilder"><a class="waves-effect" href="/administrator/transactions/dispatchandhauling/teamassignment"><i class="ion ion-ios-people"></i>Team Builder</a></li>
                                        <li id="menuScheduling"><a href="/administrator/transactions/scheduling"><i class="fas fa-calendar-alt"></i>Schedule</a></li>
                                        <li id="menuHauling"><a href="/administrator/transactions/dispatchandhauling/hauling"><i class="fas fa-link"></i>Hauling</a></li>
                                        
                                        {{-- <li id="menuScheduling"><a class="waves-effect" href=""><i class="ion ion-ios-time"></i>Scheduling</a></li> --}}
                                    </ul>
                                </li>
                                <li id="tPaymentBilling"><a href="#" class="has-dropdown waves-effect"><i class="fas fa-money-bill-alt"></i>Payment &amp; Billing</a>
                                    <ul class="menu-dropdown">
                                        <li id="menuDispatchTicket"><a href="/administrator/transactions/dispatchticket"><i class="fas fa-ticket-alt"></i>Dispatch Ticket</a></li>
                                        <li id="menuInvoice"><a href="/administrator/transactions/invoice"><i class="ion ion-ios-list"></i>Invoice</a></li>
                                        <li id="menuPayment"><a href="/administrator/transactions/payment"><i class="ion ion-cash"></i>Payment</a></li>
                                    </ul>
                                </li>
                                {{-- <li id="menuDispatchTicket"><a href="/administrator/transactions/dispatchticket"><i class="fas fa-ticket-alt"></i>Dispatch Ticket</a></li>
                                <li id="menuInvoice"><a href="buttons.html"><i class="ion ion-ios-list"></i>Invoice</a></li>
                                <li id="menuPayment"><a href="buttons.html"><i class="ion ion-cash"></i>Payment &amp; Billing</a></li> --}}
                            </ul>
                        @elseif(Auth::user()->enumUserType == 'Affiliates')
                            <ul id="tDispatch" class="menu-dropdown">
                                <li><a href="#" class="has-dropdown waves-effect"><i class="ion ion-android-boat"></i>Dispatch &amp; Hauling</a>
                                    <ul class="menu-dropdown">
                                        <li class="menuForwardReq"><a href="/administrator/transactions/forwardrequests"><i class="ion-ios-upload"></i>Forward Requests</a></li>
                                        <li class="menuJobOrder"><a class="waves-effect" href="/affiliates/transactions/dispatchandhauling/joborders"><i class="ion ion-ios-list"></i>Job Order</a></li>
                                        <li class="menuTugboatAssignment"><a class="waves-effect" href="/affiliates/transactions/tugboatassignment"><i class="ion ion-android-boat"></i>Tugboat Assignment</a></li>
                                        <li class="menuTeamBuilder"><a class="waves-effect" href="/affiliates/transactions/dispatchandhauling/teamassignment"><i class="ion ion-ios-people"></i>Team Builder</a></li>
                                        <li class="menuScheduling"><a href="/administrator/transactions/scheduling"><i class="fas fa-calendar-alt"></i>Schedule</a></li>
                                        <li class="menuHauling"><a href="/administrator/transactions/dispatchandhauling/hauling"><i class="fas fa-link"></i>Hauling</a></li>
                                        {{-- <li id="menuScheduling"><a class="waves-effect" href=""><i class="ion ion-ios-time"></i>Scheduling</a></li> --}}
                                    </ul>
                                </li>
                                {{-- <li id="menuScheduling"><a href="/administrator/transactions/scheduling"><i class="fas fa-calendar-alt"></i>Schedule</a></li>
                                <li id="menuDispatchTicket"><a href="general.html"><i class="fas fa-ticket-alt"></i>Dispatch Ticket</a></li>
                                <li id="menuInvoice"><a href="buttons.html"><i class="ion ion-ios-list"></i>Invoice</a></li>
                                <li id="menuPayment"><a href="buttons.html"><i class="ion ion-cash"></i>Payment &amp; Billing</a></li> --}}
                                {{-- <li id=""><a href="toastr.html"><i class="ion ion-clipboard"></i>Job Order</a></li> --}}
                            </ul>
                        @endif
                    </li>
                    <li id="queriesTree">
                        <a href="/administrator/queries" ><i class="fas fa-database"></i><span>Queries</span></a>
                    </li>
                    <li id="reportsTree">
                        <a href="/administrator/reports" ><i class="fas fa-chart-bar"></i><span>Reports</span></a>
                    </li>
                    <li id="utilitiesTree">
                        <a href="#" class="has-dropdown"><i class="fas fa-wrench"></i><span>Utilities</span></a>
                        <ul class="menu-dropdown">
                            {{-- <li><a href="/contracts"><i class="ion ion-ios-paper"></i> Contracts</a></li> --}}
                            <li id="menuTugboatMatrix"><a href="/contracts"><i class="fas fa-table"></i> Tugboat Matrix</a></li>
                            <li id="menuContractFeesMatrix"><a href="/administrator/utilities/contractfeesmatrix"><i class="fas fa-money-bill-alt"></i> Contract Fees Matrix</a></li>
                            <li id="menuTeamComp"><a href="/administrator/utilities/teamcomposition"><i class="fas fa-users"></i> Team Composition</a></li>
                            <li id="menuTermsCondition"><a href="/administrator/utilities/termscondition"><i class="ion ion-ios-list"></i> Terms and Condition</a></li>
                        </ul>
                    </li>
                    {{-- if --}}
                    <li>
                        <a id="logout" onclick="event.preventDefault(); document.getElementById('logout-form-admin').submit();"href="/administrator/logout"><i class="ion ion-log-out"></i><span>Logout</span></a>
                    </li>
                    <form id="logout-form-admin" action="/administrator/Adminlogout" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </ul>
            </aside>
        </div>