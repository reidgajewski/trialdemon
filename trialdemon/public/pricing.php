<?php
  session_start();
?>

<?php
    if (!$_SESSION["email"]) {
        header("Location: ./login?next=pricing");
    }
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pricing</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

              <a href="./features" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

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

        <a href="./features" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>


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

  <!-- <header class="bg-white shadow">
    <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Pricing</h1>
    </div>
  </header> -->


<!-- header -->
<section>
  <div class=" bg-white">
    <div class="max-w-2xl mx-auto mt-10 sm:mt-14 px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <!-- <i class="text-5xl  fa-solid fa-money-bill"></i> -->
        <h1 class="mt-2 sm:mt-2 text-4xl leading-8 font-extrabold tracking-tight text-gray-900 md:text-5xl">Select a plan</h1>
        <p class="mt-2 px-6 text-lg  text-center leading-normal text-gray-500 ">The average user saves $84/month with TrialDemon. <span id="demoButton" class="underline cursor-pointer">Watch demo</span>.</p>
      </div>   
    </div>
  </div>
</section>


<!-- plans -->
<div class="bg-white ">
    <div class="container px-6 pt-7 mx-auto">
        <div class="mt-2 space-y-5 sm:space-y-8 xl:mt-6">
            <div id="weekly" class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl ">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="weeklyCheck" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl">Weekly</h2>
                        <div class="px-2 text-xs text-bookmark-purple bg-gray-100 rounded-full sm:px-4 sm:py-1  ">
                            Save 0%
                        </div>                                 
                    </div>
                </div>

                <h2 id="weeklyText" class="text-2xl font-semibold text-gray-500 sm:text-4xl ">$3 <span class="text-base font-medium">/Week</span></h2>
            </div>

            <div id="monthly" class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border border-bookmark-purple cursor-pointer rounded-xl">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="monthlyCheck" class="w-5 h-5 text-bookmark-purple sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl">Monthly</h2>
                        <div class="px-2 text-xs text-bookmark-purple bg-gray-100 rounded-full sm:px-4 sm:py-1  ">
                            Save 50%
                        </div>
                    </div>
                </div>

                <h2 id="monthlyText" class="text-2xl font-semibold text-newBlue sm:text-4xl">$6 <span class="text-base font-medium">/Month</span></h2>
            </div>

            <div id="yearly" class="flex items-center justify-between max-w-2xl px-8 py-4 mx-auto border cursor-pointer rounded-xl ">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" id="yearlyCheck" class="w-5 h-5 text-gray-400 sm:h-9 sm:w-9" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>

                    <div class="flex flex-col items-center mx-5 space-y-1">
                        <h2 class="text-lg font-medium text-gray-700 sm:text-2xl pr-3">Yearly</h2>
                        <div class="px-2 text-xs text-bookmark-purple bg-gray-100 rounded-full sm:px-4 sm:py-1  ">
                            Save 65%
                        </div>
                    </div>
                </div>

                <h2 id="yearlyText" class="text-2xl font-semibold text-gray-500 sm:text-4xl ">$50 <span class="text-base font-medium">/Year</span></h2>
            </div>

            <div class="flex justify-center ">
                <a id="nextButton" href="./checkout?plan=monthly" class="mt-2 md:mt-2">
                <button class="px-28 py-3 tracking-wide text-white capitalize transition-colors font-semibold duration-300 transform bg-bookmark-purple rounded-md hover:bg-purple-highlight">
                    Continue
                </button>
                </a>
            </div>
        </div>
    </div>
</div>

  <div class="flex justify-center mt-3 mb-1">
    <p id="refundPolicy" class="underline cursor-pointer text-sm text-gray-500 ">Refund policy</p>
    
  </div>

  <div class="flex justify-center mb-6">
    <p id="viewFaq" class="underline cursor-pointer text-sm text-gray-500 " aria-clicked="false">View FAQ</p>
  </div>


<!-- features -->
<!-- <div class="bg-white mt-2 lg:hidden">
    <div class="container px-4 md:px-36 lg:px-64  mx-auto md:mb-10">
        <div class="p-8 mt-10 md:pt-7 space-y-6 bg-gray-50  rounded-2xl">
            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg ">Cancel any time</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg">24 hour refund guarantee</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg">Unlimited free trials on any website</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="flex items-center justify-between text-gray-700 ">
                <p class="text-lg">24/7 support</p>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-bookmark-purple sm:h-7 sm:w-7" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
</div> -->

<!-- faq -->
<div id="faq" class="hidden">
<section  class="flex justify-center">
<div class="mx-4 w-full sm:w-8/12 lg:w-8/12 xl:w-1/2 pt-0 sm:pt-4 pb-16 sm:pb-24">
<div id="accordion-collapse" data-accordion="collapse">
  <h2 id="accordion-collapse-heading-1">
    <button type="button" id="accordion-button-1" class="flex justify-between items-center p-5 w-full font-semibold text-left text-gray-900 rounded-t-xl border  border-gray-200  hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-1" aria-expanded="false" aria-controls="accordion-collapse-body-1">
      <span>Are TrialDemon cards real?</span>
      <svg id="1close" style="display: block" data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <svg id="1open" style="display: none" data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>
  <div id="accordion-body-1" class="" style="display: none" aria-labelledby="accordion-collapse-heading-1">
    <div class="p-5 border border-b-1 border-t-0 border-gray-200 ">
      <p class="mb-2 text-gray-500 ">Yes. TrialDemon cards are real Visa debit cards. We programmed them to be super smart so they'll bypass authorization holds, but won't let any charges through when the trial ends.</p>
    </div>
  </div>

  <h2 id="accordion-collapse-heading-2">
    <button type="button" id="accordion-button-2" class="flex justify-between font-semibold items-center p-5 w-full  text-left text-gray-900 border bx-1 border-t-0 border-gray-200  hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
      <span>Are the cards linked to my bank?</span>
      <svg id="2close" style="display: block" data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <svg id="2open" style="display: none" data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>
  <div id="accordion-body-2" class="" style="display: none" aria-labelledby="accordion-collapse-heading-2">
    <div class="p-5 border border-t-0 border-gray-200 ">
      <p class="mb-2 text-gray-500 ">NO! TrialDemon cards are in no way connected to your personal finances. This includes the credit or debit card you use to pay for TrialDemon.</p>
      <br>
      <p class="mb-2 text-gray-500 ">Even if something went wrong, and a charge went though (which is not possible), our company bank account would be charged, not you.</p>
    </div>
  </div>

  <h2 id="accordion-collapse-heading-3">
    <button type="button" id="accordion-button-3" class="flex justify-between items-center font-semibold p-5 w-full  text-left text-gray-900 border border-t-0 border-b-1 border-gray-200  hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
      <span>Is this legal?</span>
      <svg id="3close" style="display: block" data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <svg id="3open" style="display: none" data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>
  <div id="accordion-body-3" class="" style="display: none" aria-labelledby="accordion-collapse-heading-3">
    <div class="p-5 border border-t-0 border-b-1 border-gray-200 ">
      <p class="mb-2 text-gray-500 ">Yes! TrialDemon is perfectly legal.</p>
    </div>
  </div>

  <h2 id="accordion-collapse-heading-4">
    <button type="button" id="accordion-button-4" class="flex justify-between font-semibold items-center p-5 w-full  text-left text-gray-900 border border-b-1 border-t-0 border-gray-200  hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
      <span>Does TrialDemon work on any website?</span>
      <svg id="4close" style="display: block" data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <svg id="4open" style="display: none" data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>
  <div id="accordion-body-4" class="" style="display: none" aria-labelledby="accordion-collapse-heading-3">
    <div class="p-5 border border-t-0 border-gray-200 ">
      <p class="mb-2 text-gray-500 ">TrialDemon works on any website that 1. offers free trials 2. allows virtual cards on their card processing backend.</p>
      <br>
      <p class="mb-2 text-gray-500 ">To put it simply, TrialDemon works on around 90% of websites that offer free trials.</p>
    </div>
  </div>

  <h2 id="accordion-collapse-heading-5">
    <button type="button" id="accordion-button-5" class="flex justify-between font-semibold items-center p-5 w-full  text-left text-gray-900 border border-b-1 border-t-0 border-gray-200  hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
      <span>How is this better than a credit card number generator?</span>
      <svg id="5close" style="display: block" data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <svg id="5open" style="display: none" data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>
  <div id="accordion-body-5" class="" style="display: none" aria-labelledby="accordion-collapse-heading-3">
    <div class="p-5 border border-t-0 border-gray-200 ">
      <p class="mb-2 text-gray-500 ">Credit card number generators don't work for creating free trials, but TrialDemon does. This is because we use real Visa debit cards.</p>
    </div>
  </div>

  <h2 id="accordion-collapse-heading-6">
    <button type="button" id="accordion-button-6" class="flex justify-between font-semibold items-center p-5 w-full rounded-b-xl text-left text-gray-900 border border-b-1 border-t-0 border-gray-200  hover:bg-gray-100" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
      <span>What if a free trial expires, but I want another one on the same site? </span>
      <svg id="6close" style="display: block" data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      <svg id="6open" style="display: none" data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
  </h2>
  <div id="accordion-body-6" class="" style="display: none" aria-labelledby="accordion-collapse-heading-6">
    <div class="p-5 border border-t-0 rounded-b-xl border-gray-200 ">
      <p class="mb-2 text-gray-500 ">Generate a new TrialDemon email and card, then use the refreshed credentials to create a new account.</p>
    </div>
  </div>

</div>
</div>
</section>
</div>



<!-- demo modal -->
<div  id="demoModal" style="display: none" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div id="demoBackground" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-full p-4 text-center sm:p-0">
      <div class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">

        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="text-center pt-2">
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 ">Demo</p>
            <p class="mt-3  leading-6 text-xl text-gray-500 ">Note: This card is no longer active!</p>
          </div> 

          <div class="flex justify-center mx-4 pt-4 md:pt-6">
            <iframe src="https://player.vimeo.com/video/730644172?h=922a6a7e4e" width="640" height="200" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
          </div>
          
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-center">
          <button type="button" id="demoClose" class=" w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-8 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50  sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
        </div>

      </div>
    </div>
  </div>
</div>
</div>

<!-- refund modal -->
<div style="display: none" id="refundModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

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
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Refund Policy</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">If you don't like TrialDemon, you can request a refund within 24 hours after subscribing. You can also cancel your subscription any time in the dashboard</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="button" id="refundClose" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50  sm:mt-0 sm:ml-0 sm:w-auto sm:text-sm">Okay</button>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    const viewFaq = document.getElementById('viewFaq')
    viewFaq.addEventListener('click', function() {
        if(viewFaq.getAttribute("aria-clicked") === "false") {
          document.getElementById('faq').classList.remove('hidden')
          viewFaq.innerHTML ="Hide FAQ"
          viewFaq.setAttribute("aria-clicked", "true")
        } else {
          document.getElementById('faq').classList.add('hidden')
          viewFaq.innerHTML ="View FAQ"
          viewFaq.setAttribute("aria-clicked", "false")
        }
    })

    // refund policy
    const refundPolicy = document.getElementById("refundPolicy");
    const refundModal = document.getElementById("refundModal");
    const refundClose = document.getElementById("refundClose");

    refundPolicy.addEventListener('click', () => {
        refundModal.style.display = "block";
    }
    )
    refundClose.addEventListener('click', () => {
        refundModal.style.display = "none";
    }
    )
    

    const weekly = document.getElementById('weekly')
    const monthly = document.getElementById('monthly')
    const yearly = document.getElementById('yearly')
    const next = document.getElementById('nextButton')
    weekly.addEventListener('click', function() {
        // changing monthly styles
        document.getElementById('monthlyCheck').classList.remove('text-bookmark-purple')
        monthly.classList.remove('border-bookmark-purple')
        document.getElementById('monthlyText').classList.remove('text-newBlue')
        document.getElementById('monthlyCheck').classList.add('text-gray-400')
        document.getElementById('monthlyText').classList.add('text-gray-500')

        // changing weekly styles
        document.getElementById('weeklyCheck').classList.remove('text-gray-400')
        weekly.classList.add('border-bookmark-purple')
        document.getElementById('weeklyText').classList.remove('text-gray-500')
        document.getElementById('weeklyCheck').classList.add('text-bookmark-purple')
        document.getElementById('weeklyText').classList.add('text-newBlue')

        // changing yearly styles
        document.getElementById('yearlyCheck').classList.remove('text-bookmark-purple')
        yearly.classList.remove('border-bookmark-purple')
        document.getElementById('yearlyText').classList.remove('text-newBlue')
        document.getElementById('yearlyCheck').classList.add('text-gray-400')
        document.getElementById('yearlyText').classList.add('text-gray-500')

        next.href = './checkout?plan=weekly'
    })

    monthly.addEventListener('click', function() {
        // changing monthly styles
        document.getElementById('monthlyCheck').classList.remove('text-gray-400')
        monthly.classList.add('border-bookmark-purple')
        document.getElementById('monthlyText').classList.remove('text-gray-500')
        document.getElementById('monthlyCheck').classList.add('text-bookmark-purple')
        document.getElementById('monthlyText').classList.add('text-newBlue')

        // changing weekly styles
        document.getElementById('weeklyCheck').classList.remove('text-bookmark-purple')
        weekly.classList.remove('border-bookmark-purple')
        document.getElementById('weeklyText').classList.remove('text-newBlue')
        document.getElementById('weeklyCheck').classList.add('text-gray-400')
        document.getElementById('weeklyText').classList.add('text-gray-500')

        // changing yearly styles
        document.getElementById('yearlyCheck').classList.remove('text-bookmark-purple')
        yearly.classList.remove('border-bookmark-purple')
        document.getElementById('yearlyText').classList.remove('text-newBlue')
        document.getElementById('yearlyCheck').classList.add('text-gray-400')
        document.getElementById('yearlyText').classList.add('text-gray-500')

        next.href = './checkout?plan=monthly'
    })

    yearly.addEventListener('click', function() {
        // changing monthly styles
        document.getElementById('monthlyCheck').classList.remove('text-bookmark-purple')
        monthly.classList.remove('border-bookmark-purple')
        document.getElementById('monthlyText').classList.remove('text-newBlue')
        document.getElementById('monthlyCheck').classList.add('text-gray-400')
        document.getElementById('monthlyText').classList.add('text-gray-500')

        // changing weekly styles
        document.getElementById('weeklyCheck').classList.remove('text-bookmark-purple')
        weekly.classList.remove('border-bookmark-purple')
        document.getElementById('weeklyText').classList.remove('text-newBlue')
        document.getElementById('weeklyCheck').classList.add('text-gray-400')
        document.getElementById('weeklyText').classList.add('text-gray-500')

        // changing yearly styles
        document.getElementById('yearlyCheck').classList.remove('text-gray-400')
        yearly.classList.add('border-bookmark-purple')
        document.getElementById('yearlyText').classList.remove('text-gray-500')
        document.getElementById('yearlyCheck').classList.add('text-bookmark-purple')
        document.getElementById('yearlyText').classList.add('text-newBlue')

        next.href = './checkout?plan=yearly'
    })




</script>
<script src="./trialdemon/js/pricing.js"></script>
<script src="./trialdemon/js/faq.js"></script>
<script>
  const demoModal = document.getElementById('demoModal')
  const demoBackground = document.getElementById('demoBackground')
  const demoButton = document.getElementById('demoButton')
  const demoClose = document.getElementById("demoClose")

  demoButton.addEventListener('click', function() {
    demoModal.style.display = "block"
  })

  demoClose.addEventListener('click', function() {
    demoModal.style.display = "none"
  })

  demoBackground.addEventListener('click', function() {
    demoModal.style.display = "none"
  })
</script>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="7e6de62a-cb5a-45da-b6e5-0ed31ee5c8bd";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
</body>
</html>