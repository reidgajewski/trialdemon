<?php
  session_start();
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Savings Calculator</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./trialdemon/public/imgs/logofinal.png">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YDH873B4DR"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-YDH873B4DR');
  </script>

</head>
<body class="">
<div class="min-h-full">   
<!-- nav -->
  <nav class="bg-[#181c2c]">
    <!-- Desktop stuff -->
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="./trialdemon/public/imgs/logofinal.png" alt="Your Company">
          </div>
          <!-- Desktop links -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

              <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Free trial list</a>

              <a href="./features?hide=true" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

              <a href="./referral" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Referral Program</a>

            </div>
          </div>
        </div>
        <!-- desktop profile -->
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div class="relative ml-3">
              <div>
                <button id="desktopDropdownButton" class="flex max-w-xs items-center rounded-full  text-sm "  aria-expanded="false" >
                  <svg id="desktopClosed" style="display: block" class=" h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
                  <svg id="desktopOpen" style="display: none" class=" h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
              <div id="desktopDropdown" style="display: none" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" >
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="./account" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Account</a>

                <a href="./logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <div class="-mr-2 pr-1 flex md:hidden">
          <!-- Mobile menu button -->
          <button  id="mobileButton" class="inline-flex items-center justify-center rounded-md p-2  bg-gray-700 text-white outline-none  ring-offset-2 ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!--
              Heroicon name: outline/bars-3

              Menu open: "hidden", Menu closed: "block"
            -->
            <svg id="mobileOpen" style="display: block" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!--
              Heroicon name: outline/x-mark

              Menu open: "block", Menu closed: "hidden"
            -->
            <svg id="mobileClose" style="display: none" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu -->
    <div style="display: none" class=" md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

        <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Free trial list</a>

        <a href="./features?hide=true" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>

        <a href="./referral" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Referral Program</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0 px-2">
          <a href="./account" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Account</a>

          <a href="./logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <header class="bg-white shadow">
    <div class="mx-auto max-w-full py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Savings Calculator</h1>
    </div>
  </header>



<!-- count -->
<div class="mt-10 md:pt-2 mb-3 md:mb-4 text-center text-gray-900 text-4xl md:text-5xl">
  <i class="hidden fa-solid fa-calculator"></i>
</div>
<div>
  <div class="flex justify-center items-center mt-2 md:mt-2">
    <p class="text-center text-lg md:text-xl  text-gray-900 max-w-[85%] leading-6">Select your favorite websites to see how much you can save with TrialDemon</p>
  </div>
</div>

<!-- sheeesh -->
<div class="flex justify-center items-center pt-10 md:mt-6 mb-4 ">
  <div class="grid grid-cols-2 md:grid-cols-3 gap-4 max-w-2xl lg:max-w-[70%] px-8 lg:px-32 xl:px-40">
    <!-- we call this best practices -->
    <div id="canva" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-canva.png" alt="Placeholder">
    </div>

    <div id="hbo" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-hbo.png" alt="Placeholder">
    </div>
  
    <div id="hulu" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-hulu.png" alt="Placeholder">
    </div>

    <div id="showtime" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-showtime.png" alt="Placeholder">
    </div>

    <div id="quizlet" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-quizlet.png" alt="Placeholder">
    </div>

    <div id="adobe" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-adobe.png" alt="Placeholder">
    </div>

    <div id="yt" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-yt.png" alt="Placeholder">
    </div>

    <div id="headspace" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-headspace.png" alt="Placeholder">
    </div>

    <div id="skillshare" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-skillshare.png" alt="Placeholder">
    </div>

    <div id="calm" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-calm.png" alt="Placeholder">
    </div>

    <div id="fubo" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-fubo.png" alt="Placeholder">
    </div>

    <div id="amc" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-amc.png" alt="Placeholder">
    </div>

    <div id="duolingo" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-duolingo.png" alt="Placeholder">
    </div>

    <div id="prime" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-prime.png" alt="Placeholder">
    </div>

    <div id="audible" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-audible.png" alt="Placeholder">
    </div>

    <div id="crunchy" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-crunchy.png" alt="Placeholder">
    </div>

    <div id="paramount" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-paramount.png" alt="Placeholder">
    </div>
  
    <div id="fox" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-fox.png" alt="Placeholder">
    </div>

    <div id="espn" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-espn.png" alt="Placeholder">
    </div>

    <div id="vimeo" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-vimeo.png" alt="Placeholder">
    </div>

    <div id="starz" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-starz.png" alt="Placeholder">
    </div>

    <div id="coursera" class="cursor-pointer border md:border-2 border-gray-300 rounded-3xl overflow-hidden md:hover:shadow-md" aria-clicked="false">
      <img class="cursor-pointer block h-auto w-full md:px-4 md:pt-2" src="./trialdemon/public/imgs/final-coursera.png" alt="Placeholder">
    </div>

  </div>
</div>
<p class="text-center mb-28 mt-1.5">And thousands of other websites...</p>

<div id="nextButton" class='fixed bottom-10 w-full' style="display:none">
  <a href="activate1">
    <button class='bottom-0 mr-4 my-8 float-right px-7 py-3 md:px-8 md:py-4 bg-bookmark-purple hover:bg-purple-highlight text-white text-md md:text-lg font-bold shadow-2xl tracking-wide rounded-full focus:outline-none'>Next</button>
  </a>
</div>

<footer class="bg-[#ffffff8d] backdrop-blur-lg text-3xl fixed border border-t-1 border-b-0 border-gray-300 inset-x-0 bottom-0 p-4">
  <h2 class=" text-center text-xl font-extrabold text-gray-900">You'll save <span id="count" class="text-bookmark-purple animate-pulse ">$0</span> per month <span id="emoji">😐</span></h2>
</footer>

</div>

<script src="./trialdemon/js/calculator.js"></script>
</body>
</html>