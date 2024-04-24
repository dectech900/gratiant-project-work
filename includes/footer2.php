
<footer>
        <br/>
                <br/>
        <a href="#" class="footer-title">
            Back to top
        </a>
        <div class="footer-items">
            <ul>
                <h3>Get to Know Us</h3>
                <li><a href="../About-page/about.php">About us</a></li>
            </ul>
            <br>
            <br>
            <br>
            <ul>
                <h3>Make Money with Us</h3>
                <li><a href="../Sell-page/sell.php">Sell
                        on SECURE.BuynSell</a></li>
                <li><a
                        href="../others/protect-brand.php">Protect
                        and Build Your Brand</a></li>
                <!-- <li><a href="">Advertise
                        Your Products</a></li> -->
                <li><a
                        href="../others/recieve-payment.php">Recieve
                        payment for your items with our escrow service </a></li>
            </ul>
            <ul>
                <h3>Let Us Help You</h3>
                <li><a href="../others/account.php">Your
                        Account</a></li>
                <li><a href="../others/return-centre.php">Return
                        Centre</a></li>
                <li><a
                        href="../others/purchase-protection.php">100%
                        Purchase Protection</a></li>
                <li><a href="../Contact-page/Contact.php">Contact Us</a></li>
            </ul>
        </div>

    </footer>
          <script src="https://js.paystack.co/v1/inline.js"></script> 
      <script>

const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

const uid= document.getElementById("uid").value;
const amount= document.getElementById("amount").value;
//   console.log("total", amount);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_fb0aa1be52b235fd20a555b0555970bc9155aa93', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    currency: "GHS" ,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
//       window.location.href = "../Cart-page/cart.php?purchase";
      window.location.href = `../includes/action.php?checkout&uid=${uid}&total=${amount}`;
//       alert(message);
    }
//     name: document.getElementById("first-name").value, // Pass the name parameter here
// //     id: document.getElementById("first-name").value
  });

  handler.openIframe();
}

      </script>
    <script src="../script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>