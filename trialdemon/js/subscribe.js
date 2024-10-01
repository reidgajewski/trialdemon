// mobile stuff
const mobileOpen = document.getElementById("mobileOpen");
const mobileClose = document.getElementById("mobileClose");
const mobileMenu = document.getElementById("mobile-menu");
const mobileButton = document.getElementById("mobileButton");

mobileButton.addEventListener('click', () => {
    const status = mobileButton.getAttribute("aria-expanded")
    if(status === "false") {
        mobileOpen.style.display = "none";
        mobileMenu.style.display = "block";
        mobileClose.style.display = "block";
        mobileButton.setAttribute("aria-expanded", "true");
    } else if(status === "true") {
        mobileClose.style.display = "none";
        mobileMenu.style.display = "none";
        mobileOpen.style.display = "block";
        mobileButton.setAttribute("aria-expanded", "false");
    }
  })

// desktop stuff
const desktopClosed = document.getElementById("desktopClosed");
const desktopOpen = document.getElementById("desktopOpen");
const desktopDropdownButton = document.getElementById("desktopDropdownButton");
const desktopDropdown = document.getElementById("desktopDropdown");

desktopDropdownButton.addEventListener('click', () => {
    if(desktopDropdownButton.getAttribute("aria-expanded") === "false") {
        desktopDropdownButton.setAttribute("aria-expanded", "true");
        desktopDropdown.style.display = "block";
        desktopClosed.style.display = "none";
        desktopOpen.style.display = "block";
    } else {
        desktopDropdownButton.setAttribute("aria-expanded", "false");
        desktopDropdown.style.display = "none";
        desktopOpen.style.display = "none";
        desktopClosed.style.display = "block";
    }
})

function displayLoader() {
    const loader = document.getElementById("loadSpinner");
    const lockIcon = document.getElementById("lockIcon");
    loader.style.display = "block";
    lockIcon.style.display = "none";
}

function hideLoader() {
    const loader = document.getElementById("loadSpinner");
    const lockIcon = document.getElementById("lockIcon");
    loader.style.display = "none";
    lockIcon.style.display = "block";
}

const error_div = document.getElementById("error_div");
const error_text = document.getElementById("error_text");


function displayError(arg) {
    error_div.style.visibility = "visible"
    error_text.innerHTML = arg;
}

let stripe = Stripe('pk_live_51KMKykIUyyqkBxkCUljNmLjmfmcsTESS23vU29UQhM9FTRwvgkNVii9jHVkH2S8hQOtp5fpfUySW0wz81OllT1b10051EZrVkN');
let elements = stripe.elements();

let card = elements.create('card', {
    style: {
        base: {
          '::placeholder': {
            color: '#6b7280',
          },
        },
      },
    });
card.mount('#card-element');

let cardElement = document.getElementById('card-element');


const btn = document.querySelector('#btn');
btn.addEventListener('click', async (e) => {
  e.preventDefault();
  const nameInput = document.forms.customerForm.fullName.value
  const formData = new FormData(document.getElementById("customerForm"));

  fetch('https://www.trialdemon.com/api/model.php', {
    method: 'POST',
    body: formData
    })
    .then(displayLoader())
    .then(res => {
    response = res.status
    return res.text()
    })
    .then(data => {
        if(response == 200) {
            const secret = data;
            stripe.confirmCardPayment(data, {
            payment_method: {
                card: card,
                billing_details: {
                name: nameInput,
                },
            }
            }).then(displayLoader())
            .then((result) => {
            if(result.error) {
                hideLoader()
                displayError(result.error.message)
                // in 200 because technically the stripe response is a good response
            } else {
                hideLoader();
                location.href="./cardholder";
            }
            });
        } else {
            // not 200 because it is my response
            displayError(data)
            hideLoader();
        }
    })
  
});

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

