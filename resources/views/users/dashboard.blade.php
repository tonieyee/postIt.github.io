<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User-Dashboard</title>

  <style>
    *{ box-sizing:border-box; }
    body{
      margin:0;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background: linear-gradient(180deg, #ff6a00, #a04408ff);
    }

    /* Top bar */
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

    /* Page */
    .page{
      max-width: 1200px;
      margin: 55px auto 30px;
      padding: 0 12px;
      position: relative;
    }

    .welcome{
      margin: 10px 0 2px;
      font-size: 34px;
      font-weight: 800;
      color:#111;
    }
    .subtitle{
      margin: 0 0 18px;
      color:#2b1b6f;
      font-weight: 700;
      font-size: 15px;
    }

    /* ===== Stats row ===== */
    .stats-row{
      display:flex;
      gap: 100px;
      margin: 10px 0 18px;
      padding: 10px 190px; 
    }

    .stat-card{
      background:#0a8a0a;
      color:#fff;
      width: 250px;
      height: 170px;
      border-radius: 10px;
      padding: 12px 12px 10px;
      box-shadow: 0 3px 0 rgba(0,0,0,.18);
      display:flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .stat-top{
      display:flex;
      align-items:flex-start;
      justify-content: space-between;
      gap: 10px;
    }

    .stat-icon{
      width: 70px;
      height: 70px;
      overflow:hidden;
      flex: 0 0 auto;
      display:flex;
      align-items:center;
      justify-content:center;
    }

    .stat-icon img{
      width:100%;
      height:100%;
      object-fit: contain;
      display:block;
    }

    .stat-number{
      font-size: 80px;
      font-weight: 600;
      line-height: 1;
      margin: 20px 25px 0 25px;

    }

    .stat-label{
      font-size: 15px;
      font-weight: 550;
      letter-spacing: .8px;
      text-align: center;
      margin-bottom: 15px;
    }
    
    
    .shell{
      position: relative;
      isolation:isolate;
      min-height: 100vh;
      padding: 14px 18px 30px;
      overflow: hidden; /* hides extra part of the curve */
    }

    /* This is the BIG white curved shape */
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
        

    .notif{
      margin: 0 100px;
      background: #fff;
      border-radius: 20px;
      padding: 14px;
      box-shadow: 0 2px 0 rgba(0,0,0,.08);
      min-height: 150px;
      max-width: 1150px;
      position: relative;
    }
    .notif-box{
      display:flex;
      align-items:center;
      gap: 10px;
      color:#2b1b6f;
      margin-bottom: 10px;

    }
    .notif-box h2{
      margin:0;
      font-size: 14px;
      letter-spacing: .4px;
      font-weight: 800;
    }

    .notif-item{
      display:flex;
      align-items:center;
      gap: 12px;
      background:#1f0b5f;
      color:#fff;
      border-radius: 10px;
      padding: 10px 12px;
      margin-bottom: 10px;
    }

    .avatar{
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background:#fff;
      color:#1f0b5f;
      display:flex;
      align-items:center;
      justify-content:center;
      font-weight: 900;
    }
    .notif-text{
      font-size: 14px;
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
      <a class="active" href="/users.dashboard">Dashboard</a>
      <a href="/users.contents">Contents</a>
      <a href="/users.newpost">New Post</a>
    </nav>

    <div class="profile-icon">
      <a href="/users.profile">     
        <img src="/assets/account_circle.png" width="35" height="35">
      </a>    
    </div>
  </header>
    
    <div class="shell">
      <div class="page">

        <div class="welcome">Welcome, Katy!</div>
        <div class="subtitle">Your space to create, edit, and manage your posts starts here.</div>

        {{-- Stats cards --}}
        <div class="stats-row">

          <div class="stat-card">
            <div class="stat-top">
              <div class="stat-icon">
                <img src="/assets/tot-Post.png" alt="Total Post">
              </div>
              <div class="stat-number">3</div>
            </div>
            <div class="stat-label">TOTAL POST</div>
          </div>

          <div class="stat-card">
            <div class="stat-top">
              <div class="stat-icon">
                <img src="/assets/drafts.png" alt="Drafts">
              </div>
              <div class="stat-number">2</div>
            </div>
            <div class="stat-label">DRAFTS</div>
          </div>

          <div class="stat-card">
            <div class="stat-top">
              <div class="stat-icon">
                <img src="/assets/published.png" alt="Published">
              </div>
              <div class="stat-number">5</div>
            </div>
            <div class="stat-label">PUBLISHED</div>
          </div>
        </div>
      </div>


        {{-- NOTIFICATIONS --}}
        <section class="notif">
          <div class="notif-box">
              <img src="/assets/notifications_active.png" width="20" height="20">
              <h2>NOTIFICATIONS</h2>
            </div>

            <div class="notif-item">
              <div class="avatar">JM</div>
              <div class="notif-text">Jayson Mayor posted: “Getting Started with Content Creation”</div>
            </div>

            <div class="notif-item">
              <div class="avatar">SB</div>
              <div class="notif-text">Severino Bedis posted: “Upcoming Features”</div>
            </div>
          </div>
        </section>
      
    </div>
  
</body>
</html>
