{{-- 
  CONTENTS PAGE UI ONLY (Frontend)
  - Tabs: All / Draft / Published
  - Search
  - 3-dots dropdown per row
  - Auto alignment (CSS grid)
  No redirects / No DB / No controller yet
--}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User-Contents</title>

  <style>
    *{ box-sizing:border-box; }
    body{
      margin:0;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background: linear-gradient(180deg, #ff6a00, #a04408ff);
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
       

    .content{
      max-width: 1100px;
      height: auto;
      margin: 0 auto;
      position: relative;
      z-index: 1;
    }

    /* ===== Top controls row ===== */
    .controls{
      display:grid;
      grid-template-columns: 170px 1fr;
      gap: 16px;
      align-items: start;
      margin-top: 6px;
    }

    .newpost-wrap{
      display:flex;
      justify-content:flex-start;
      padding-top: 10px;
    }

    .btn-newpost{
      width: 200px;
      border:none;
      cursor:pointer;
      margin-top: 20px;
      padding: 7px 16px;
      border-radius: 20px;
      font-weight: 900;
      color:#fff;
      background: #ee601a;
      box-shadow: 0 2px 0 rgba(0,0,0,.2);
      font-size: 15px;
    }

    .main-card{
      background:#fff;
      border-radius: 10px;
      width: 1100px;
      padding: 10px 10px;
      box-shadow: 0 3px 0 rgba(0,0,0,.12);
    }

    .hero{
      display:flex;
      align-items:flex-start;
      justify-content: right;
      gap: 12px;
      margin-bottom: 10px;
    }
    .hero h1{
      margin:0;
      font-size: 34px;
      font-weight: 800;
      color:#111;
      line-height: 1.1;
      text-align: right;
    }
    .hero p{
      margin: 5px 0 0;
      font-size: 15px;
      color:#2b1b6f;
      font-weight: 700;
      text-align: right;

    }

    .search-tabs{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 14px;
      padding-top: 2px;
    }

    /* Search box */
    .search{
      position: relative;
      flex: 1 1 auto;
      max-width: 600px;
    }
    .search input{
      width:100%;
      padding: 11px 12px 11px 42px;
      border-radius: 10px;
      border:1px solid #d9d9d9;
      outline:none;
      font-size: 13px;
      background:#fff;
    }
    .search .icon{
      position:absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 16px;
      color:#333;
    }

    /* Tabs */
    .tabs{
      display:flex;
      padding: 0 20px;
      gap: 12px;
      align-items:center;
      justify-content:flex-end;
      flex: 0 0 auto;
    }
    .tab{
      border:none;
      cursor:pointer;
      padding: 5px 40px;
      border-radius: 20px;
      font-weight: 900;
      font-size: 12px;
      letter-spacing: .4px;
      box-shadow: 0 2px 0 rgba(56, 45, 45, 0.15);
      color:#fff;
      background:#f06418; /* orange default */
      text-transform: uppercase;
    }
    .tab.active{
      background:#0a8a0a; /* green when active like your screenshot */
    }

    /* ===== Table panel ===== */
    .table-panel{
      margin-top: 14px;
      background: #21085b; /* deep purple */
      border-radius: 14px;
      padding: 15px;
      box-shadow: 0 3px 0 rgba(0,0,0,.18);
    }

    .table-inner{
      background:#fff;
      border-radius: 10px;
      padding: 14px;
      min-height: 340px;
    }

    /* Column header "pills" row */
    .col-head{
      display:grid;
      grid-template-columns: 1.3fr 1.1fr 1fr 1fr 44px; /* last = dots column */
      gap: 12px;
      padding: 0 6px 10px;
      align-items:center;
    }
    .pill{
      background:#21085b;
      color:#fff;
      font-weight: 900;
      font-size: 12px;
      letter-spacing: .6px;
      text-transform: uppercase;
      padding: 6px 10px;
      border-radius: 10px;
      text-align:center;
      box-shadow: 0 2px 0 rgba(0,0,0,.12);
    }

    /* Data rows */
    .rows{
      display:flex;
      flex-direction: column;
      gap: 8px;
      padding: 0 6px;
    }

    .row{
      display:grid;
      grid-template-columns: 1.3fr 1.1fr 1fr 1fr 44px;
      gap: 12px;
      align-items:center;
      text-align:center;
      background:#fff;
      border: 1px solid #d9d9d9;
      border-radius: 8px;
      padding: 10px 10px;
      position: relative;
    }

    .cell{
      font-size: 14px;
      color:#111;
      font-weight: 700;
      overflow:hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    /* 3-dots column */
    .dots-wrap{
      display:flex;
      justify-content:center;
      align-items:center;
      position: relative;
    }
    .dots-btn{
      border:none;
      background: transparent;
      cursor:pointer;
      width: 28px;
      height: 28px;
      border-radius: 8px;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .dots-btn:hover{ background:#f2f2f2; }

    /* draw vertical 3 dots */
    .dots{
      width: 4px;
      height: 18px;
      display:flex;
      flex-direction: column;
      justify-content: space-between;
      align-items:center;
    }
    .dots span{
      width: 4px;
      height: 4px;
      background:#21085b;
      border-radius: 50%;
      display:block;
    }

    /* Dropdown menu (shown on dots click) */
    .menu{
      position:absolute;
      right: 8px;
      top: 38px;
      width: 120px;
      background:#fff;
      border: 1px solid #d9d9d9;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0,0,0,.18);
      overflow:hidden;
      display:none;
      z-index: 50;
    }
    .menu.open{ display:block; }

    .menu button{
      width:100%;
      border:none;
      background:#fff;
      padding: 10px 12px;
      text-align:left;
      cursor:pointer;
      font-weight: 790;
      font-size: 12px;
      color:#111;
      display:flex;
      align-items:center;
      gap: 8px;
    }
    .menu button:hover{ background:#f2f2f2; }

    .menu .danger{ color:#b00020; }

    /* Simple icons in menu (you can replace later) */
    .micon{
      width: 16px; display:inline-flex; justify-content:center;
    }

    /* Responsive */
    @media (max-width: 900px){
      .controls{ grid-template-columns: 1fr; }
      .newpost-wrap{ justify-content:flex-start; }
      .hero{ flex-direction: column; }
      .search-tabs{ flex-direction: column; align-items: stretch; }
      .search{ max-width: 100%; }
      .tabs{ justify-content:flex-start; }

      /* allow wrapping on small screens */
      .col-head, .row{
        grid-template-columns: 1.2fr 1fr 1fr 1fr 40px;
      }
    }

    @media (max-width: 640px){
      /* shrink columns more on very small screens */
      .col-head, .row{
        grid-template-columns: 1.4fr 1fr 1fr 0.9fr 40px;
      }
    }
  </style>
</head>

<body>
  <header class="topbar">
    <div class="brand">
      <a href="/feed">
        <img src="/assets/Logo.png" alt="POST-IT">
      </a>
    </div>

    <nav class="navlinks">
      <a href="/users.dashboard">Dashboard</a>
      <a class="active" href="/users.contents">Contents</a>
      <a href="/users.newpost">New Post</a>

    </nav>

    <div class="profile-icon">
      <a href="/users.profile">     
        <img src="/assets/account_circle.png" width="35" height="35">
      </a>    
    </div>

  </header>

  <div class="shell">
    <div class="content">

      <div class="controls">
        <div class="newpost-wrap">
          <button class="btn-newpost" type="button">NEW POST</button>
        </div>

          <div class="hero">
            <div>
              <h1>Manage your contents here!</h1>
              <p>Browse published articles and explore shared ideas.</p>
            </div>
          </div>

        <section class="main-card">
          <div class="search-tabs">
            <div class="search">
              <div class="icon">
                <img src="/assets/search.png" width="25" height="25">
              </div>
              <input id="searchInput" type="text" placeholder="Search content..." />
            </div>

            <div class="tabs" role="tablist" aria-label="Contents filter">
              <button class="tab active" data-tab="all" type="button">ALL</button>
              <button class="tab" data-tab="draft" type="button">DRAFT</button>
              <button class="tab" data-tab="published" type="button">PUBLISHED</button>
            </div>
          </div>
        </section>
      </div>

      <section class="table-panel">
        <div class="table-inner">

          <div class="col-head">
            <div class="pill">TITLE</div>
            <div class="pill">AUTHOR</div>
            <div class="pill">CATEGORIES</div>
            <div class="pill">UPDATED</div>
          </div>

          <div class="rows" id="rows"></div>

        </div>
      </section>

    </div>
  </div>

  <script>
    /**
     * status: "draft" | "published"
     * (All tab shows both)
     */
    const DATA = [
      { title: "California Girls", author: "Katy Perry", category: "Lifestyle", updated: "January 6, 2026", status: "published" },
      { title: "Roar",             author: "Katy Perry", category: "Food",      updated: "January 5, 2026", status: "published" },
      { title: "Dark Horse",       author: "Katy Perry", category: "News",      updated: "January 4, 2026", status: "draft" },
      { title: "Last Friday Night",author: "Katy Perry", category: "Sports",    updated: "January 3, 2026", status: "draft" },
    ];

    // UI state
    let activeTab = "all";
    let searchText = "";

    const rowsEl = document.getElementById("rows");
    const searchInput = document.getElementById("searchInput");
    const tabButtons = Array.from(document.querySelectorAll(".tab"));

    function escapeHtml(str){
      return str.replaceAll("&","&amp;")
                .replaceAll("<","&lt;")
                .replaceAll(">","&gt;")
                .replaceAll('"',"&quot;")
                .replaceAll("'","&#039;");
    }

    function filteredData(){
      const q = searchText.trim().toLowerCase();

      return DATA.filter(item => {
        // tab filter
        const tabOk = (activeTab === "all") ? true : item.status === activeTab;

        // search filter (title/author/category)
        const searchOk = !q
          || item.title.toLowerCase().includes(q)
          || item.author.toLowerCase().includes(q)
          || item.category.toLowerCase().includes(q)
          || item.updated.toLowerCase().includes(q);

        return tabOk && searchOk;
      });
    }

    function renderRows(){
      const items = filteredData();

      rowsEl.innerHTML = items.map((item, idx) => {
        return `
          <div class="row" data-row="${idx}">
            <div class="cell" title="${escapeHtml(item.title)}">${escapeHtml(item.title)}</div>
            <div class="cell" title="${escapeHtml(item.author)}">${escapeHtml(item.author)}</div>
            <div class="cell" title="${escapeHtml(item.category)}">${escapeHtml(item.category)}</div>
            <div class="cell" title="${escapeHtml(item.updated)}">${escapeHtml(item.updated)}</div>

            <div class="dots-wrap">
              <button class="dots-btn" type="button" aria-label="More actions" data-action="toggle-menu">
                <div class="dots" aria-hidden="true">
                  <span></span><span></span><span></span>
                </div>
              </button>

              <div class="menu" role="menu">
                <button type="button" role="menuitem">
                  <span class="micon">
                    <img src="/assets/draft.png" width="20" alt="Draft">
                  </span> Draft
                </button>
                <button type="button" role="menuitem">
                  <span class="micon">
                    <img src="/assets/edit.png" width="20" alt="Edit">                    
                  </span> Edit
                </button>
                <button type="button" role="menuitem" class="danger">
                  <span class="micon">
                    <img src="/assets/delete.png" width="20" alt="Delete">                  
                  </span> Delete
                </button>
              </div>
            </div>
          </div>
        `;
      }).join("");

      wireMenus();
    }

    function setActiveTab(tab){
      activeTab = tab;

      tabButtons.forEach(btn => {
        btn.classList.toggle("active", btn.dataset.tab === tab);
      });

      closeAllMenus();
      renderRows();
    }

    function closeAllMenus(){
      document.querySelectorAll(".menu.open").forEach(m => m.classList.remove("open"));
    }

    function wireMenus(){
      // dots click toggles the nearest menu
      document.querySelectorAll('[data-action="toggle-menu"]').forEach(btn => {
        btn.addEventListener("click", (e) => {
          e.stopPropagation();

          // close other menus first
          document.querySelectorAll(".menu.open").forEach(m => m.classList.remove("open"));

          const wrap = btn.closest(".dots-wrap");
          const menu = wrap.querySelector(".menu");
          menu.classList.toggle("open");
        });
      });

      // clicking inside menu should not close immediately
      document.querySelectorAll(".menu").forEach(menu => {
        menu.addEventListener("click", (e) => e.stopPropagation());
      });
    }

    // Tab clicks
    tabButtons.forEach(btn => {
      btn.addEventListener("click", () => setActiveTab(btn.dataset.tab));
    });

    // Search input
    searchInput.addEventListener("input", (e) => {
      searchText = e.target.value;
      closeAllMenus();
      renderRows();
    });

    // click outside closes menus
    document.addEventListener("click", () => closeAllMenus());

    // initial render
    renderRows();
  </script>
</body>
</html>
