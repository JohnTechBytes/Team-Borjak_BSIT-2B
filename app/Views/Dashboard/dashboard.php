<style>
    .pulse-dot-inline {
        height: 12px;
        width: 12px;
        background-color: #28a745;
        border-radius: 50%;
        display: inline-block;
        animation: pulse-sm 2s infinite;
    }

    @keyframes pulse-sm {
        0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); }
        70% { box-shadow: 0 0 0 6px rgba(40, 167, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
    }

    .fade-in-up {
        animation: fadeInUp 0.5s ease-in-out;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<?= $this->extend('theme/template') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner"><h3>150</h3><p>New Orders</p></div>
                        <div class="icon"><i class="ion ion-bag"></i></div>
                        <a href="<?= base_url('dashboard/new-orders') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner"><h3>53<sup style="font-size: 20px">%</sup></h3><p>Bounce Rate</p></div>
                        <div class="icon"><i class="ion ion-stats-bars"></i></div>
                        <a href="<?= base_url('dashboard/bounce-rate') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner"><h3>44</h3><p>User Registrations</p></div>
                        <div class="icon"><i class="ion ion-person-add"></i></div>
                        <a href="<?= base_url('dashboard/user-registrations') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner"><h3>65</h3><p>Unique Visitors</p></div>
                        <div class="icon"><i class="ion ion-pie-graph"></i></div>
                        <a href="<?= base_url('dashboard/unique-visitors') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row fade-in-up d-flex align-items-stretch">
                <div class="col-md-8">
                    <div class="card card-outline card-primary shadow-sm h-100 mb-0">
                        <div class="card-header">
                            <h3 class="card-title font-weight-bold"><i class="fas fa-history mr-1"></i> Recent Activity</h3>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-sm table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentLogs as $log): ?>
                                    <tr>
                                        <td><?= esc($log['USER_NAME']) ?></td>
                                        <td><span class="badge badge-light"><?= esc($log['ACTION']) ?></span></td>
                                        <td class="text-muted small"><?= $log['TIMELOG'] ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= base_url('log/index') ?>">View All Logs <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-dark text-white shadow-sm h-100 mb-0">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="text-info font-weight-bold" id="greeting">Good Day!</h5>
                            <div class="d-flex align-items-center py-2">
                                <i class="fas fa-clock fa-2x text-warning mr-3" id="clock-icon"></i>
                                <div>
                                    <h2 class="mb-0 font-weight-bold" id="live-clock">00:00:00</h2>
                                    <div class="small text-uppercase text-muted" id="live-date">Loading date...</div>
                                </div>
                            </div>
                            
                            <hr style="border-top: 1px solid rgba(255,255,255,0.1);">

                            <p class="small mb-2">
                                <i class="fas fa-map-marker-alt text-danger"></i> 
                                System localized to: <strong>Philippines</strong>
                            </p>

                            <div class="d-flex align-items-center">
                                <span class="pulse-dot-inline mr-2"></span>
                                <strong class="<?= $status_class ?? 'text-success' ?> mr-1">
                                    <?= $server_status ?? 'Optimal' ?>
                                </strong>
                                <span class="small text-muted">(<?= isset($db_latency) ? round($db_latency, 2) : '0' ?>ms)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> </div>
    </section>
</div>

<script>
    function updateClock() {
        const now = new Date();
        
        // 1. Update Time
        const timeOptions = { timeZone: 'Asia/Manila', hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' };
        document.getElementById('live-clock').textContent = now.toLocaleTimeString('en-US', timeOptions);

        // 2. Update Date
        const dateOptions = { timeZone: 'Asia/Manila', weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('live-date').textContent = now.toLocaleDateString('en-US', dateOptions);

        // 3. Update Greeting
        const hour = now.getHours();
        let greeting = "Good Day!";
        if (hour < 12) greeting = "Good Morning!";
        else if (hour < 18) greeting = "Good Afternoon!";
        else greeting = "Good Evening!";
        document.getElementById('greeting').textContent = greeting;

        // 4. Pulse the Icon
        const icon = document.getElementById('clock-icon');
        icon.style.opacity = (icon.style.opacity == 0.5) ? 1 : 0.5;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>
<?= $this->endSection() ?>