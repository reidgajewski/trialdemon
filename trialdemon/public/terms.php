<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TrialDemon terms</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./trialdemon/public/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./trialdemon/public/imgs/logofinal.png">


</head>
<body class=" ">

<!-- Nav -->
<nav class="bg-white px-2 sm:px-4 py-2.5 sm:py-0.5 sticky inset-x-0 top-0 z-20 shadow ">
  <div class=" flex flex-wrap items-center justify-between mx-2 md:mx-4   md:relative md:flex md:items-center md:justify-between">
  <a href="./index" class="flex items-center">
      <img src="./trialdemon/public/imgs/logofinal.png" class="h-8 w-8 mr-3" alt="TrialDemon Logo" />
      <span class="self-center text-xl font-semibold whitespace-nowrap text-gray-900">TrialDemon</span>
  </a>
  <div class="flex md:order-2">
      <?php
        if(isset($_SESSION["email"])) {
      ?>
      <a href="./dashboard">
      <button type="button" class=" text-white bg-[#0f172a] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</button>
      </a>
      <?php
        } else {
      ?>
      <a href="./signup">
      <button type="button" class=" text-white bg-[#0f172a] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
      </a>
      <?php
        }
      ?>      
      <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 " aria-controls="navbar-cta" aria-expanded="false">
            <svg id="mobile-open" style="display: block" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

            <svg id="mobile-close" style="display: none" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
    </button>
  </div>
  <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-cta">
    <ul class="hidden md:flex flex-col p-4 mt-4 border tracking-wider  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0  ">
      <?php
        if(isset($_SESSION["email"])) {
      ?>
      <li>
        <a href="./index" class="block py-2 pl-3 pr-4  text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Home</a>
      </li>
      <li>
        <a href="./blog" class="block py-2 pl-3 pr-4  text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Blog</a>
      </li>
      <li>
        <a href="./account" class="block py-2 pl-3 pr-4 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Account</a>
      </li>
      <li>
        <a href="./logout" class="block py-2 pl-3 pr-4 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Logout</a>
      </li>

      <?php
        } else {
      ?>

      <li>
        <a href="./index" class="block py-2 pl-3 pr-4  text-gray-900 rounded-lg border border-transparent px-2 transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Home</a>
      </li>
      <li>
        <a href="./blog" class="block py-2 pl-3 pr-4  text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Blog</a>
      </li>
      <li>
        <a href="./index#faq" class="block py-2 pl-3 pr-4 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">FAQ</a>
      </li>
      <li>
        <a href="./login" class="block py-2 pl-3 pr-4 text-gray-900 rounded-lg border border-transparent px-2   transition-all duration-200 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-1 focus:ring-gray-300  ">Sign in</a>
      </li>

      <?php
        }
      ?>

    </ul>

    <!-- mobile menu -->
    <div style="display: none" class=" md:hidden " id="mobile-menu">
      <?php
        if(isset($_SESSION["email"])) {
      ?>
      <!-- logged in -->
      <div class="space-y-1  pt-2 pb-3 ">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./index" class=" text-gray-900 block px-3 py-2 text-base font-medium mt-2" aria-current="page">Home</a>

        <a href="./list" class="text-gray-900 block px-3 py-2  text-base font-medium">Free Trial List</a>

        <a href="./features?hide=true" class="text-gray-900  block px-3 py-2 text-base font-medium">Savings Calculator</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0">
          <a href="./account" class="text-gray-900 block px-3 py-2  text-base font-medium">Account</a>

          <a href="./logout" class="text-gray-900 block px-3 py-2  text-base font-medium">Logout</a>
        </div>
      </div>

      <?php
        } else {
      ?>

      <!-- not logged in -->
      <div class="space-y-1  pt-2 pb-3 ">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="./index" class="text-gray-900 block px-3 py-2  text-base font-medium mt-2" aria-current="page">Home</a>

        <a href="./blog" class="text-gray-900 block px-3 py-2  text-base font-medium">Blog</a>

        <a href="./index#faq" class="text-gray-900 block px-3 py-2  text-base font-medium">FAQ</a>


      </div>
      <div class="border-t border-gray-700 pt-2 pb-3">
        <div class="flex items-center px-5">
     
        </div>
        <div class=" space-y-0">
          <a href="./login" class="text-gray-900 block px-3 py-2  text-base font-medium">Sign in</a>
        </div>
      </div>

      <?php
        }
      ?>

    </div>

  </div>
  </div>
</nav>

<div>
  <h2 class="text-2xl font-bold text-gray-900 mt-7 mb-6 text-center">Terms</h2>
</div>

<div class="mx-4 md:mx-10 mb-8">
  <p>These General Terms of Service (“General Terms”) are a legal agreement between you (“you,” “your”) and Demon Technologies, LLC. (DBA TrialDemon.com) (“TrialDemon” “we,” “our” or “us”) and govern your use of TrialDemon services, including mobile applications, websites, software, hardware, and other products and services (collectively, the “Services”). If you are using the Services on behalf of a business, that business accepts these terms. By using any of the Services you agree to these General Terms and any policies referenced within (“Policies”), including terms that limit our liability (see Limitations of Liability and Damages) and require individual arbitration for any potential legal dispute (see Binding Individual Arbitration).</p>
  <br>
  <p>You also agree to any additional terms specific to Services you use (“Additional Terms”), such as those listed below, which become part of your agreement with us.</p>
  <br>
  <p>Payment Terms: These terms apply to all payments made through the Services.</p>
  <br>
  <p>Privacy Policy<br>You agree to TrialDemon’s Privacy Policy, which explains how we collect, use and protect the personal information you provide to us.</p>
  <br>
  <p>Account Registration<br>You must open an account with us (a “TrialDemon Account”) to use the Services. During registration we will ask you for information, including your name and other personal information. This information will be collected and used in accordance with our Privacy Policy. You must provide accurate and complete information in response to our questions, and keep that information current. You are fully responsible for all activity that occurs under your TrialDemon Account, including for any actions taken by persons to whom you have granted access to the TrialDemon Account. We reserve the right to suspend or terminate the TrialDemon Account of any user who provides inaccurate or incomplete information, or who fails to comply with account registration requirements.</p>
  <br>
  <p>Revisions, Disclosures and Notices<br>We may amend the General Terms, any Additional Terms, or our Policies, at any time with notice that we deem to be reasonable in the circumstances, by posting the revised version on our website or communicating it to you through the Services (each a “Revised Version”). The Revised Version will be effective as of the time it is posted, but will not apply retroactively. Your continued use of the Services after the posting of a Revised Version constitutes your acceptance of such Revised Version. Any Dispute that arose before the changes will be governed by the General Terms, Additional Terms or Policies in place when the Dispute arose.</p>
  <br>
  <p>You agree to TrialDemon’s E-Sign Consent.<br>We may provide disclosures and notices required by law and other information about your TrialDemon Account to you electronically, by posting it on our website, pushing notifications through the Services, or by emailing it to the email address listed in your TrialDemon Account. Electronic disclosures and notices have the same meaning and effect as if we had provided you with paper copies. Such disclosures and notices are considered received by you within twenty-four (24) hours of the time posted to our website, or within twenty-four (24) hours of the time emailed to you unless we receive notice that the email was not delivered. If you wish to withdraw your consent to receiving electronic communications, contact TrialDemon Support. If we are not able to support your request, you may need to terminate your TrialDemon Account.</p>
  <br>
  <p>Restrictions<br>You may not, nor may you permit any third party, directly or indirectly, to: export the Services, which may be subject to export restrictions imposed by US law, including US Export Administration Regulations (15 C.F.R. Chapter VII); access or monitor any material or information on any TrialDemon system using any manual process or robot, spider, scraper, or other automated means; except to the extent that any restriction is expressly prohibited by law, violate the restrictions in any robot exclusion headers on any Service, work around, bypass, or circumvent any of the technical limitations of the Services, use any tool to enable features or functionalities that are otherwise disabled in the Services, or decompile, disassemble or otherwise reverse engineer the Services; perform or attempt to perform any actions that would interfere with the proper working of the Services, prevent access to or use of the Services by our other customers, or impose an unreasonable or disproportionately large load on our infrastructure; copy, reproduce, alter, modify, create derivative works, publicly display, republish, upload, post, transmit, resell or distribute in any way material, information or Services from TrialDemon; use and benefit from the Services via a rental, lease, timesharing, service bureau or other arrangement; use the Service in conjunction with automated purchasing software programs; use the Service to exploit new user, referral programs, promotions offered by other merchants, or otherwise use the Service to violate the terms and conditions of a merchant; transfer any rights granted to you under these General Terms; use the Services in a way that distracts or prevents you from obeying traffic or safety laws; use the Services for any illegal activity or goods or in any way that exposes you, other TrialDemon users, our partners, or TrialDemon to harm; or otherwise use the Services except as expressly allowed under these General Terms and applicable Additional Terms.</p>
  <br>
  <p>Compatible Devices and Third Party Carriers<br>We do not warrant that the Services will be compatible with the device or carrier. Your use of the Services may be subject to the terms of your agreements with your device manufacturer or your carrier. You may not use a modified device to use the Services if the modification is contrary to the manufacturer’s software or hardware guidelines, including disabling hardware or software controls.</p>
  <br>
  <p>Security<br>
  We have implemented technical and organizational measures designed to secure your personal information from accidental loss and from unauthorized access, use, alteration, or disclosure. However, we cannot guarantee that unauthorized third parties will never be able to defeat those measures or use your personal information for improper purposes. You provide your personal information at your own risk.
  You are responsible for safeguarding your password and for restricting access to the Services from your compatible devices. You will immediately notify us of any unauthorized use of your password or TrialDemon Account or any other breach of security. Notwithstanding Sections Disputes and Binding Individual Arbitration, in the event of any dispute between two or more parties as to account ownership, we will be the sole arbiter of such dispute in our sole discretion. Our decision (which may include termination or suspension of any TrialDemon Account subject to dispute) will be final and binding on all parties.</p>
  <br>
  <p>Communications<br>
  You consent to accept and receive communications from us in electronic form, including e-mail, text messages, calls, and push notifications to the mobile phone number you provide to us. These communications may be generated by automatic telephone dialing systems which will deliver prerecorded messages, including for the purposes of secondary authentication, receipts, reminders and other notifications. You agree that all communications provided to you by TrialDemon electronically satisfy any legal requirement that communication would satisfy if it were in writing. Standard message and data rates applied by your cell phone carrier may apply to the text messages we send you. You may opt-out of receiving communications by following the unsubscribe options we provide to you. You may also opt-out of text messages from TrialDemon at any time by texting STOP in response. You acknowledge that opting out of receiving communications may impact your use of the Services.
  </p>
  <br>
  <p>Paid Services<br>
  TrialDemon may offer Services to be paid for on a recurring basis (“Subscription Services”) or on an as-used basis (“A La Carte Services” and, together with the Subscription Services, “Paid Services”). TrialDemon has the right to change, delete, discontinue or impose conditions on Paid Services or any feature or aspect of a Paid Service. Subscription Services may subject you to recurring fees and/or terms. By signing up for a Subscription Service, including after any free trial period, you agree to pay us the subscription fee and any applicable taxes as set forth in your TrialDemon Account settings or as otherwise agreed in writing (“Subscription Fee”). If you sign up for Subscription Services for a period (“Initial Period”), then the terms will be automatically renewed for additional periods of the same duration as the Initial Period at our then-current fee for such Subscription Services. In order to avoid automatic renewal you must cancel your Subscription Services at least thirty (30) days prior to the automatic renewal date.

  A La Carte Services may subject you to fees charged per usage and/or terms. By using an A La Carte Service, you agree to pay the fees and any taxes incurred at the time of usage (“A La Carte Fees” and, together with Subscription Fees, the “Paid Service Fees”).

  Paid Service Fees may be paid by debit card, credit card, or deducted from your linked bank account. If you link a debit or credit card to your account, you authorize us to collect Paid Service Fees by debit from your linked debit card or charge to your linked credit card. Regardless of payment device, we reserve the right to collect Paid Service Fees by deduction from your linked bank account.

  Unless otherwise provided in a Subscription Service’s terms, Subscription Fees will be charged on the 1st of every month until canceled. You may cancel a Subscription Service at any time from your TrialDemon Account settings. If you cancel a Subscription Service, you will continue to have access to that Subscription Service through the end of your then current billing period, but you will not be entitled to a refund or credit for any Subscription Fee already due or paid. We reserve the right to change our Subscription Fee upon thirty (30) days’ advance notice. Your continued use of Subscription Services after notice of a change to our Subscription Fee will constitute your agreement to such changes.
  </p>
  <br>
  <p>Termination<br>
  We may terminate these General Terms or any Additional Terms, or suspend or terminate your TrialDemon Account or your access to any Service, at any time for any reason. You may also terminate the General Terms and Additional Terms applicable to your TrialDemon Account by deactivating your TrialDemon Account by contacting us at hello@TrialDemon.com
  </p>
  <br>
  <p>Your License<br>
  We grant you a limited, non-exclusive, revocable, non-transferable, non-sublicensable license to use the software that is part of the Services, as authorized in these General Terms. We may make software updates to the Services available to you, which you must install to continue using the Services. Any such software updates may be subject to additional terms made known to you at that time.
  </p>
  <br>
  <p>Ownership<br>
  We reserve all rights not expressly granted to you in these General Terms. We own all rights, title, interest, copyright and other worldwide Intellectual Property Rights (as defined below) in the Services and all copies of the Services. These General Terms do not grant you any rights to our trademarks or service marks.
  </p>
  <br>
  <p>Indemnity<br>
  You will indemnify, defend, and hold us and our partners (and our respective employees, directors, agents, affiliates and representatives) harmless from and against any and all claims, costs, losses, damages, judgments, tax assessments, penalties, interest, and expenses (including without limitation reasonable attorneys’ fees) arising out of any claim, action, audit, investigation, inquiry, or other proceeding instituted by a person or entity that arises out of or relates to: (a) any actual or alleged breach of your representations, warranties, or obligations set forth in these General Terms or any Additional Terms; (b) your wrongful or improper use of the Services; (c) your violation of any third-party right, including without limitation any right of privacy, publicity rights or Intellectual Property Rights; (d) your violation of any law, rule or regulation of the United States or any other country; and (e) any other party’s access and/or use of the Services with your unique name, password or other appropriate security code.
  </p>
  <br>
  <p>Representations and Warranties<br>
  You represent and warrant to us that: (a) you are at least eighteen (18) years of age; (b) you are eligible to register and use the Services and have the right, power, and ability to enter into and perform under these General Terms; (c) any information you provide in connection with the Services, accurately and truthfully represents your identity; (d) you and all transactions initiated by you will comply with all federal, state, and local laws, rules, and regulations applicable to you; (e) you will not use the Services, directly or indirectly, for any fraudulent undertaking or in any manner so as to interfere with the operation of the Services; and (f) your use of the Services will be in compliance with these General Terms and applicable Additional Terms.
  </p>
  <br>
  <p>No Warranties<br>
  THE USE OF “TrialDemon” IN THIS SECTIONS AND Limitations of Liability and Damages MEANS TrialDemon, ITS PROCESSORS, ITS SUPPLIERS, AND ITS LICENSORS (AND THEIR RESPECTIVE SUBSIDIARIES, AFFILIATES, AGENTS, DIRECTORS, AND EMPLOYEES).

  THE SERVICES ARE PROVIDED “AS IS” WITHOUT REPRESENTATION OR WARRANTY, WHETHER IT IS EXPRESS, IMPLIED, OR STATUTORY. WITHOUT LIMITING THE FOREGOING, TrialDemon SPECIFICALLY DISCLAIMS ANY IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.

  TrialDemon DOES NOT WARRANT OR GUARANTEE THAT THE SERVICES ARE ACCURATE, RELIABLE OR CORRECT; THAT THE SERVICES WILL MEET YOUR REQUIREMENTS; THAT THE SERVICES WILL BE AVAILABLE AT ANY PARTICULAR TIME OR LOCATION, UNINTERRUPTED, ERROR-FREE, WITHOUT DEFECT OR SECURE; THAT ANY DEFECTS OR ERRORS WILL BE CORRECTED; OR THAT THE SERVICES ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.

  TrialDemon does not warrant, endorse, guarantee, or assume responsibility for any product or services advertised or offered by a third party. TrialDemon does not have control of, or liability for, goods or services that are paid for using the Services.
  </p>
  <br>
  <p>Force Majeure<br>
  TrialDemon shall not be liable for any delay or failure to perform resulting from causes outside its reasonable control, including but not limited to, acts of God, war, terrorism, riots, embargos, acts of civil or military authorities, fire, floods, accidents, strikes or shortages of transportation facilities, fuel, energy, labor or materials.
  </p>


</div>






<script src="./trialdemon/js/mobile.js"></script>
</body>
</html>