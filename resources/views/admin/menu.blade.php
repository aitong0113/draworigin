<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="./" class="brand-link">
      <!--begin::Brand Image-->
      <img
        src="./assets/img/AdminLTELogo.png"
        alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow" />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">AdminLTE 4</span>
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
        id="navigation">




        <li class="nav-item">
          <a href="/admin/member/list" class="nav-link{{ Request::is('admin/member/*') ? ' active' : '' }}">
            <i class="nav-icon bi-people-fill"></i>
            <p>會員管理</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/qa/list" class="nav-link{{ Request::is('admin/qa/*') ? ' active' : '' }}">
            <i class="nav-icon bi bi-chat-dots"></i>
            <p>Ｑ＆Ａ管理</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/admin/news/list" class="nav-link{{ Request::is('admin/news/*') ? ' active' : '' }}">
            <i class="nav-icon bi bi-chat-dots"></i>
            <p>插畫課程管理</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="/admin/news/list" class="nav-link{{ Request::is('admin/news/*') ? ' active' : '' }}">
            <i class="nav-icon bi bi-chat-dots"></i>
            <p>學員作品管理</p>
          </a>
        </li>




        <li class="nav-item{{ Request::is('admin/product/*') ? ' menu-open' : '' }}">
          <a href="#" class="nav-link{{ Request::is('admin/product/*') ? ' active' : '' }}">
            <i class="nav-icon bi-briefcase"></i>
            <p>
              營業項目
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/admin/product/layer/list" class="nav-link{{ Request::is('admin/product/layer/*') ? ' active' : '' }}">
                <i class="nav-icon bi-diagram-3"></i>
                <p>類別管理</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/product/color/list" class="nav-link{{ Request::is('admin/product/color/*') ? ' active' : '' }}">
                <i class="nav-icon bi-palette"></i>
                <p>色碼管理</p>
              </a>
            </li>
            <a href="/admin/product/label/list" class="nav-link{{ Request::is('admin/product/label/*') ? ' active' : '' }}">
              <i class="nav-icon bi-tag"></i>
              <p>標籤管理</p>
            </a>

            <li class="nav-item">
              <a href="/admin/product/product/list"
                class="nav-link{{ Request::is('admin/product/product/*') ? ' active' : '' }}">
                <i class="nav-icon bi bi-box"></i>
                <p>產品管理</p>
              </a>
            </li>

          </ul>
        </li>





        <li class="nav-item">
          <a href="/myadmin/logout" class="nav-link">
            <i class="nav-icon bi-box-arrow-right"></i>
            <p>登出</p>
          </a>
        </li>






        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-clipboard-fill"></i>
            <p>
              Layout Options
              <span class="nav-badge badge text-bg-secondary me-3">6</span>
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./layout/unfixed-sidebar.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Default Sidebar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/fixed-sidebar.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Fixed Sidebar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/fixed-header.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Fixed Header</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/fixed-footer.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Fixed Footer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/fixed-complete.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Fixed Complete</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/layout-custom-area.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Layout <small>+ Custom Area </small></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/sidebar-mini.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Sidebar Mini</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/collapsed-sidebar.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Sidebar Mini <small>+ Collapsed</small></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/logo-switch.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Sidebar Mini <small>+ Logo Switch</small></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./layout/layout-rtl.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Layout RTL</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-tree-fill"></i>
            <p>
              UI Elements
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./UI/general.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./UI/icons.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Icons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./UI/timeline.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Timeline</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square"></i>
            <p>
              Forms
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./forms/general.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>General Elements</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-table"></i>
            <p>
              Tables
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./tables/simple.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Simple Tables</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-box-arrow-in-right"></i>
            <p>
              Auth
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                <p>
                  Version 1
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./examples/login.html" class="nav-link">
                    <i class="nav-icon bi bi-pencil-square"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./examples/register.html" class="nav-link">
                    <i class="nav-icon bi bi-pencil-square"></i>
                    <p>Register</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-box-arrow-in-right"></i>
                <p>
                  Version 2
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./examples/login-v2.html" class="nav-link">
                    <i class="nav-icon bi bi-pencil-square"></i>
                    <p>Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./examples/register-v2.html" class="nav-link">
                    <i class="nav-icon bi bi-pencil-square"></i>
                    <p>Register</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="./examples/lockscreen.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Lockscreen</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">DOCUMENTATIONS</li>
        <li class="nav-item">
          <a href="./docs/introduction.html" class="nav-link">
            <i class="nav-icon bi bi-download"></i>
            <p>Installation</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./docs/layout.html" class="nav-link">
            <i class="nav-icon bi bi-grip-horizontal"></i>
            <p>Layout</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./docs/color-mode.html" class="nav-link">
            <i class="nav-icon bi bi-star-half"></i>
            <p>Color Mode</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-ui-checks-grid"></i>
            <p>
              Components
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./docs/components/main-header.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Main Header</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./docs/components/main-sidebar.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Main Sidebar</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-filetype-js"></i>
            <p>
              Javascript
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./docs/javascript/treeview.html" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Treeview</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="./docs/browser-support.html" class="nav-link">
            <i class="nav-icon bi bi-browser-edge"></i>
            <p>Browser Support</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./docs/how-to-contribute.html" class="nav-link">
            <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
            <p>How To Contribute</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./docs/faq.html" class="nav-link">
            <i class="nav-icon bi bi-question-circle-fill"></i>
            <p>FAQ</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./docs/license.html" class="nav-link">
            <i class="nav-icon bi bi-patch-check-fill"></i>
            <p>License</p>
          </a>
        </li>
        <li class="nav-header">MULTI LEVEL EXAMPLE</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square-fill"></i>
            <p>Level 1</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square-fill"></i>
            <p>
              Level 1
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Level 2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>
                  Level 2
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-record-circle-fill"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-record-circle-fill"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon bi bi-record-circle-fill"></i>
                    <p>Level 3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>Level 2</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square-fill"></i>
            <p>Level 1</p>
          </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-pencil-square text-info"></i>
            <p>Informational</p>
          </a>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>