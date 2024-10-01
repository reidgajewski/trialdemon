<?php
  session_start();
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial</title>
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

                <a href="./features?hide=true" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Savings calculator</a>

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

            <a href="./features?hide=true" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Savings Calculator</a>


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

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white ">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue ">
                <header class="mb-4 lg:mb-6 not-format">

                    <h1 class="mb-4 text-4xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-5xl "><span class="text-bookmark-purple">Welcome!</span><br>Here's how to use TrialDemon</h1>
                </header>
                <p class="text-gray-600 mb-14 text-xl tracking-wide">
                    TrialDemon lets you get unlimited free trials on subscription websites through our virtual debit cards and temporary email addresses.
                    The best part is you never have to worry about getting charged since our cards cancel the trials for you.
                </p>

                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">1. The TrialDemon card</h1>
            
                <!-- Card details box -->
                <section id="cardDetails" style="display: block" class="mt-0 md:mt-2">
                    <div class="min-h-full flex font-Roboto justify-left  ">
                        <div class="max-w-md  space-y-2 ">
                        <p class=" text-xs px-44 md:mx-2 text-center text-[#fffcf500]">
                        </p>
                        <div class=" rounded-3xl shadow-lg">
                            <div class="-space-y-px rounded-3xl bg-gradient-to-bl from-blue-700 via-blue-800 to-gray-900 shadow-lg">
                            <div class="flex flex-row   rounded-t-3xl">
                                <div class="pt-7 pb-7">
                                    <img class="mx-auto pl-6 h-11 w-auto" src="./trialdemon/public/imgs/logofinal.png" alt="Workflow">
                                </div>
                            </div>
                            <div >
                                <div id="carddiv" class=" pl-6 pt-7 pb-1 relative w-full text-2xl font-Nunito   text-[#e7e7e7]  sm:text-md ">
                                <p id="cardnum" class="font-Montserrat cursor-pointer tracking-widest">1111-1111-1111-1111</p>
                                </div>
                            </div>
                            <div class="flex -space-x-px rounded-3xl ">
                                <div class=" flex-1">
                                <div id="expdiv" class="pl-6 pt-5 text-md pb-6 relative w-full  rounded-bl-3xl  text-[#e7e7e7]  ">
                                    <p class="cursor-pointer tracking-widest"><span >EXP </span><span id="cardexp" class="font-bold">07/25</span></p>
                                </div>
                                </div>
                                <div class="flex-1 rounded-br-3xl ">
                                <div id="cvcdiv" class=" relative pt-5 pb-6 w-full  rounded-br-3xl   text-[#e7e7e7] ">
                                    <p class="cursor-pointer tracking-widest"><span class="">CVV </span><span id="cardcvc" class="font-bold">665</span></p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>

                <p class="text-gray-700 mb-6 tracking-wide text-lg mt-6">
                    Use the TrialDemon card when a free trial requires a payment method. This card will bypass authorization holds, but won't let any charges through when the trial ends so you don't
                    have to worry about cancelling the trial. Once your done with a card, you can generate a new one.
                </p>

                <!-- contact info box -->
                <section>
                <div id="contactInfo"  class="min-h-full flex items-center font-Roboto justify-left ">
                    <div class="max-w-md w-full space-y-2">

                    <div class="col-span-6  cursor-pointer">

                        <div class="-space-y-px rounded-2xl">
                    

                        <div id="addressbutton" class="rounded-t-2xl">
                            <p class="pl-3 pb-2 pt-3 relative w-full border rounded-t-2xl border-b-1 bg-[#f9f9f9] border-l-2 border-white placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="address">
                                5792 sw 72nd st
                            </p>
                        </div>

                        <div class=" flex -space-x-px">

                            <div id="citybutton" class="bg-[#f9f9f9] flex-1 rounded-bl-2xl">
                            <p class="pl-3 pt-2 pb-3 relative w-full border border-l-2 rounded-bl-2xl border-b-2 bg-[#f9f9f9] border-white placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="city">
                                Miami
                            </p>
                            </div>

                            <div id="statebutton" class=" bg-[#f9f9f9] flex-1">
                            <p class="pl-3 pt-2 pb-3 border relative w-full border-r-1 border-l-1 border-b-2 border-white placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="state">
                                Florida
                            </p>
                            </div>

                            <div id="zipbutton" class="bg-[#f9f9f9] flex-1 rounded-br-2xl">
                            <p class="pl-2.5 pt-2 pb-3 relative w-full border border-r-2 rounded-br-2xl border-b-2 bg-[#f9f9f9] border-white placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" id="zip">
                                33140
                            </p>
                            </div>
                        </div>

                        </div>
                    </div>
                    <p class="text-bookmark-grey text-md pt-2 text-center">
                        <!-- Use as billing info if requested -->
                    </p>
                    </div>
                </div>
                </section>

                <p class="text-gray-700 mb-6 text-lg mt-2 tracking-wide">
                    Make sure to use the billing info you provided at signup if requested by the subscription website.
                </p>

                <h1 class="mb-4 mt-14 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">2. The TrialDemon email</h1>

                <section id="emailBox" >
                    <div   class="min-h-full flex items-center font-Roboto justify-left   ">
                        <div class="max-w-md w-full space-y-2">
                        <div class="col-span-6  cursor-pointer">
                            <div class="relative ">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none ">
                                <svg aria-hidden="true" class="w-5 h-5 text-[#323232] " fill="#323232" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            </div>
                            <p type="text" id="emailInfo" class="bg-[#f9f9f9] border border-white text-gray-900 text-sm rounded-2xl focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-3 ">272829-ffaxnmskdfbiuwsbq-sdasf@trialdemon.com</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>

                <p class="text-gray-700 mb-6 text-lg mt-6 tracking-wide">
                    Use this disposable email address when signing up for a free trial. Once your done with it, you can simply generate a new email.
                </p>

                
                <h1 class="mb-4 mt-14 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">3. Generate new card & email</h1>

                <!-- Action buttons -->
                <div class=" flex items-center justify-left mt-5 px-0 ">
                    <div class="w-full sm:max-w-md  space-y-2">

                        <div>
                        <button id="newcard" style="display: block" class="group relative flex w-full text-left py-3.5 px-4 shadow-sm border text-md md:text-sm font-semibold rounded-xl text-gray-900 bg-[#f9f9f9] ">

                            <div class="">Generate New Card</div>
                            
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <!-- Heroicon name: mini/lock-closed -->
                            <img src="./trialdemon/public//imgs/rightArrow.svg" class="h-8 w-8 sm:h-7 sm:w-7" alt="">
                            </span>
                        </button>
                        </div> 

                        <div>
                        <button id="newemail" style="display: block" class="group relative flex w-full text-left py-3.5 px-4 shadow-sm border  text-md md:text-sm font-semibold rounded-xl text-gray-900 bg-[#f9f9f9] ">

                            <div class="">Generate New Email</div>
                            
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <!-- Heroicon name: mini/lock-closed -->
                            <img src="./trialdemon/public//imgs/rightArrow.svg" class="h-8 w-8 sm:h-7 sm:w-7" alt="">
                            </span>
                        </button>
                        </div> 

                    </div>
                </div>

                <p class="text-gray-700 mb-6 text-lg mt-6 tracking-wide">
                    To sign up for multiple trials on the same website, you can generate new cards & emails. Use the new credentials to sign up for the next trial. You can generate a new card every 48 hours and a new email every 12 hours.
                </p>
            </article>
        </div>
    </main>

    <div id="nextButton" class='fixed bottom-0 w-full' style="display:block">
        <a href="./dashboard">
            <button class='bottom-0 mr-4 my-4 float-right px-7 py-4 md:px-10 md:py-5 bg-bookmark-purple hover:bg-purple-highlight text-white text-md md:text-lg font-bold shadow-2xl tracking-wide rounded-full focus:outline-none'>Got it</button>
        </a>
    </div>

</div>
<script src="./trialdemon/js/pricing.js"></script>
</body>
</html>