<title>{{ config('app.name', 'RENTIT') }}</title>
<link rel="stylesheet" href="/css/admin.css">
<link rel="stylesheet" href="/css/app.css">
<script src="https://kit.fontawesome.com/9b62d0cfda.js" crossorigin="anonymous"></script>
@livewireStyles

<div class="app-container">
    <div class="app-header">
      <div class="app-header-left">
        <span class="app-icon"></span>
        <p class="app-name">RENTIT</p>
        <div class="search-wrapper">
          <input class="search-input" type="text" placeholder="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
            <defs></defs>
            <circle cx="11" cy="11" r="8"></circle>
            <path d="M21 21l-4.35-4.35"></path>
          </svg>
        </div>
      </div>
      <div class="app-header-right">
        <button class="mode-switch" title="Dark Mode">
          <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
            <defs></defs>
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
          </svg>
        </button>
        <button class="add-btn" title="Add New Car">
          <a href="{{ route('add') }}"><svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
            <line x1="12" y1="5" x2="12" y2="19" />
            <line x1="5" y1="12" x2="19" y2="12" /></svg></a>
        </button>
        <button class="notification-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.73 21a2 2 0 0 1-3.46 0" /></svg>
        </button>
        <button class="profile-btn">
          <img src="/img/Screenshot (367).png" />
          <span>{{ Auth::user()->name }}</span>
        </button>
      </div>
      <button class="messages-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
          <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" /></svg>
      </button>
    </div>
    <div class="app-content">
      <div class="app-sidebar">
        <a href="/" class="app-sidebar-link active" title="Home">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
            <polyline points="9 22 9 12 15 12 15 22" /></svg>
        </a>
        <a class="app-sidebar-link active" title="car manager" href="{{ route('add') }}/#yaso">
            <i class="fas fa-car"></i>
        </a>

        <a class="app-sidebar-link active" title="Manage Applications" href="#approve">
            <i class="fas fa-tasks"></i>
        </a>

      </div>
      <div class="projects-section">
        <div class="projects-section-header">
          <p>HISTORY: {{ $histCount }}</p>
        </div>
        <div class="projects-section-line">
          <div class="projects-status">
            <div class="item-status">
                @php
                    $countRented = 0;
                    @endphp
                    @foreach ($rents as $rent)
                        @if ($rent->status == 'Rented')
                        @php
                                $countRented++;
                                @endphp
                        @endif
                        @endforeach
                <span class="status-number">{{ $countRented }}</span>
                <span class="status-type">Currently Rented</span>
            </div>
            <div class="item-status">
                @php
                    $countApps = 0;
                    @endphp
                    @foreach ($rents as $rent)
                        @if ($rent->status == 'pending')
                        @php
                                ++$countApps;
                                @endphp
                        @endif
                        @endforeach
                        <span class="status-number">{{ $countApps }}</span>
                        <span class="status-type">Pending Applications</span>
                    </div>
                    <div class="item-status">
                        <span class="status-number">{{ $carTotal }}</span>
                        <span class="status-type">Total Cars</span>
                    </div>
                </div>
                <div class="view-actions">
                    <button class="view-btn list-view" title="List View">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                            <line x1="8" y1="6" x2="21" y2="6" />
                            <line x1="8" y1="12" x2="21" y2="12" />
                            <line x1="8" y1="18" x2="21" y2="18" />
                            <line x1="3" y1="6" x2="3.01" y2="6" />
                            <line x1="3" y1="12" x2="3.01" y2="12" />
                            <line x1="3" y1="18" x2="3.01" y2="18" /></svg>
                        </button>
                        <button class="view-btn grid-view active" title="Grid View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7" />
                                <rect x="14" y="3" width="7" height="7" />
                                <rect x="14" y="14" width="7" height="7" />
                                <rect x="3" y="14" width="7" height="7" /></svg>
                            </button>
                        </div>
                    </div>


        <div class="project-boxes jsGridView">
            @foreach ($carHistory as $history)
            <div id="viewCars" class="project-box-wrapper">
              <div class="project-box">
                <div class="project-box-header">
                  <span>{{ $history->cars->brand }}</span>
                  {{-- <div class="more-wrapper">
                      <button class="project-btn-more">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">
                            <circle cx="12" cy="12" r="1" />
                            <circle cx="12" cy="5" r="1" />
                            <circle cx="12" cy="19" r="1" /></svg>
                        </button>
                    </div> --}}
                </div>
                <input id="sdate" type="hidden" value="{{ $history->pickup_date }}">
                <input id="edate" type="hidden" value="{{ $history->end_date }}">
            <div class="project-box-content-header">
                <a><p class="box-content-subheader">{{ $history->status }}</p></a>
              <a href="mailto:{{ $history->users->email }}"><p class="box-content-subheader">{{ $history->users->email }}</p></a>
            </div>
            <div class="box-progress-wrapper">
              <p class="box-progress-header"></p>
              <div class="box-progress-bar">
                <span id="barperk" class="box-progress" style="background-color: rgb(111, 111, 250)"></span>
              </div>
              <p class="box-progress-percentage">{{ $history->users->name }}</p>
            </div>
            <div class="project-box-footer">

              <div style="background-image:url(/storage/uploaded/{{ $history->cars->image_path }}); background-repeat:no-repeat; background-size:100% 100%;" class="days-left">
                <a style="text-decoration: none; color:black" href="/more-details/{{ $history->cars->id }}">...</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
            <span class="container justify-center">{{ $carHistory->links() }}</span>
        <div class="container justify-center">
            <span>@livewire('update-status')</span>
        </div>
    </div>
</div>



  <div class="messages-section">
    <button class="messages-close">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
        <circle cx="12" cy="12" r="10" />
        <line x1="15" y1="9" x2="9" y2="15" />
        <line x1="9" y1="9" x2="15" y2="15" /></svg>
    </button>
    <div class="projects-section-header">
      <p>Client Messages</p>
    </div>
    <div class="messages">
      <div class="message-box">
        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile image">
        <div class="message-content">
          <div class="message-header">
            <div class="name">Stephanie</div>
            <div class="star-checkbox">
              <input type="checkbox" id="star-1">
              <label for="star-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>
              </label>
            </div>
          </div>
          <p class="message-line">
            I got your first assignment. It was quite good. 🥳 We can continue with the next assignment.
          </p>
          <p class="message-line time">
            Dec, 12
          </p>
        </div>
      </div>
      <div class="message-box">
        <img src="https://images.unsplash.com/photo-1600486913747-55e5470d6f40?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2550&q=80" alt="profile image">
        <div class="message-content">
          <div class="message-header">
            <div class="name">Mark</div>
            <div class="star-checkbox">
              <input type="checkbox" id="star-2">
              <label for="star-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>
              </label>
            </div>
          </div>
          <p class="message-line">
            Hey, can tell me about progress of project? I'm waiting for your response.
          </p>
          <p class="message-line time">
            Dec, 12
          </p>
        </div>
      </div>
      <div class="message-box">
        <img src="https://images.unsplash.com/photo-1543965170-4c01a586684e?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NDZ8fG1hbnxlbnwwfDB8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="profile image">
        <div class="message-content">
          <div class="message-header">
            <div class="name">David</div>
            <div class="star-checkbox">
              <input type="checkbox" id="star-3">
              <label for="star-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>
              </label>
            </div>
          </div>
          <p class="message-line">
            Awesome! 🤩 I like it. We can schedule a meeting for the next one.
          </p>
          <p class="message-line time">
            Dec, 12
          </p>
        </div>
      </div>
      <div class="message-box">
        <img src="https://images.unsplash.com/photo-1533993192821-2cce3a8267d1?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTl8fHdvbWFuJTIwbW9kZXJufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60" alt="profile image">
        <div class="message-content">
          <div class="message-header">
            <div class="name">Jessica</div>
            <div class="star-checkbox">
              <input type="checkbox" id="star-4">
              <label for="star-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" /></svg>
              </label>
            </div>
          </div>
          <p class="message-line">
            I am really impressed! Can't wait to see the final result.
          </p>
          <p class="message-line time">
            Dec, 11
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>


  <script>
      document.addEventListener('DOMContentLoaded', function () {
  var modeSwitch = document.querySelector('.mode-switch');

  modeSwitch.addEventListener('click', function () {                     document.documentElement.classList.toggle('dark');
    modeSwitch.classList.toggle('active');
  });

  var listView = document.querySelector('.list-view');
  var gridView = document.querySelector('.grid-view');
  var projectsList = document.querySelector('.project-boxes');

  listView.addEventListener('click', function () {
    gridView.classList.remove('active');
    listView.classList.add('active');
    projectsList.classList.remove('jsGridView');
    projectsList.classList.add('jsListView');
  });

  gridView.addEventListener('click', function () {
    gridView.classList.add('active');
    listView.classList.remove('active');
    projectsList.classList.remove('jsListView');
    projectsList.classList.add('jsGridView');
  });

  document.querySelector('.messages-btn').addEventListener('click', function () {
    document.querySelector('.messages-section').classList.add('show');
  });

  document.querySelector('.messages-close').addEventListener('click', function() {
    document.querySelector('.messages-section').classList.remove('show');
  });
});
  </script>

  <script>
    update_clock();

    setInterval(function() {
        update_clock();
    }, 1000);

    function update_clock() {
    var start = new Date(document.getElementById('sdate').innerText);
    var end = new Date(document.getElementById('edate').innerText);
    var now = new Date();

    var time = ((Date.parse(end) - Date.parse(start)) / 1000);
    var t = ((Date.parse(end) - Date.parse(now)) / 1000);

    let perc = Math.floor(100 -((t / time) * 100) / now);

    document.getElementById('barperk').style.width += perc + '%' ;
}
  </script>

  <script>
    change_days();

    function change_days() {
    const date1 = new Date(document.getElementById('sdate').innerText);
    const date2 = new Date(document.getElementById('edate').innerText);
    const diffTime = Math.abs(date2 - date1);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    document.getElementById('days').innerText += diffDays;
    }
  </script>
@livewireScripts
