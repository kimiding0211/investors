<!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.php" class="brand-link">
            <!--begin::Brand Image-->
            <!-- <img
              src="./assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            /> -->
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">昱泉投資人後台</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item <?php if($menu_overview == "index_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "index_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    首頁管理
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./banner.php" class="nav-link <?php if($unit_overview == 'banner'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>大圖輪播</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?php if($menu_overview == "news_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "news_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    最新消息
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./news_mark.php" class="nav-link <?php if($unit_overview == 'news_mark'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>分類管理</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="./news.php" class="nav-link <?php if($unit_overview == 'news'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>消息管理</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?php if($menu_overview == "introduction_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "introduction_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    公司簡介
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a href="./introduction.php" class="nav-link <?php if($unit_overview == 'introduction'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>基本資料</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./organization.php" class="nav-link <?php if($unit_overview == 'organization'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>組織架構</p>
                    </a>
                  </li>
                </ul>
              </li>  
              <li class="nav-item <?php if($menu_overview == "governance_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "governance_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    公司治理
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./director.php" class="nav-link <?php if($unit_overview == 'director'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>董事會</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./director_content.php" class="nav-link <?php if($unit_overview == 'director_content'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>董事會-文案</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./audit.php" class="nav-link <?php if($unit_overview == 'audit'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>審計委員會</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./audit_content.php" class="nav-link <?php if($unit_overview == 'audit_content'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>審計委員會-文案</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./remuneration.php" class="nav-link <?php if($unit_overview == 'remuneration'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>薪酬委員會</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./remuneration_content.php" class="nav-link <?php if($unit_overview == 'remuneration_content'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>薪酬委員會-文案</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./sustain_committee.php" class="nav-link <?php if($unit_overview == 'sustain_committee'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>永續發展委員會</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./sustain_committee_content.php" class="nav-link <?php if($unit_overview == 'sustain_committee_content'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>永續發展委員會-文案</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./company_regulations.php" class="nav-link <?php if($unit_overview == 'company_regulations'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>內部規章與治理機制</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./company_regulations_en.php" class="nav-link <?php if($unit_overview == 'company_regulations_en'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>內部規章與治理機制(英)</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./internal_audit.php" class="nav-link <?php if($unit_overview == 'internal_audit'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>風險管理與內部稽核</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?php if($menu_overview == "finance_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "finance_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    財務資訊
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./financial_statements.php" class="nav-link <?php if($unit_overview == 'financial_statements'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>財務報表</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./message.php" class="nav-link <?php if($unit_overview == 'message'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>重大訊息</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./conference.php" class="nav-link <?php if($unit_overview == 'conference'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>法人說明會資訊</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?php if($menu_overview == "stock_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "stock_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    股務資訊
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./shareholders_meeting.php" class="nav-link <?php if($unit_overview == 'shareholders_meeting'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>股東會</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./shareholders_meeting_en.php" class="nav-link <?php if($unit_overview == 'shareholders_meeting_en'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>股東會-英文</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./dividend.php" class="nav-link <?php if($unit_overview == 'dividend'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>股務作業</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item <?php if($menu_overview == "sustainable_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "sustainable_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    永續發展
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./sustainability_reports.php" class="nav-link <?php if($unit_overview == 'sustainability_reports'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>永續報告與發展政策</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./sustainability_reports_en.php" class="nav-link <?php if($unit_overview == 'sustainability_reports_en'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>永續報告與發展政策(英)</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./environmental_sustainability.php" class="nav-link <?php if($unit_overview == 'environmental_sustainability'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>環境永續和社會共榮</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./stakeholders.php" class="nav-link <?php if($unit_overview == 'stakeholders'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>利害人關係人專區</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php if($_SESSION['admin_permissions']=='admin'){ ?>
              <li class="nav-item">
                <a href="./admin_user.php" class="nav-link <?php if($unit_overview == 'admin_user'){echo 'active';} ?>">
                  <i class="nav-icon bi bi-circle"></i>
                  <p>用戶管理</p>
                </a>
              </li>
              <?php } ?>
              <?php if($_SESSION['admin_permissions']=='admin'){ ?>
              <li class="nav-item <?php if($menu_overview == "log_manage"){echo "menu-open";} ?>">
                <a href="#" class="nav-link <?php if($menu_overview == "log_manage"){echo "active";} ?>">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    系統紀錄
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./login_log.php" class="nav-link <?php if($unit_overview == 'login'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>使用者登入</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./ins_log.php" class="nav-link <?php if($unit_overview == 'ins'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>內容新增</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./edit_log.php" class="nav-link <?php if($unit_overview == 'edit'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>內容編輯</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./del_log.php" class="nav-link <?php if($unit_overview == 'del'){echo 'active';} ?>">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>內容刪除</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php } ?>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->