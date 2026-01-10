{{-- 
  NEW POST UI ONLY (Frontend)
  - Title input
  - Categories dropdown
  - Upload Image modal/popup
  - Content textarea
  - Save Draft & Publish buttons at bottom-right
  No redirects / No controller / No DB yet
--}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User-New Post</title>

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
    }
    .hero p{
      margin: 5px 0 0;
      font-size: 15px;
      color:#2b1b6f;
      font-weight: 700;
      text-align: right;

    }

    /* ===== Top input card ===== */
    .top-card{
      background:#fff;
      border-radius: 10px;
      padding: 14px 16px;
      box-shadow: 0 3px 0 rgba(0,0,0,.12);
      margin-top: 25px; 
    }

    .top-actions{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 12px;
      margin-bottom: 10px;
    }

    .hero-text{
      display: relative;
      flex-direction: column;
    }

    /* Title row */
    .title-row{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap: 12px;
    }

    .field{
      flex: 1 1 auto;
      max-width: 630px;
    }

    .label-pill{
      display:inline-block;
      background:#21085b;
      color:#fff;
      font-weight: 900;
      font-size: 12px;
      letter-spacing: .6px;
      text-transform: uppercase;
      padding: 6px 12px;
      border-radius: 10px;
      box-shadow: 0 2px 0 rgba(0,0,0,.12);
      margin-bottom: 6px;
      min-width: 140px;
      text-align:center;
    }

    .field input{
      width:100%;
      border:1px solid #d9d9d9;
      border-radius: 10px;
      padding: 10px 12px;
      font-size: 13px;
      outline:none;
    }

    .right-tools{
      display:flex;
      gap: 20px;
      align-items:flex-start;
      justify-content:flex-end;
      flex: 0 0 auto;
      position: relative;
      margin-top: 25px;
    }

    /* Categories dropdown */
    .dropdown{
      position: relative;
    }

    .drop-btn{
      border:none;
      cursor:pointer;
      padding: 6px 16px;
      border-radius: 14px;
      font-weight: 900;
      font-size: 12px;
      letter-spacing: .4px;
      color:#fff;
      background:#f06418;
      box-shadow: 0 2px 0 rgba(0,0,0,.15);
      text-transform: uppercase;
      min-width: 140px;
    }

    .drop-btn.active{
      background:#0a8a0a; /* green when open like your ref */
    }

    .drop-menu{
      position:absolute;
      top: 40px;
      left: 0;
      width: 160px;
      background:#fff;
      border:1px solid #d9d9d9;
      border-radius: 10px;
      box-shadow: 0 10px 24px rgba(0,0,0,.18);
      padding: 10px;
      display:none;
      z-index: 60;
    }

    .drop-menu.open{ display:block; }

    .drop-item{
      width: 100%;
      border:none;
      cursor:pointer;
      padding: 6px 10px;
      border-radius: 20px;
      margin-bottom: 8px;
      font-weight: 900;
      font-size: 12px;
      letter-spacing: .4px;
      color:#fff;
      background:#f06418;
      text-transform: uppercase;
    }
    .drop-item:last-child{ margin-bottom:0; }

    .selected-cat{
      margin-top: 6px;
      font-size: 11px;
      color:#444;
      font-weight: 700;
      text-align:right;
    }

    /* Upload Image */
    .upload-btn{
      border:none;
      cursor:pointer;
      padding: 6px 16px;
      border-radius: 14px;
      font-weight: 900;
      font-size: 11px;
      letter-spacing: .4px;
      color:#fff;
      background:#f06418;
      box-shadow: 0 2px 0 rgba(0,0,0,.15);
      text-transform: uppercase;
      min-width: 140px;
    }

    /* ===== Content big panel ===== */
    .panel{
      margin-top: 16px;
      background:#21085b;
      border-radius: 10px;
      padding: 14px;
      box-shadow: 0 3px 0 rgba(0,0,0,.18);
      position: relative;
    }

    .panel-inner{
      background:#fff;
      border-radius: 10px;
      padding: 14px;
      min-height: 420px;
    }

    .textarea-wrap textarea{
      width:100%;
      min-height: 300px;
      border:1px solid #d9d9d9;
      border-radius: 10px;
      padding: 12px;
      font-size: 13px;
      outline:none;
      resize: none;
    }

    /* Bottom-right save buttons (as requested) */
    .bottom-actions{
      position: absolute;
      right: 18px;
      bottom: 25px;
      display:flex;
      gap: 10px;
    }

    .action-btn{
      border:none;
      cursor:pointer;
      padding: 7px 16px;
      border-radius: 14px;
      font-weight: 900;
      font-size: 12px;
      letter-spacing: .4px;
      color:#fff;
      background:#f06418;
      box-shadow: 0 2px 0 rgba(0,0,0,.18);
      text-transform: uppercase;
      min-width: 130px;
    }

    /* ===== Upload Modal ===== */
    .modal-backdrop{
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,.45);
      display:none;
      align-items:center;
      justify-content:center;
      z-index: 200;
      padding: 18px;
    }
    .modal-backdrop.open{ display:flex; }

    .modal{
      width: 520px;
      max-width: 100%;
      border-radius: 12px;
      overflow:hidden;
      box-shadow: 0 20px 40px rgba(0,0,0,.25);
      background:#fff;
    }

    .modal-top{
      background:#21085b;
      color:#fff;
      padding: 12px 14px;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
    }
    .modal-top strong{
      font-weight: 900;
      letter-spacing: .4px;
      font-size: 12px;
      text-transform: uppercase;
    }
    .close-btn{
      border:none;
      background: transparent;
      color:#fff;
      cursor:pointer;
      font-size: 18px;
      line-height: 1;
      padding: 4px 8px;
      border-radius: 8px;
    }
    .close-btn:hover{ background: rgba(255,255,255,.12); }

    .modal-body{
      padding: 14px;
    }

    .dropzone{
      border:2px dashed #d0d0d0;
      border-radius: 12px;
      padding: 18px;
      text-align:center;
      background:#fafafa;
    }
    .dropzone p{
      margin: 0 0 10px;
      font-size: 12px;
      color:#444;
      font-weight: 700;
    }

    .file-input{
      display:none;
    }

    .pick-btn{
      border:none;
      cursor:pointer;
      padding: 7px 16px;
      border-radius: 14px;
      font-weight: 900;
      font-size: 11px;
      letter-spacing: .4px;
      color:#fff;
      background:#f06418;
      box-shadow: 0 2px 0 rgba(0,0,0,.15);
      text-transform: uppercase;
    }

    .preview{
      margin-top: 12px;
      display:none;
      gap: 12px;
      align-items:center;
      justify-content:flex-start;
    }
    .preview.open{ display:flex; }

    .thumb{
      width: 84px;
      height: 84px;
      border-radius: 10px;
      border:1px solid #d9d9d9;
      background:#fff;
      overflow:hidden;
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .thumb img{
      width:100%;
      height:100%;
      object-fit: cover;
      display:block;
    }
    .file-name{
      font-size: 12px;
      font-weight: 800;
      color:#111;
      word-break: break-word;
    }

    .modal-actions{
      margin-top: 14px;
      display:flex;
      justify-content:flex-end;
      gap: 10px;
    }
    .ghost{
      background:#2b1b6f;
    }

    /* Responsive */
    @media (max-width: 860px){
      .title-row{ flex-direction: column; }
      .field{ max-width: 100%; }
      .right-tools{ justify-content:flex-start; flex-wrap: wrap; }
      .bottom-actions{ position: static; margin-top: 12px; justify-content:flex-end; }
      .panel{ padding-bottom: 14px; }
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
      <a href="/users.contents">Contents</a>
      <a class="active" href="users.newpost">New Post</a>
    </nav>

    <div class="profile-icon">
      <a href="/users.profile">     
        <img src="/assets/account_circle.png" width="35" height="35">
      </a>    
    </div>

  </header>

  <div class="shell">
    <div class="content">
      <div class="hero">
            <div>
              <h1>Create another post!</h1>
              <p>Create and share your ideas with the community.</p>
            </div>
          </div>

      <div class="top-card">

                <!-- Title + right tools -->
        <div class="title-row">
          <div class="field">
            <div class="label-pill">Title</div>
            <input type="text" placeholder="Enter post title..." />
          </div>

          <div class="right-tools">
            <!-- Categories dropdown -->
            <div class="dropdown">
              <button id="catBtn" class="drop-btn" type="button">Categories</button>
              <div id="catMenu" class="drop-menu" aria-label="Categories menu">
                <button class="drop-item" type="button" data-cat="Sports">Sports</button>
                <button class="drop-item" type="button" data-cat="News">News</button>
                <button class="drop-item" type="button" data-cat="Lifestyle">Lifestyle</button>
                <button class="drop-item" type="button" data-cat="Food">Food</button>
              </div>
            <div id="catSelected" class="selected-cat"></div>
          </div>

            <!-- Upload Image modal trigger -->
            <button id="uploadBtn" class="upload-btn" type="button">Upload Image</button>
          </div>
        </div>
      </div>

      <!-- Content big panel -->
      <div class="panel">
        <div class="panel-inner">
          <div class="label-pill">Content</div>

          <div class="textarea-wrap">
            <textarea placeholder="Write your content here...."></textarea>
          </div>
        </div>

        <!-- Bottom-right buttons (requested) -->
        <div class="bottom-actions">
          <button class="action-btn" type="button">Save Draft</button>
          <button class="action-btn" type="button">Publish</button>
        </div>
      </div>

    </div>
  </div>

  <!-- Upload Image Modal -->
  <div id="modalBackdrop" class="modal-backdrop" aria-hidden="true">
    <div class="modal" role="dialog" aria-modal="true" aria-label="Upload image">
      <div class="modal-top">
        <strong>Upload Image</strong>
        <button id="closeModal" class="close-btn" type="button" aria-label="Close">✕</button>
      </div>

      <div class="modal-body">
        <div class="dropzone">
          <p>Choose an image file to upload.</p>

          <input id="fileInput" class="file-input" type="file" accept="image/*">

          <button id="pickFile" class="pick-btn" type="button">Choose File</button>

          <div id="preview" class="preview">
            <div class="thumb"><img id="previewImg" alt="Preview"></div>
            <div class="file-name" id="fileName"></div>
          </div>
        </div>

        <div class="modal-actions">
          <button id="cancelUpload" class="pick-btn ghost" type="button">Cancel</button>
          <button id="doneUpload" class="pick-btn" type="button">Done</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // ===== Categories dropdown =====
    const catBtn = document.getElementById('catBtn');
    const catMenu = document.getElementById('catMenu');
    const catSelected = document.getElementById('catSelected');

    function closeCat(){
      catMenu.classList.remove('open');
      catBtn.classList.remove('active');
    }

    catBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = catMenu.classList.toggle('open');
      catBtn.classList.toggle('active', isOpen);
    });

    document.querySelectorAll('[data-cat]').forEach(btn => {
      btn.addEventListener('click', () => {
        const val = btn.getAttribute('data-cat');
        catSelected.textContent = `Selected: ${val}`;
        closeCat();
      });
    });

    // ===== Upload modal =====
    const modalBackdrop = document.getElementById('modalBackdrop');
    const uploadBtn = document.getElementById('uploadBtn');
    const closeModal = document.getElementById('closeModal');
    const cancelUpload = document.getElementById('cancelUpload');
    const doneUpload = document.getElementById('doneUpload');

    const pickFile = document.getElementById('pickFile');
    const fileInput = document.getElementById('fileInput');

    const preview = document.getElementById('preview');
    const previewImg = document.getElementById('previewImg');
    const fileName = document.getElementById('fileName');

    function openModal(){
      modalBackdrop.classList.add('open');
      modalBackdrop.setAttribute('aria-hidden', 'false');
    }
    function closeModalFn(){
      modalBackdrop.classList.remove('open');
      modalBackdrop.setAttribute('aria-hidden', 'true');
    }

    uploadBtn.addEventListener('click', () => {
      closeCat();
      openModal();
    });
    closeModal.addEventListener('click', closeModalFn);
    cancelUpload.addEventListener('click', closeModalFn);
    doneUpload.addEventListener('click', closeModalFn);

    // close modal by clicking backdrop
    modalBackdrop.addEventListener('click', (e) => {
      if(e.target === modalBackdrop) closeModalFn();
    });

    pickFile.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', () => {
      const file = fileInput.files?.[0];
      if(!file) return;

      fileName.textContent = file.name;

      const url = URL.createObjectURL(file);
      previewImg.src = url;

      preview.classList.add('open');
    });

    // close menus when clicking outside
    document.addEventListener('click', () => closeCat());
  </script>
</body>
</html>
