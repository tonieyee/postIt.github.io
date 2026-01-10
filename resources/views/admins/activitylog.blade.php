<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Activity Log</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    *{ box-sizing:border-box; }
    body{
      margin:0;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background: linear-gradient(180deg, #514eddff, #010127ff);
    }

    .topbar{
      width: 100%;
      height: auto;
      background:#fff;
      position: relative;
      display:flex;
      align-items:center;
      justify-content:space-between;
      padding:10px auto auto;

      z-index: 10;
    }

    .brand{
      display:flex;
      align-items:center;
      gap:10px;
    }
    .brand img{
      height:50px;
      width:auto;
      margin:0px 30px;
    }

    .navlinks{
      display:flex;
      gap:60px;
      font-weight:750;
      color:#2b1b6f;
    }
    .navlinks a{
      text-decoration:none;
      color:#2b1b6f;
    }
    .navlinks a.active{
      color:#0a8a0a;
      text-decoration: underline;
    }

    .profile-icon{
      display:flex;
      align-items:center;
      justify-content:center;
      padding:0 25px 0 0 ;
    }

    .shell{
      position: relative;
      isolation:isolate;
      min-height: 100vh;
      padding: 14px 18px 30px;
      overflow: hidden; /* hides extra part of the curve */
    }

    .shell::before{
      content:"";
      position: absolute;
      top: 0;
      left: 0;

      /* Make it huge so it curves nicely */
      width: 88%;
      height: 100%;

      background: #f2f2f2; /* this becomes the “inside” page color */
      border-top-right-radius: 280px;
      border-bottom-right-radius: 280px;


      z-index: 0;
    }

    /* Put actual content above the shape */
    .shell > *{
      position: relative;
      z-index: 1;
    }

    /* WRAP */
    .wrap{
      padding:28px;
      max-width:1100px;
      margin:0 auto;
    }

    /* HEADER */
    .pageTitle h1{
      margin:0;
      font-size:34px;
      font-weight: 800;
      color:#111;
    }
    .pageTitle p{
      margin:6px 0 0;
      color:#0e8f01;
      font-weight:700;
    }

    /* SEARCH + FILTER (ONE BOX) */
    .searchBar{
      margin:18px 0 18px;
      background:#fff;
      border:1px solid #dcdcdc;
      border-radius:14px;
      padding:10px 12px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:14px;
      box-shadow:0 6px 18px rgba(0,0,0,.08);
    }

    .searchLeft{
      display:flex;
      align-items:center;
      gap:10px;
      flex:1;
      min-width:240px;
    }
    .searchLeft img{ width:18px; height:18px; }

    .searchLeft input{
      border:none;
      outline:none;
      width:100%;
      font-weight:600;
      color:#333;
      background:transparent;
    }

    .searchFilters{
      display:flex;
      gap:10px;
      align-items:center;
    }

    .filterBtn{
      border:none;
      padding:6px 16px;
      border-radius:999px;
      font-weight:900;
      font-size:12px;
      color:#fff;
      cursor:pointer;
      opacity:.55;
      transform:translateY(0);
      transition:all .15s ease;
    }
    .filterBtn.active{
      opacity:1;
      box-shadow:0 6px 12px rgba(0,0,0,.15);
      transform:translateY(-1px);
    }
    .filterBtn.orange{ background:#ee601a; }
    .filterBtn.green{ background:#0e8f01; }

    /* MAIN CARD */
    .main-card{
      background:#2c195b;
      border-radius:18px;
      padding:18px;
      box-shadow:0 12px 30px rgba(0,0,0,.18);
    }
    .inner{
      background:#fff;
      border-radius:14px;
      padding:16px;
      min-height:420px;
    }

    .pill{
      display:inline-block;
      background:#2c195b;
      color:#fff;
      font-weight:800;
      font-size:12px;
      padding:6px 14px;
      border-radius:10px;
      min-width:130px;
      text-align:center;
    }

    /* ACTIVITY LIST */
    .rows{ display:flex; flex-direction:column; gap:10px; margin-top:12px; }

    .activityRow{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:14px;
      background:#fff;
      border:1px solid #dcdcdc;
      border-radius:12px;
      padding:12px 14px;
      font-weight:700;
    }

    .activityText{
      color:#222;
      line-height:1.2;
    }

    .timeAgo{
      color:#777;
      font-size:12px;
      font-weight:700;
      white-space:nowrap;
    }

    .emptyState{
      margin-top:14px;
      color:#777;
      font-weight:700;
      text-align:center;
      padding:24px 10px;
      border:1px dashed #ddd;
      border-radius:12px;
    }
  </style>
</head>

<body>
  <header class="topbar">
    <div class="brand">
      <a href="/users.feed">
        <img src="/assets/Logo.png" alt="POST-IT">
      </a>
    </div>

    <nav class="navlinks">
      <a href="/admins.dashboard">Dashboard</a>
      <a href="/admins.contents">Contents</a>
      <a href="/admins.newpost">New Post</a>
      <a href="/admins.pages">Pages</a>
      <a class="active" href="/admins.activitylog">Activity Log</a>
    </nav>

    <div class="profile-icon">
      <a href="/users.profile">     
        <img src="/assets/account_circle.png" width="35" height="35">
      </a>
    </div>
  </header>

  <div class="shell">
    <div class="wrap">

      <div class="pageTitle">
        <h1>Activity Log</h1>
        <p>Track all system activities and changes.</p>
      </div>

      <!-- ONE BOX: SEARCH + USERS/CONTENT BUTTONS -->
      <div class="searchBar">
        <div class="searchLeft">
          <img src="/assets/search.png" alt="Search">
          <input id="searchInput" type="text" placeholder="Search user’s name...">
        </div>

        <div class="searchFilters">
          <button id="usersBtn" class="filterBtn orange active" type="button">USERS</button>
          <button id="contentBtn" class="filterBtn green" type="button">CONTENT</button>
        </div>
      </div>

      <section class="main-card">
        <div class="inner">

          <div>
            <span class="pill">TITLE</span>
          </div>

          <div class="rows" id="logRows"></div>
          <div class="emptyState" id="emptyState" style="display:none;">
            No activities found.
          </div>

        </div>
      </section>

    </div>
  </div>

  <script>
    // UI-only demo logs
    // type: "user" -> will be searched by user's name
    // type: "content" -> will be searched by content title
    const LOGS = [
      { type: "content", user: "Katy Perry", action: "posted",  title: "California Girls", time: "about 1 hr ago" },
      { type: "content", user: "Katy Perry", action: "drafted", title: "Dark Horse",       time: "about 3 days ago" },
      { type: "user",    user: "Admin",     action: "updated", title: "Profile settings",  time: "about 5 days ago" },
    ];

    const logRows = document.getElementById("logRows");
    const emptyState = document.getElementById("emptyState");

    const searchInput = document.getElementById("searchInput");
    const usersBtn = document.getElementById("usersBtn");
    const contentBtn = document.getElementById("contentBtn");

    // current mode: "user" or "content"
    let mode = "user";

    function setMode(newMode){
      mode = newMode;

      if(mode === "user"){
        usersBtn.classList.add("active");
        contentBtn.classList.remove("active");
        searchInput.placeholder = "Search user’s name...";
      } else {
        contentBtn.classList.add("active");
        usersBtn.classList.remove("active");
        searchInput.placeholder = "Search content title...";
      }

      searchInput.value = "";
      renderLogs();
      searchInput.focus();
    }

    function renderLogs(){
      const q = searchInput.value.trim().toLowerCase();

      // filter based on mode
      const filtered = LOGS.filter(item => {
        if(mode === "user"){
          // search by user's name
          return item.user.toLowerCase().includes(q);
        } else {
          // search by content title
          return item.title.toLowerCase().includes(q);
        }
      });

      logRows.innerHTML = "";

      if(filtered.length === 0){
        emptyState.style.display = "block";
        return;
      } else {
        emptyState.style.display = "none";
      }

      filtered.forEach(item => {
        const row = document.createElement("div");
        row.className = "activityRow";

        // sentence format (same style as screenshot)
        const text = `<strong>${item.user}</strong> ${item.action} <em>“${item.title}”</em>`;

        row.innerHTML = `
          <div class="activityText">${text}</div>
          <div class="timeAgo">${item.time}</div>
        `;

        logRows.appendChild(row);
      });
    }

    // events
    usersBtn.addEventListener("click", () => setMode("user"));
    contentBtn.addEventListener("click", () => setMode("content"));
    searchInput.addEventListener("input", renderLogs);

    // init
    renderLogs();
  </script>
</body>
</html>
