{{-- 
  PAGES PAGE UI ONLY (Frontend)
  - List of static pages
  - 3-dots dropdown per row (Draft/Edit/Delete)
  - "ADD NEW PAGE" toggles the Add Page UI (same file)
  No DB / No controller yet
--}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-Pages</title>

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

    /* ===== LAYOUT WRAP ===== */
    .wrap{
      padding:28px;
      max-width:1100px;
      margin:0 auto;
    }

    .headerRow{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap:16px;
      margin-bottom:14px;
    }
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

    .btnPrimary{
      background:#ee601a;
      width: 200px;
      margin-top: 20px;
      border:none;
      color:#fff;
      font-weight:800;
      font-size: 15px;
      padding:7px 16px;
      border-radius: 20px;
      cursor:pointer;
      box-shadow:0 4px 10px rgba(0,0,0,.12);
      white-space:nowrap;
    }

    /* ===== MAIN CARD ===== */
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

    /* ===== TABLE HEADERS PILLS ===== */
    .headRow{
      display:grid;
      grid-template-columns: 1.4fr 1.1fr 1fr 1fr 40px; /* last = dots column */
      gap: 12px;
      padding: 0 6px 10px;
      width: 100%;
      align-items:center;
    }
    .pill{
      display:block;
      background:#21085b;
      color:#fff;
      width: 100%;
      font-weight:900;
      font-size:12px;
      padding:6px 10px;
      border-radius: 10px;
      text-align:center;
      box-shadow: 0 2px 0 rgba(0,0,0,.12);
    }

    /* ===== ROWS ===== */
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
      text-align: center;
      white-space: nowrap;
    }
    .muted{ color:#444; font-weight:700; }

    /* ===== 3 DOTS MENU ===== */
    .menuWrap{ position:relative; display:flex; justify-content:center; }
    .dots{
      width:34px;height:34px;border-radius:10px;
      display:grid;place-items:center;
      cursor:pointer;
    }
    .dots:after{
      content:"";
      width:4px;height:4px;border-radius:50%;
      background:#2c195b;
      box-shadow: 0 8px 0 #2c195b, 0 -8px 0 #2c195b;
      display:block;
    }

    .dropdown{
      position:absolute;
      right:-6px;
      top:36px;
      background:#fff;
      border:1px solid #ddd;
      border-radius:10px;
      width:140px;
      box-shadow:0 12px 22px rgba(0,0,0,.18);
      overflow:hidden;
      display:none;
      z-index:5;
    }
    .dropdown.open{ display:block; }
    .dropItem{
      display:flex;
      align-items:center;
      gap:10px;
      padding:10px 12px;
      cursor:pointer;
      font-weight:800;
      color:#222;
      font-size:13px;
    }
    .dropItem:hover{ background:#f2f2f2; }
    .dropIcon{
      width:16px;height:16px; border-radius:4px;
      display:inline-block;
      background:#eee;
    }
    .dropDelete{
      color:#e53935; /* red */
    }


    /* ===== ADD PAGE VIEW ===== */
    .field{
      margin-top:10px;
    }
    .labelPill{
      display:inline-block;
      background:#2c195b;
      color:#fff;
      font-weight:800;
      font-size:12px;
      padding:6px 14px;
      border-radius: 10px;
      width: 150px;
      text-align:center;
      margin-bottom:6px;
    }
    input[type="text"]{
      width:100%;
      padding:12px 14px;
      border:1px solid #cfcfcf;
      border-radius:10px;
      outline:none;
      font-weight:700;
    }
    textarea{
      width:100%;
      min-height:260px;
      padding:14px;
      border:1px solid #cfcfcf;
      border-radius:12px;
      outline:none;
      resize:none;
      font-weight:700;
    }

    .topFormRow{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:14px;
      margin-bottom:14px;
    }

    .linkBtn{
      background:transparent;
      border:none;
      color:#21085b;
      font-weight:850;
      cursor:pointer;
      padding:0;
    }

    @media (max-width: 900px){
      .headRow, .row{
        grid-template-columns: 1.4fr 1fr 1fr 1fr 44px;
      }
    }
    @media (max-width: 640px){
      .headRow, .row{
        grid-template-columns: 1.4fr 1fr 1fr 0.9fr 40px;
      }
      .headerRow{ flex-direction:column; align-items:flex-start; }
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
      <a class="active" href="/admins.pages">Pages</a>
      <a href="/admins.activitylog">Activity Log</a>
    </nav>

    <div class="profile-icon">
      <a href="/users.profile">     
        <img src="/assets/account_circle.png" width="35" height="35">
      </a>
    </div>
  </header>

  <div class="shell">
    <div class="wrap">

      <div class="headerRow">
        <div class="pageTitle">
          <h1>Pages</h1>
          <p>Manage static pages for your website!</p>
        </div>

        <!-- TOP BUTTON (HIDE when Add View opens) -->
        <button class="btnPrimary" id="addNewBtn" type="button">ADD NEW PAGE</button>
      </div>

      <!-- ========================= -->
      <!-- LIST VIEW (TABLE) -->
      <!-- ========================= -->
      <div id="listView">
        <section class="main-card">
          <div class="inner">

            <div class="headRow">
              <div><span class="pill">TITLE</span></div>
              <div class="hideSm"><span class="pill">AUTHOR</span></div>
              <div class="hideSm"><span class="pill">STATUS</span></div>
              <div class="hideSm"><span class="pill">UPDATED</span></div>
              <div></div>
            </div>

            <div class="rows" id="rows"></div>

          </div>
        </section>
      </div>

      <!-- ========================= -->
      <!-- ADD VIEW (TITLE BOX + CONTENT BOX) -->
      <!-- ========================= -->
      <div id="addView" style="display:none;">

        <!-- TITLE BOX (separate box) -->
        <section class="main-card" style="margin-bottom:18px;">
          <div class="inner" style="min-height:auto;">
            <div style="display:flex; align-items:center; gap:16px;">
              <div style="flex:1;">
                <div class="labelPill">TITLE</div>
                <input id="pageTitleInput" type="text" placeholder="Enter page title.." />
              </div>

              <!-- BUTTON MUST BE HERE ONLY -->
              <button class="btnPrimary" id="saveBtn" type="button">ADD NEW PAGE</button>
            </div>
          </div>
        </section>

        <!-- CONTENT BOX (separate box) -->
        <section class="main-card">
          <div class="inner" style="min-height:auto;">
            <div class="labelPill">CONTENT</div>
            <textarea id="pageContentInput" placeholder="Write your content here....."></textarea>

            <div style="margin-top:12px;">
              <button class="linkBtn" id="backBtn" type="button">← Back to Pages</button>
            </div>
          </div>
        </section>

      </div>

    </div>
  </div>

  <script>
    const DATA = [
      { title: "About Us", author: "Admin", status: "Published", updated: "January 4, 2025" },
      { title: "Privacy Policy", author: "Admin", status: "Published", updated: "January 3, 2025" },
      { title: "Contact Us", author: "Admin", status: "Published", updated: "January 3, 2025" },
      { title: "Terms and Condition", author: "Admin", status: "Published", updated: "January 3, 2025" },
    ];

    const rowsEl = document.getElementById("rows");
    const listView = document.getElementById("listView");
    const addView = document.getElementById("addView");

    const addNewBtn = document.getElementById("addNewBtn");
    const backBtn  = document.getElementById("backBtn");
    const saveBtn  = document.getElementById("saveBtn");

    const pageTitleInput = document.getElementById("pageTitleInput");
    const pageContentInput = document.getElementById("pageContentInput");

    function closeAllDropdowns(){
      document.querySelectorAll(".dropdown.open").forEach(d => d.classList.remove("open"));
    }

    function renderRows(){
      rowsEl.innerHTML = "";

      DATA.forEach((item, idx) => {
        const row = document.createElement("div");
        row.className = "row";

        row.innerHTML = `
          <div class="cell">${item.title}</div>
          <div class="cell hideSm">${item.author}</div>
          <div class="cell hideSm">${item.status}</div>
          <div class="cell hideSm">${item.updated}</div>

          <div class="menuWrap">
            <div class="dots" data-idx="${idx}" aria-label="More"></div>

            <div class="dropdown" id="dd-${idx}">
              <div class="dropItem" data-action="draft" data-idx="${idx}">
                <span class="dropIcon">
                  <img src="/assets/draft.png" width="20" alt="Draft">
                </span>
                Draft
              </div>

              <div class="dropItem" data-action="edit" data-idx="${idx}">
                <span class="dropIcon">
                  <img src="/assets/edit.png" width="20" alt="Edit">
                </span>
                Edit
              </div>

              <div class="dropItem dropDelete" data-action="delete" data-idx="${idx}">
                <span class="dropIcon">
                  <img src="/assets/delete.png" width="20" alt="Delete">
                </span>
                Delete
              </div>
            </div>
          </div>
        `;

        rowsEl.appendChild(row);
      });
    }

    // Toggle to Add View
    addNewBtn.addEventListener("click", () => {
      addNewBtn.style.display = "none";   // hide top button

      listView.style.display = "none";
      addView.style.display  = "block";
      closeAllDropdowns();
    });

    // Back to list
    backBtn.addEventListener("click", () => {
      addNewBtn.style.display = "inline-block"; // show top button again

      addView.style.display = "none";
      listView.style.display = "block";
      closeAllDropdowns();
    });

    // Save (UI-only)
    saveBtn.addEventListener("click", () => {
      const t = pageTitleInput.value.trim();
      const c = pageContentInput.value.trim();

      if(!t){
        alert("Please enter a page title.");
        return;
      }

      const now = new Date();
      const monthNames = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      const stamp = `${monthNames[now.getMonth()]} ${now.getDate()}, ${now.getFullYear()}`;

      DATA.unshift({
        title: t,
        author: "Admin",
        status: "Draft",
        updated: stamp
      });

      pageTitleInput.value = "";
      pageContentInput.value = "";

      renderRows();

      addView.style.display = "none";
      listView.style.display = "block";
      addNewBtn.style.display = "inline-block";
    });

    // 3-dots open/close
    document.addEventListener("click", (e) => {
      const dots = e.target.closest(".dots");
      const item = e.target.closest(".dropItem");

      if(dots){
        const idx = dots.getAttribute("data-idx");
        const dd = document.getElementById(`dd-${idx}`);

        const isOpen = dd.classList.contains("open");
        closeAllDropdowns();
        if(!isOpen) dd.classList.add("open");
        return;
      }

      if(item){
        const action = item.getAttribute("data-action");
        const idx = Number(item.getAttribute("data-idx"));
        closeAllDropdowns();

        if(action === "delete"){
          if(confirm(`Delete "${DATA[idx].title}"?`)){
            DATA.splice(idx, 1);
            renderRows();
          }
        } else if(action === "edit"){
          listView.style.display = "none";
          addView.style.display = "block";
          addNewBtn.style.display = "none";
          pageTitleInput.value = DATA[idx].title;
          pageContentInput.value = "";
        } else if(action === "draft"){
          DATA[idx].status = "Draft";
          renderRows();
        }
        return;
      }

      closeAllDropdowns();
    });

    renderRows();
  </script>
</body>

</html>
