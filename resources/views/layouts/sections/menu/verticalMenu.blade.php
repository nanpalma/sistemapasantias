<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <div class="logo">
                    {{-- <a href="{{ url('/') }}"><img src="{{ asset('assets_use/compiled/svg/logo.svg') }}" alt="Logo"
                            srcset=""></a> --}}
                    <a style="    font-size: 1.5vw;" href="{{ url('/') }}"><img style="width: 28%;     height: 20%;"
                            src="{{ asset('img/zaodi_lara.jpg') }}" alt="Logo" srcset=""> ZODI</a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveaspectratio="xMidYMid meet" viewbox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                        preserveaspectratio="xMidYMid meet" viewbox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
            <div class="header-top-right border-bottom pb-3">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle justify-content-between"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-xl ">
                            {{-- <img class="h-100" src="{{ asset('assets_use/compiled/jpg/2.jpg') }}" alt="Avatar"> --}}
                            <img class="h-100" src="{{ asset('img/militar.png') }}" alt="Avatar">

                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name"> {{ Auth::user()->name }}</h6>
                            @if (auth()->check() && auth()->user()->role)
                                <p class="user-dropdown-status text-sm text-muted">{{ Auth::user()->role->name }}</p>
                            @else
                                <p class="user-dropdown-status text-sm text-muted">Sin Rol Asignado</p>
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        {{-- <li><a class="dropdown-item" href="#">My Account</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li> --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Cerrar
                                Sesion</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </div>

            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item  {{ Route::is('dashboard-analytics') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>


                </li>

                <li class="sidebar-title">Departamentos</li>

                <li
                    class="sidebar-item    has-sub {{ Route::is(['armamento.list', 'armamento.gestion', 'armamento.gestion.views', 'armamentozody.list']) ? 'active ' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Armamento</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item   {{ Route::is('armamento.list') ? 'active ' : '' }}">
                            <a href="{{ route('armamento.list') }}" class="submenu-link">Materiales</a>

                        </li>

                        <li
                            class="submenu-item {{ Route::is(['armamento.gestion', 'armamento.gestion.views']) ? 'active ' : '' }} ">
                            <a href="{{ route('armamento.gestion') }}" class="submenu-link">Gestion</a>

                        </li>

                        <li class="submenu-item  {{ Route::is('armamentozody.list') ? 'active ' : '' }}">
                            <a href="{{ route('armamentozody.list') }}" class="submenu-link">Materiales ZODI</a>

                        </li>
                    </ul>


                </li>


                <li
                    class="sidebar-item  has-sub  {{ Route::is(['transporte.zodi.list', 'transporte.list', 'transporte.gestion', 'transporte.gestion.views']) ? 'active ' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Blindado y transporte</span>
                    </a>

                    <ul class="submenu ">
                        <li class="submenu-item  {{ Route::is('transporte.zodi.list') ? 'active ' : '' }} ">
                            <a href="{{ route('transporte.zodi.list') }}" class="submenu-link">Vehículos ZODI</a>

                        </li>
                        <li class="submenu-item  {{ Route::is('transporte.list') ? 'active ' : '' }} ">
                            <a href="{{ route('transporte.list') }}" class="submenu-link">Vehículos</a>

                        </li>

                        <li
                            class="submenu-item  {{ Route::is(['transporte.gestion', 'transporte.gestion.views']) ? 'active ' : '' }}">
                            <a href="{{ route('transporte.gestion') }}" class="submenu-link">Gestión </a>

                        </li>



                    </ul>


                </li>

                <li
                    class="sidebar-item  has-sub {{ Route::is(['sanidad.gestion', 'sanidad.gestion.views']) ? 'active ' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Sanidad</span>
                    </a>

                    <ul class="submenu ">

                        <li
                            class="submenu-item {{ Route::is(['sanidad.gestion', 'sanidad.gestion.views']) ? 'active ' : '' }} ">
                            <a href="{{ route('sanidad.gestion') }}" class="submenu-link">Gestion</a>

                        </li>



                    </ul>


                </li>




                {{-- <li class="sidebar-title">Forms &amp; Tables</li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-hexagon-fill"></i>
            <span>Form Elements</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="form-element-input.html" class="submenu-link">Input</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-element-input-group.html" class="submenu-link">Input Group</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-element-select.html" class="submenu-link">Select</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-element-radio.html" class="submenu-link">Radio</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-element-checkbox.html" class="submenu-link">Checkbox</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-element-textarea.html" class="submenu-link">Textarea</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  ">
          <a href="form-layout.html" class='sidebar-link'>
            <i class="bi bi-file-earmark-medical-fill"></i>
            <span>Form Layout</span>
          </a>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-journal-check"></i>
            <span>Form Validation</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="form-validation-parsley.html" class="submenu-link">Parsley</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-pen-fill"></i>
            <span>Form Editor</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="form-editor-quill.html" class="submenu-link">Quill</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-editor-ckeditor.html" class="submenu-link">CKEditor</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-editor-summernote.html" class="submenu-link">Summernote</a>

            </li>

            <li class="submenu-item  ">
              <a href="form-editor-tinymce.html" class="submenu-link">TinyMCE</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  ">
          <a href="table.html" class='sidebar-link'>
            <i class="bi bi-grid-1x2-fill"></i>
            <span>Table</span>
          </a>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-file-earmark-spreadsheet-fill"></i>
            <span>Datatables</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="table-datatable.html" class="submenu-link">Datatable</a>

            </li>

            <li class="submenu-item  ">
              <a href="table-datatable-jquery.html" class="submenu-link">Datatable (jQuery)</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-title">Extra UI</li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-pentagon-fill"></i>
            <span>Widgets</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="ui-widgets-chatbox.html" class="submenu-link">Chatbox</a>

            </li>

            <li class="submenu-item  ">
              <a href="ui-widgets-pricing.html" class="submenu-link">Pricing</a>

            </li>

            <li class="submenu-item  ">
              <a href="ui-widgets-todolist.html" class="submenu-link">To-do List</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-egg-fill"></i>
            <span>Icons</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="ui-icons-bootstrap-icons.html" class="submenu-link">Bootstrap Icons
              </a>

            </li>

            <li class="submenu-item  ">
              <a href="ui-icons-fontawesome.html" class="submenu-link">Fontawesome</a>

            </li>

            <li class="submenu-item  ">
              <a href="ui-icons-dripicons.html" class="submenu-link">Dripicons</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-bar-chart-fill"></i>
            <span>Charts</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="ui-chart-chartjs.html" class="submenu-link">ChartJS</a>

            </li>

            <li class="submenu-item  ">
              <a href="ui-chart-apexcharts.html" class="submenu-link">Apexcharts</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  ">
          <a href="ui-file-uploader.html" class='sidebar-link'>
            <i class="bi bi-cloud-arrow-up-fill"></i>
            <span>File Uploader</span>
          </a>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-map-fill"></i>
            <span>Maps</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="ui-map-google-map.html" class="submenu-link">Google Map</a>

            </li>

            <li class="submenu-item  ">
              <a href="ui-map-jsvectormap.html" class="submenu-link">JS Vector Map</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-three-dots"></i>
            <span>Multi-level Menu</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  has-sub">
              <a href="#" class="submenu-link">First Level</a>

              <ul class="submenu submenu-level-2 ">


                <li class="submenu-item ">
                  <a href="ui-multi-level-menu.html" class="submenu-link">Second Level</a>
                </li>

                <li class="submenu-item ">
                  <a href="#" class="submenu-link">Second Level Menu</a>
                </li>


              </ul>

            </li>

            <li class="submenu-item  has-sub">
              <a href="#" class="submenu-link">Another Menu</a>

              <ul class="submenu submenu-level-2 ">


                <li class="submenu-item ">
                  <a href="#" class="submenu-link">Second Level Menu</a>
                </li>


              </ul>

            </li>

          </ul>


        </li>

        <li class="sidebar-title">Pages</li>

        <li class="sidebar-item  ">
          <a href="application-email.html" class='sidebar-link'>
            <i class="bi bi-envelope-fill"></i>
            <span>Email Application</span>
          </a>


        </li>

        <li class="sidebar-item  ">
          <a href="application-chat.html" class='sidebar-link'>
            <i class="bi bi-chat-dots-fill"></i>
            <span>Chat Application</span>
          </a>


        </li>

        <li class="sidebar-item  ">
          <a href="application-gallery.html" class='sidebar-link'>
            <i class="bi bi-image-fill"></i>
            <span>Photo Gallery</span>
          </a>


        </li>

        <li class="sidebar-item  ">
          <a href="application-checkout.html" class='sidebar-link'>
            <i class="bi bi-basket-fill"></i>
            <span>Checkout Page</span>
          </a>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-person-badge-fill"></i>
            <span>Authentication</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="auth-login.html" class="submenu-link">Login</a>

            </li>

            <li class="submenu-item  ">
              <a href="auth-register.html" class="submenu-link">Register</a>

            </li>

            <li class="submenu-item  ">
              <a href="auth-forgot-password.html" class="submenu-link">Forgot Password</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-x-octagon-fill"></i>
            <span>Errors</span>
          </a>

          <ul class="submenu ">

            <li class="submenu-item  ">
              <a href="error-403.html" class="submenu-link">403</a>

            </li>

            <li class="submenu-item  ">
              <a href="error-404.html" class="submenu-link">404</a>

            </li>

            <li class="submenu-item  ">
              <a href="error-500.html" class="submenu-link">500</a>

            </li>

          </ul>


        </li>

        <li class="sidebar-title">Raise Support</li>

        <li class="sidebar-item  ">
          <a href="https://zuramai.github.io/mazer/docs" class='sidebar-link'>
            <i class="bi bi-life-preserver"></i>
            <span>Documentation</span>
          </a>


        </li>

        <li class="sidebar-item  ">
          <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md" class='sidebar-link'>
            <i class="bi bi-puzzle"></i>
            <span>Contribute</span>
          </a>


        </li>

        <li class="sidebar-item  ">
          <a href="https://github.com/zuramai/mazer#donation" class='sidebar-link'>
            <i class="bi bi-cash"></i>
            <span>Donate</span>
          </a>


        </li> --}}

            </ul>
        </div>
    </div>
</div>
