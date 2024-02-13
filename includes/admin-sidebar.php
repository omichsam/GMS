<nav>
    <ul class="metismenu" id="menu">
        <li class="<?php if ($page == 'dashboard') {
            echo 'active';
        } ?>"><a href="dashboard.php"><i class="ti-dashboard"></i> <span>Dashboard</span></a></li>

        <li class="<?php if ($page == 'employee') {
            echo 'active';
        } ?>"><a href="employees.php"><i class="ti-id-badge"></i>
                <span>Employee Section</span></a></li>



        <li class="<?php if ($page == 'department') {
            echo 'active';
        } ?>"><a href="department.php"><i class="fa fa-th-large"></i> <span>Department Section</span></a></li>

        <li class="<?php if ($page == 'office') {
            echo 'active';
        } ?>"><a href="office.php"><i class="fa fa-building-o"></i> <span>Office Section</span></a></li>

        <li class="<?php if ($page == 'Purpose') {
            echo 'active';
        } ?>"><a href="purpose-section.php"><i class="fa fa-tasks"></i> <span>Purpose Section</span></a></li>

        <li hidden class="<?php if ($page == 'leave') {
            echo 'active';
        } ?>"><a href="leave-section.php"><i class="fa fa-sign-out"></i> <span>Leave Types</span></a></li>

        <li hidden class="<?php if ($page == 'manage-leave') {
            echo 'active';
        } ?>">
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Manage Leave</span></a>

            <ul class="collapse">
                <li><a href="pending-history.php"><i class="fa fa-spinner"></i> Pending</a></li>
                <li><a href="approved-history.php"><i class="fa fa-check"></i> Approved</a></li>
                <li><a href="declined-history.php"><i class="fa fa-times-circle"></i> Declined</a></li>
                <li><a href="leave-history.php"><i class="fa fa-history"></i> Leave History</a></li>
            </ul>

        </li>

        <li class="<?php if ($page == 'visitor') {
            echo 'active';
        } ?>">
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Visitor
                    Section</span></a>

            <ul class="collapse">
                <li><a href="add-visitor.php"><i class="fa fa-spinner"></i> Add Visitor</a></li>
                <li><a href="add-visit.php"><i class="fa fa-spinner"></i> Register Visit</a></li>
                <li><a href="visitors.php"><i class="fa fa-check"></i> All Visitors</a></li>
                <li><a href="visits.php"><i class="fa fa-times-circle"></i> Logs</a></li>
                <!-- <li hidden><a href="leave-history.php"><i class="fa fa-history"></i> Leave History</a></li> -->
            </ul>

        </li>

        <li class="<?php if ($page == 'record') {
            echo 'active';
        } ?>" hidden>
            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-briefcase"></i><span>Records</span></a>

            <ul class="collapse">
                <li><a href="records.php"><i class="fa fa-spinner"></i> Record</a></li>
                <li hidden><a href="approved-history.php"><i class="fa fa-check"></i> Approved</a></li>
                <li hidden><a href="declined-history.php"><i class="fa fa-times-circle"></i> Declined</a></li>
                <li hidden><a href="leave-history.php"><i class="fa fa-history"></i> Leave History</a></li>
            </ul>

        </li>

        <li class="<?php if ($page == 'manage-admin') {
            echo 'active';
        } ?>"><a href="manage-admin.php"><i class="fa fa-lock"></i> <span>Manage Admin</span></a></li>

    </ul>
</nav>