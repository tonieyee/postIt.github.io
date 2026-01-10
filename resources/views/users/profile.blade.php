
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Profile</title>

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

    /* Profile row layout */
    .profile-row{
      display:flex;
      gap: 250px;
      align-items: stretch;
    }

    /* Left card */
    .profile-card{
      flex: 1 1 auto;
      background:#fff;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 2px 0 rgba(0,0,0,.08);
      min-height: 160px;
    }
    .profile-inner{
      display:flex;
      gap: 20px;
      align-items:center;
    }

    .avatar{
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background:#0a8a0a;
    }
    .user-name{
      margin:0 0 6px;
      color:#0a8a0a;
      font-size: 34px;
      line-height: 1.1;
      font-weight: 800;
    }
    .user-handle{ /*user name with @*/
      margin:0 0 10px;
      font-size: 13px;
      color:#555;
    }
    .muted{
      font-size: 12px;
      color:#9a9a9a;
    }
    .about{
      margin: 6px 0 6px;
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
        

    .btn-stack{
      position:absolute;
      right: 22px;
      top: 40px;
      display:flex;
      flex-direction: column;
      gap: 15px;
      z-index: 2;
    }

    .btn{
      border:none;
      width: 200px;
      padding: 7px 14px;
      border-radius: 20px;
      font-weight: 790;
      cursor:pointer;
      color:#fff;
    }
    .btn.logout{ background:#0a8a0a; }
    .btn.delete{ background:#2b1b6f; }

    /* Activities card */
    .activities{
      margin-top: 16px;
      background:#fff;
      border-radius: 20px;
      padding: 14px;
      box-shadow: 0 2px 0 rgba(0,0,0,.08);
      min-height: 220px;
      position: relative;
    }
    .activities-header{
      display:flex;
      align-items:center;
      gap: 10px;
      color:#2b1b6f;
      margin-bottom: 10px;
    }
    .activities-header h2{
      margin:0;
      font-size: 14px;
      letter-spacing: .4px;
      font-weight: 800;
    }

    .activity-item{
      display:flex;
      align-items:center;
      gap: 12px;
      background:#1f0b5f;
      color:#fff;
      border-radius: 10px;
      padding: 10px 12px;
      margin-bottom: 10px;
    }
    .badge{
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
    .activity-text{
      font-size: 14px;
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
      <a href="/users.dashboard">Dashboard</a>
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

        <div class="profile-row">
          {{-- LEFT PROFILE CARD --}}
          <section class="profile-card">
            <div class="profile-inner">
              <div class="avatar" aria-hidden="true"></div>

              <div>
                {{-- Hardcoded for UI only --}}
                <h1 class="user-name">Katy Perry</h1>
                <div class="user-handle">@ktprry</div>

                <div class="about muted">About Me</div>
                <div class="muted"><em>Member since January 5, 2026</em></div>
              </div>
            </div>
          </section>

          {{-- RIGHT ACTION PANEL --}}
          <aside class="action-panel">
            <div class="btn-stack">
              <button class="btn logout" type="button">
                  LOGOUT
              </button>

              <button class="btn delete" type="button">
                  DELETE ACCOUNT
              </button>
            </div>
          </aside>
        </div>

        {{-- RECENT ACTIVITIES --}}
        <section class="activities">
          <div class="activities-header">
            <img src="/assets/notifications_active.png" width="20" height="20">
            <h2>RECENT ACTIVITIES</h2>
          </div>

          <div class="activity-item">
            <div class="badge">KP</div>
            <div class="activity-text">You posted: “California Girls”</div>
          </div>

          <div class="activity-item">
            <div class="badge">KP</div>
            <div class="activity-text">You drafted: “Dark Horse”</div>
          </div>

          <div class="activity-item">
            <div class="badge">KP</div>
            <div class="activity-text">You drafted: “Last Friday Night”</div>
          </div>
        </section>

        <div class="corner-curve" aria-hidden="true"></div>
      </div>
    </div>
</body>
</html>
