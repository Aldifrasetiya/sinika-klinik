<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img width="40" height="40" src="https://img.icons8.com/3d-fluency/94/user-male-circle.png"
                        alt="user-male-circle" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?= $_SESSION['username']; ?>
                            <span class="user-level">
                                <?= $_SESSION['role']; ?>
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="../dashboard/d_owner">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                    <!-- <div class="collapse" id="dashboard">
            <ul class="nav nav-collapse">
              <li>
                <a href="./../demo1/index.html">
                  <span class="sub-item">Dashboard 1</span>
                </a>
              </li>
            </ul>
          </div> -->
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pages</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../owner/m_data_pasien">
                                    <span class="sub-item">Data Pasien</span>
                                </a>
                            </li>
                            <li>
                                <a href="../owner/m_data_user">
                                    <span class="sub-item">Data Admin</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fa-solid fa-calendar"></i>
                        <p>Data Dokter</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../owner/m_dokter_umum">
                                    <span class="sub-item">Dokter Umum</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#obat">
                        <i class="fa-solid fa-kit-medical"></i>
                        <p>Data Obat</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="obat">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../owner/m_data_obat">
                                    <span class="sub-item">Obat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#report">
                        <i class="fa-regular fa-clipboard"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="report">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../owner/m_rekam_medis">
                                    <span class="sub-item">Rekam Medis</span>
                                </a>
                            </li>
                            <li>
                                <a href="../owner/m_riwayat_pasien">
                                    <span class="sub-item">Riwayat Pasien</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="mx-4 mt-2">
                    <a href="../../../backend/logout.php" class="btn btn-primary btn-block"><span
                            class="btn-label mr-2">
                        </span>Log Out</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->