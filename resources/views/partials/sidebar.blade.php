 <!-- Sidebar -->
 <div class="adminx-sidebar expand-hover push">
    <ul class="sidebar-nav">
      {{-- <li class="sidebar-nav-item">
        <a href="index.html" class="sidebar-nav-link active">
          <span class="sidebar-nav-icon">
            <i data-feather="home"></i>
          </span>
          <span class="sidebar-nav-name">
            Dashboard
          </span>
          <span class="sidebar-nav-end">

          </span>
        </a>
      </li>

      <li class="sidebar-nav-item">
        <a href="#" class="sidebar-nav-link">
          <span class="sidebar-nav-icon">
            <i data-feather="layout"></i>
          </span>
          <span class="sidebar-nav-name">
            Layout Options
          </span>
          <span class="sidebar-nav-end">
            <span class="badge badge-info">4</span>
          </span>
        </a>
      </li> --}}

      @php 
        $user = App\Models\User::where('id', Auth::id())->first();
      @endphp

      @if($user->role !== 'Asisten')
          @if($user->role !== 'PJ')
          <li class="sidebar-nav-item">
            <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false" aria-controls="example">
              <span class="sidebar-nav-icon">
                <i data-feather="pie-chart"></i>
              </span>
              <span class="sidebar-nav-name">
                Data
              </span>
              <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
              </span>
            </a>

            <ul class="sidebar-sub-nav collapse" id="example">
              <li class="sidebar-nav-item">
                <a href="{{route('indexDataAss')}}" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Da
                  </span>
                  <span class="sidebar-nav-name">
                    Data Asisten
                  </span>
                </a>
              </li>

              <li class="sidebar-nav-item">
                <a href="{{route('indexDataKelas')}}" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Dk
                  </span>
                  <span class="sidebar-nav-name">
                    Data Kelas
                  </span>
                </a>
              </li>
              <li class="sidebar-nav-item">
                <a href="{{route('indexDataMateri')}}" class="sidebar-nav-link">
                  <span class="sidebar-nav-abbr">
                    Dm
                  </span>
                  <span class="sidebar-nav-name">
                    Data Materi
                  </span>
                </a>
              </li>
            </ul>
          </li>
          @endif

      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false" aria-controls="navTables">
          <span class="sidebar-nav-icon">
            <i data-feather="align-justify"></i>
          </span>
          <span class="sidebar-nav-name">
            Generator
          </span>
          <span class="sidebar-nav-end">
            <i data-feather="chevron-right" class="nav-collapse-icon"></i>
          </span>
        </a>

        <ul class="sidebar-sub-nav collapse" id="navTables">
          <li class="sidebar-nav-item">
            <a href="{{route('indexKode')}}" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Cg
              </span>
              <span class="sidebar-nav-name">
                Code Generator
              </span>
            </a>
          </li>

          {{-- <li class="sidebar-nav-item">
            <a href="./layouts/tables_data.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Da
              </span>
              <span class="sidebar-nav-name">
                Data Tables
              </span>
            </a>
          </li> --}}
        </ul>
      </li>
      @endif

      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navForms" aria-expanded="false" aria-controls="navForms">
          <span class="sidebar-nav-icon">
            <i data-feather="edit"></i>
          </span>
          <span class="sidebar-nav-name">
            Report
          </span>
          <span class="sidebar-nav-end">
            <i data-feather="chevron-right" class="nav-collapse-icon"></i>
          </span>
        </a>

        <ul class="sidebar-sub-nav collapse" id="navForms">
          @if($user->role !== 'Asisten')
          <li class="sidebar-nav-item">
            <a href="./layouts/form_elements.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Re
              </span>
              <span class="sidebar-nav-name">
                Report
              </span>
            </a>
          </li>
          @endif

          <li class="sidebar-nav-item">
            <a href="./layouts/form_advanced.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Ra
              </span>
              <span class="sidebar-nav-name">
                Riwayat Absen
              </span>
            </a>
          </li>
        </ul>
      </li>

      {{-- <li class="sidebar-nav-item">
        <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navUI" aria-expanded="false" aria-controls="navUI">
          <span class="sidebar-nav-icon">
            <i data-feather="grid"></i>
          </span>
          <span class="sidebar-nav-name">
            UI Elements
          </span>
          <span class="sidebar-nav-end">
                <i data-feather="chevron-right" class="nav-collapse-icon"></i>
          </span>
        </a>

        <ul class="sidebar-sub-nav collapse" id="navUI">
          <li class="sidebar-nav-item">
            <a href="./layouts/icons.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Ic
              </span>
              <span class="sidebar-nav-name">
                Icons
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/buttons.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Bu
              </span>
              <span class="sidebar-nav-name">
                Buttons
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/notifications.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                No
              </span>
              <span class="sidebar-nav-name">
                Notifications
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/progress.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Pr
              </span>
              <span class="sidebar-nav-name">
                Progress Bars
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/tabs.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Ta
              </span>
              <span class="sidebar-nav-name">
                Tabs
              </span>
            </a>
          </li>
        </ul>
      </li>

      <li class="sidebar-nav-item">
        <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navExtra" aria-expanded="false" aria-controls="navExtra">
          <span class="sidebar-nav-icon">
            <i data-feather="layers"></i>
          </span>
          <span class="sidebar-nav-name">
            Other Layouts
          </span>
          <span class="sidebar-nav-end">
            <i data-feather="chevron-right" class="nav-collapse-icon"></i>
          </span>
        </a>

        <ul class="sidebar-sub-nav collapse" id="navExtra">
          <li class="sidebar-nav-item">
            <a href="./layouts/login.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Lo
              </span>
              <span class="sidebar-nav-name">
                Login
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/signup.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Si
              </span>
              <span class="sidebar-nav-name">
                Sign Up
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/404.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Nf
              </span>
              <span class="sidebar-nav-name">
                404 Error
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/500.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Is
              </span>
              <span class="sidebar-nav-name">
                500 Error
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/timeline.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                Ti
              </span>
              <span class="sidebar-nav-name">
                Timeline
              </span>
            </a>
          </li>

          <li class="sidebar-nav-item">
            <a href="./layouts/invoice.html" class="sidebar-nav-link">
              <span class="sidebar-nav-abbr">
                In
              </span>
              <span class="sidebar-nav-name">
                Invoice
              </span>
            </a>
          </li>
        </ul>
      </li> --}}
    </ul>
  </div><!-- Sidebar End -->