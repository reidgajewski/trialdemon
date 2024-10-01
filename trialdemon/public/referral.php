<?php
  session_start();
?>

<?php
    if (!$_SESSION["email"]) {
        header("Location: ./login?next=referral");
    }
?>


<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Referral</title>
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
<!-- nav -->
<div class="min-h-full">
  <nav class="bg-[#181c2c]">
    <!-- Desktop stuff -->
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <a href="./index">
            <img class="h-8 w-8" src="./trialdemon/public/imgs/logofinal.png" alt="Your Company">
            </a>
          </div>
          <!-- Desktop links -->
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>

              <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Free trial list</a>

              <a href="./features?hide=true" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

              <a href="./referral" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Referral Program</a>

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
        <a href="./dashboard" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>

        <a href="./list" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Free trial list</a>

        <a href="./features?hide=true" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>

        <a href="./referral" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Referral Program</a>


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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Referral Program</h1>
    </div>
  </header>

  <section class="relative overflow-hidden bg-gradient-to-b from-gray-100 to-white pt-12 sm:pt-16 lg:pt-18 xl:pt-18">
      <div class="absolute inset-x-0 top-0 h-96 rotate-180 text-gray-500/20 opacity-60 [mask-image:linear-gradient(to_bottom,transparent,white)]">
        <svg class="absolute inset-0 h-full w-full" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <pattern id="grid-pattern" width="32" height="32" patternUnits="userSpaceOnUse" x="50%" y="100%" patternTransform="translate(0 -1)"><path d="M0 32V.5H32" fill="none" stroke="currentColor"></path></pattern>
          </defs>
          <rect width="100%" height="100%" fill="url(#grid-pattern)"></rect>
        </svg>
      </div>
      <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-xl text-center lg:max-w-4xl">
          <h1 class="text-5xl font-bold tracking-tight text-gray-900 sm:text-6xl xl:text-7xl">Share us & get paid</h1>
          <h2 id="subHeading" class="mt-4 text-lg font-normal leading-7 text-gray-700 sm:text-xl lg:mx-auto lg:max-w-3xl xl:text-2xl xl:leading-9"></h2>
        </div>
        <div class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-center lg:mt-8 pb-8">
          <button id="mainButton" class="bg-[#0f172a] hover:bg-primary-700 inline-flex h-12 items-center justify-center rounded-xl border border-transparent px-6 py-2.5 text-base font-semibold text-white transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:ring-offset-2" role="button"></button>
          <button style="display: none" id="cashout" class="inline-flex h-12 items-center justify-center rounded-xl border border-gray-300 px-6 py-2.5 text-base font-semibold text-gray-700 transition-all duration-200 hover:border-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2" role="button">Cash Out</button>
          <p id="refCodeHolder" class="hidden text-xs"></p>
        </div>
      </div>
    </section>

  <!-- Number of referrals -->
  <div style="display: none" id="balanceDiv" class="flex justify-center items-center mt-1 md:mt-4 mx-6">
    <p  class="text-center text-lg">
        You have <span class="font-bold">$</span><span id="balance" class="font-bold"></span> in your referral account balance.
    </p>
  </div>

<!-- copied modal -->
<div style="visibility: hidden" id="copied">
  <div class=" backdrop-filter backdrop-blur shadow-sm fixed inset-x-0 bottom-0 mb-6 mx-auto z-50 p-2 w-3/4 md:w-84 lg:w-90 xl:w-90 rounded-lg bg-green-100">
    <div class=" text-center">
      <h3  class="text-sm leading-6 text-green-700"><span class="font-semibold">Copied!</span></h3>
    </div>
  </div>
</div>

<!-- cash out modal -->
<div style="display: none" id="cashout-modal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">

      <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full  sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
              <i class="text-4xl text-gray-900 fa-solid fa-circle-info"></i>
     
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Cash Out</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">To cashout your referral balance to your PayPal, cashapp, Venmo or bank account: email hello@TrialDemon.com ($25 minimum)</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="cashoutCancel" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50  sm:mt-0 sm:ml-0 sm:w-auto sm:text-sm">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>







<!-- closing main div tag -->
</div>

<script src="./trialdemon/js/referral.js"></script>
</body>
</html>