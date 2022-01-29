<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="margin-top: 124px; background-color: #3B3838;">

    <!-- Sidebar -->
    <div class="sidebar" style="position: relative;">
        <a href="#">
            <div class="text-center mt-4">
                <img src="<?= base_url('assets/templates') ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="" style="opacity: .8;height: 80px !important;">
            </div>
            <h5 class="text-center mt-3 text-white"><span style="font-size: 16px;">RICHO MAULAND</span><br>
                <span style="font-size: 14px;"><?= $user_divisi; ?></span>
        </a>
        <?php if ($user_divisi = 'CT-HSE') : ?>
            <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item" style="background-color: #2B7B70;">
                        <a href="<?= base_url('') ?>index.php/home/input_risk_register" class="nav-link" style="text-align: center;">
                            <p>
                                INPUT NEW RISK REGISTER
                            </p>
                        </a>
                    </li><br />
                    <li class="nav-item" style="background-color: #4D7090;">
                        <a href="#" class="nav-link" style="text-align: center;">
                            <p>
                                PROGRAM MANAGEMENT PLANNING
                            </p>
                        </a>
                    </li><br />
                    <li class="nav-item" style="background-color: #984242;">
                        <a href="risk_management_dashboard_risk_management_perf.html" class="nav-link" style="text-align: center;">
                            <p>
                                RISK MANAGEMENT PERFORMANCE
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php else : ?>
        <?php endif; ?>
    </div>
    <!-- /.sidebar -->
</aside>