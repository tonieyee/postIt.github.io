{{-- 
  FEED UI ONLY (Frontend)
  - Plain white background
  - Post cards
  - Reactions (thumbs up / down) toggle + counts
  No redirects / No controller / No DB yet
--}}

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User-Feed</title>

  <style>
    *{ box-sizing:border-box; }
    body{
      margin:0;
      min-height: 100vh;
      font-family: Arial, sans-serif;
      background: linear-gradient(180deg, #ff6a00, #7e431cff);
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

    /* ===== Page ===== */
    .page{
      max-width: 920px;
      margin: 0 auto;
      padding: 16px 16px 40px;
    }

    /* Header text like your screenshot */
    .feed-hero{
      margin: 8px 0 16px;
    }
    .feed-hero h1{
      margin: 0;
      font-size: 30px;
      font-weight: 900;
      color:white;
    }
    .feed-hero p{
      margin: 6px 0 0;
      font-size: 15px;
      color:white;
      font-weight: 700;
    }

    /* ===== Post Card ===== */
    .post{
      background:#fff;
      border: 1px solid #e5e5e5;
      border-radius: 10px;
      box-shadow: 0 2px 0 rgba(0,0,0,.08);
      padding: 14px;
      margin: 14px 0;
    }

    .post-head{
      display:flex;
      align-items:flex-start;
      justify-content:space-between;
      gap: 12px;
      margin-bottom: 8px;
    }

    .author{
      font-weight: 900;
      color:#2b1b6f;
      font-size: 15px;
      margin-bottom: 2px;
    }

    .meta{
      font-size: 11px;
      color:#777;
      font-weight: 700;
    }

    .title{
      background:#21085b;
      color:#fff;
      font-weight: 900;

      border-radius: 10px;
      padding: 8px 20px;
      font-size: 12px;
      margin-top: 8px;
      display:inline-block;
      max-width: 100%;
    }

    .content{
      margin-top: 10px;
      background:#21085b;
      color:#fff;
      border-radius: 10px;
      padding: 12px;
      font-size: 12px;
      line-height: 1.5;
      white-space: pre-wrap;
    }

    /* ===== Reactions ===== */
    .reactions{
      display:flex;
      align-items:center;
      gap: 14px;
      margin-top: 10px;
    }

    .react-btn{
      border:none;
      background: transparent;
      cursor:pointer;
      display:flex;
      align-items:center;
      gap: 8px;
      font-weight: 900;
      color:#2b1b6f;
      padding: 6px 8px;
      border-radius: 10px;
    }
    .react-btn:hover{
      background:#f4f4f4;
    }

    .react-btn.active{
      background:#eaf6ea;
      color:#0a8a0a;
    }

    .icon{
      font-size: 18px;
      line-height: 1;
    }

    .count{
      font-size: 12px;
      color:#333;
      font-weight: 900;
    }

    /* small screen */
    @media (max-width: 520px){
      .navlinks{ gap: 18px; }
      .feed-hero h1{ font-size: 18px; }
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
      <a href="/users.newpost">New Post</a>

    </nav>

    <div class="profile-icon">
      <a href="/users.profile">     
        <img src="/assets/account_circle.png" width="35" height="35">
      </a>    
    </div>

  </header>

  <main class="page">
    <section class="feed-hero">
      <h1>Discover posts shared by the community.</h1>
      <p>Your space to create, edit, and manage your posts starts here.</p>
    </section>

    <!-- पोस्ट 1 -->
    <article class="post" data-post-id="1">
      <div class="post-head">
        <div>
          <div class="author">Jayson Mayor</div>
          <div class="meta"><img src="/assets/group.png" width="15" height="15"> January 3, 2026</div>
        </div>
      </div>

      <div class="title">“Getting Started with Content Creation”</div>

      <div class="content">
Creating meaningful content doesn't have to be complicated. Whether you are writing your first post or managing a community blog, the key is to start with a clear purpose.

Begin by identifying what you want to share with your readers. This could be an idea, an experience, or information that can help or inspire others. Once you have your topic, focus on organizing your thoughts. A clear structure makes your content easier to read and understand.

Next, write in a way that feels natural and authentic. You don't need to use complicated words or long sentences. Clear and direct writing helps your message reach more people. Before publishing, take a moment to review your content. Check for errors, and make sure it reflects what you want to say.

Creating valuable content takes practice, but every post is a step toward improving. Most importantly, stay consistent—your first post is the beginning of your content journey.
      </div>

      <div class="reactions">
        <button class="react-btn" data-react="up" type="button">
          <span class="icon">
            <img src="/assets/thumb_up.png" width="20">                    
          </span>
          <span class="count" data-count="up">25</span>
        </button>

        <button class="react-btn" data-react="down" type="button">
          <span class="icon">
            <img src="/assets/thumb_down.png" width="20">                   
          </span>
          <span class="count" data-count="down">3</span>
        </button>
      </div>
    </article>

    <!-- पोस्ट 2 -->
    <article class="post" data-post-id="2">
      <div class="post-head">
        <div>
          <div class="author">Katy Perry</div>
          <div class="meta"><img src="/assets/group.png" width="15" height="15"> 2h ago</div>
         
        </div>
      </div>

      <div class="title">“Roar”</div>

      <div class="content">
I used to bite my tongue and hold my breath. Scared to rock the boat and make a mess. So I sat quietly, agreed politely. I guess that I forgot I had a choice. I let you push me past the breaking point. I stood for nothing, so I fell for everything. You held me down, but I got up (hey). Already brushing off the dust

You hear my voice, you hear that sound. Like thunder, gonna shake the ground

You held me down, but I got up (hey). Get ready 'cause I've had enough. I see it all, I see it now. I got the eye of the tiger, a fighter. Dancing through the fire 'cause I am a champion. And you're gonna hear me roar. Louder, louder than a lion 'cause I am the champion. And you're gonna hear me roar. 

Now I'm floating like a butterfly. Stinging like a bee, I earned my stripes. I went from zero to my own hero. You held me down, but I got up (hey). Already brushing off the dust. You hear my voice, you hear that sound. Like thunder, gonna shake the ground. You held me down, but I got up (hey, got up). Get ready 'cause I've had enough. I see it all, I see it now. 
      </div>

      <div class="reactions">
        <button class="react-btn" data-react="up" type="button">
          <span class="icon">
            <img src="/assets/thumb_up.png" width="20">                    
          </span>
          <span class="count" data-count="up">12</span>
        </button>

        <button class="react-btn" data-react="down" type="button">
          <span class="icon">
            <img src="/assets/thumb_down.png" width="20">                   
          </span>
          <span class="count" data-count="down">1</span>
        </button>
      </div>
    
    </article>
</body>
</html>  