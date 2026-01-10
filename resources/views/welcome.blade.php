<!DOCTYPE html>
<html lang="en">
<head>
  <!-- [HEAD] Basic meta -->
  <meta charset="UTF-8" /> <!-- Charset -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Responsive -->
  <title>Post It! - Home Page</title>

  <!-- [FONT] Similar clean rounded font (optional) -->
  <link rel="preconnect" href="https://fonts.googleapis.com"> <!-- Google Fonts perf -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!-- Google Fonts perf -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet"> <!-- Font -->

  <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
  <script src="{{ asset('js/script.js')}}"></script>
</head>

<body>
  <!-- ========================= -->
  <!-- [NAVBAR] Top navigation -->
  <!-- ========================= -->
  <header class="topbar">
    <div class="web">
      <!-- [LOGO] Replace src with your logo path -->
      <!-- Example: assets/Logo.png -->
      <img class="web__logo" src="{{ asset('assets/Logo.png') }}" alt="Post It Logo" /> <!-- LOGO HERE -->
    </div>

    <nav class="navlinks">
      <!-- [NAV LINKS] Scroll to sections -->
      <a class="navlinks__item active" href="#home">Home</a> 
      <a class="navlinks__item" href="#about">About Us</a> 
      <a class="navlinks__item" href="#contact">Contact</a> 
    </nav>

    <!-- [LOGIN BUTTON] -->
    <a href="#" class="btn btn--login" data-auth="login">Login</a> <!-- Login button -->
  </header>

  <!-- ========================= -->
  <!-- [SECTION 1] HERO / HOME -->
  <!-- ========================= -->
  <main id="home" class="section section--hero">
    <div class="hero">
      <!-- [LEFT] Illustration inside big circle -->
      <div class="hero__left">
        <div class="heroRing">
          <div class="heroRing__inner">
            <img
              class="heroRing__img"
              src="{{ asset('assets/1p 1.png') }}"
              alt="Hero Illustration"
            />
         </div>
        </div>
      </div>

      <!-- [RIGHT] Headline + description + CTA -->
      <div class="logo__right">
       
        <div class="logoMark">
          <img class="logoMark__img" src="{{ asset('assets/Logo.png') }}" alt="Post It mark" /> <!-- SMALL LOGO HERE -->
        </div>

        <h1 class="heroTitle">
          Post <span class="accent accent--orange">Smarter</span>.<br />
          Manage <span class="accent accent--purple">Better</span>.<br />
          Publish <span class="accent accent--green">Faster</span>.
        </h1>

        <p class="heroText">
          Here in <span class="accent accent--green">Post It!</span>, users can create, organize,
          and manage content on one simple platform.
        </p>

        <p class="heroText">
          It allows easy publishing of articles while keeping everything structured,
          secure, and easy to use.
        </p>

        <a href="#" class="btn btn--primary" data-auth="login">Get Started</a> <!-- CTA button -->
      </div>
    </div>
  </main>

  <!-- ========================= -->
  <!-- [SECTION 2] ABOUT -->
  <!-- ========================= -->
  <section id="about" class="aboutSection">
    <!-- BLUE BACKGROUND -->
    <div class="aboutBg">
      <!-- WHITE OVAL -->
      <div class="aboutCircleWrap">
        <div class="aboutCircle">

          <!-- TOP LOGO (CENTER) -->
          <div class="aboutTopLogo">
            <!-- INSERT LOGO HERE -->
            <img src="{{ asset('assets/Logo.png') }}" alt="Post It logo" />
          </div>

          <!-- 2 COLUMNS -->
          <div class="aboutContent">
            <!-- LEFT -->
            <div class="aboutLeft">
              <h2 class="aboutTitle aboutTitle--orange">ABOUT US</h2>
              <p>
                Post It! is a content management platform designed to make creating, organizing,
                and publishing digital content simple and efficient. The system provides users
                with an intuitive space to write, edit, and manage articles while keeping
                everything structured and easy to access.
              </p>
              <p>
                Built with usability and organization in mind, Post It! supports different user roles
                to ensure that content is managed responsibly. Administrators oversee the platform
                and manage published content, while users are given the tools they need to contribute
                and maintain their own articles.
              </p>
              <p>
                Our goal is to provide a clean and reliable platform that helps individuals and teams focus
                on what matters most — sharing ideas, information, and stories in a clear and organized way.
                Whether for blogs, announcements, or informational content, Post It! offers a simple solution
                for effective content publishing.
              </p>
            </div>

            <!-- RIGHT -->
            <div class="aboutRight">
              <h2 class="aboutTitle aboutTitle--purple">OUR MISSION</h2>
              <p>
                At Post It!, our mission is to provide a simple and welcoming space where people can create, share,
                and manage meaningful content with ease. We aim to empower users to express ideas, tell stories, and
                organize information through a platform that values clarity, creativity, and accessibility.
              </p>

              <h2 class="aboutTitle aboutTitle--purple aboutTitle--spaced">OUR VISION</h2>
              <p>
                Our vision is to become a trusted digital space where creativity and communication thrive.
                We envision Post It! as a platform that encourages thoughtful sharing, supports content creators of all
                levels, and fosters a community built on collaboration, expression, and growth.
              </p>
            </div>
          </div>

          <!-- BUTTON CENTER -->
          <div class="aboutButtonWrap">
            <a href="#" class="btn btn--primary" data-auth="login">Get Started</a>
          </div>

        </div>
      </div>
    </div>
  </section>


  <!-- ========================= -->
  <!-- [SECTION 3] CONTACT -->
  <!-- ========================= -->
  <section id="contact" class="section section--contact">
    <div class="contactWrap">
      <!-- [CONTACT RING] same style as HERO -->
      <div class="contactRing">
        <div class="contactRing__inner">
          <!-- [CONTACT IMAGE] insert your contact illustration here -->
          <img
            class="contactRing__img"
            src="{{ asset('assets/2p 1.png') }}"
            alt="Contact Illustration"
          />
        </div>
      </div>


      <!-- [RIGHT] "get in touch!" content -->
      <div class="contactRight">
        <div class="contactMark">
          <img class="contactMark__img" src="{{ asset('assets/Logo.png') }}" alt="Post It mark" /> <!-- SMALL LOGO HERE -->
        </div>

        <h2 class="contactTitle">Get in touch!</h2>

        <p class="contactText">
          We’d love to hear from you! If you have questions, feedback, or need assistance,
          feel free to reach out using the details below.
        </p>

        <div class="contactInfo">
          <p class="contactLine">
            <span class="contactLabel">Email:</span>
            <span class="contactValue">support@postit.com</span>
          </p>

          <p class="contactLine">
            <span class="contactLabel">Phone:</span>
            <span class="contactValue">+63 912 345 6789</span>
          </p>

          <p class="contactLine contactLine--spaced">
            <span class="contactLabel">Office Hours:</span> <br>
            <span class="contactValue">Monday – Friday<br />9:00 AM – 5:00 PM</span>
          </p>
        </div>

        <p class="contactTagline">
          <br> Post <span class="accent accent--orange">Smarter</span>. Manage
          <span class="accent accent--purple">Better</span>. Publish
          <span class="accent accent--green">Faster</span>.
        </p>
      </div>
    </div>

    <!-- [FOOTER BAR] Green strip like screenshot -->
    <footer class="footerBar">
      <p class="footerBar__text">© Post It. All rights reserved.</p> <!-- Footer text -->
    </footer>
  </section>

  <!-- ========================= -->
  <!-- AUTH MODAL (Login/Register) -->
  <!-- ========================= -->
  <div class="authModal" id="authModal" aria-hidden="true">
    <!-- Overlay background (changes color via JS) -->
    <div class="authModal__overlay"></div>

    <!-- White card -->
    <div class="authCard" role="dialog" aria-modal="true">
      <!-- Logo -->
      <div class="authLogo">
        <!-- INSERT LOGO HERE -->
        <img src="{{ asset('assets/Logo.png') }}" alt="Post It logo" class="authLogo__img" />
      </div>

      <p class="authTagline">Share your IDEAS TODAY!</p>

      <!-- ===================== -->
      <!-- LOGIN FORM -->
      <!-- ===================== -->
      <form class="authForm is-active" id="loginForm" autocomplete="off">
        <label class="authField">
          <span class="authField__label">Email</span>
          <input class="authField__input" type="email" name="email" placeholder="" required />
        </label>

        <label class="authField">
          <span class="authField__label">Password</span>
          <input class="authField__input" type="password" name="password" placeholder="" required />
        </label>

        <!-- Admin checkbox -->
        <label class="authCheck">
          <input type="checkbox" id="adminCheck" name="is_admin" value="1" />
          <span>Admin</span>
        </label>

        <button class="authBtn authBtn--login" type="submit">Login</button>

        <p class="authSwitch">
          Don't have an account?
          <a href="#" data-switch="register">Register</a>
        </p>
      </form>

      <!-- ===================== -->
      <!-- REGISTER FORM -->
      <!-- ===================== -->
      <form class="authForm is-active" id="registerForm" autocomplete="off">
        <label class="authField">
          <span class="authField__label">Email</span>
          <input class="authField__input" type="email" name="email" placeholder="" required />
        </label>

        <label class="authField">
          <span class="authField__label">Password</span>
          <input class="authField__input" type="password" name="password" placeholder="" required />
        </label>

        <label class="authField">
          <span class="authField__label">Confirm Password</span>
          <input class="authField__input" type="password" name="password_confirmation" placeholder="" required />
        </label>

        <button class="authBtn authBtn--register" type="submit" >Register</button>
      </form>

      <!-- Close (optional, hidden in your screenshots but useful) -->
      <button class="authClose" type="button" aria-label="Close" data-close="true">✕</button>
    </div>
  </div>

  <!-- [JS] Optional small script (active nav highlight on scroll) -->
  <script src="script.js"></script>


</body>
</html>


