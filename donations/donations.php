<!-- link to the SqPaymentForm library -->
    <script type="text/javascript" src="https://js.squareup.com/v2/paymentform">
    </script>

    <!-- link to the local SqPaymentForm initialization -->
    <script type="text/javascript" src="sqpaymentform.js">
    </script>

    <!-- link to the custom styles for SqPaymentForm -->
    <link rel="stylesheet" type="text/css" href="sqpaymentform-basic.css">
	<script>
	 document.addEventListener("DOMContentLoaded", function(event) {
    if (SqPaymentForm.isSupportedBrowser()) {
      paymentForm.build();
      paymentForm.recalculateSize();
    }
  });
	</script>
	<style>
.input_box {
    font-size: 16px;
    font-family: Helvetica Neue;
    padding: 6px;
    color: #373F4A;
    background-color: transparent;
    line-height: 24px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    border: 1px solid #e7eaec;
    border-radius: 4px;
    width: 423px;}
.hedding-text{
    font-size: 48px;
    padding-bottom: 16px;
} 
.success{
    font-size: 16px;
    border: 1px solid #f7f4f4;
    padding: 16px;
    font-weight: bold;
    color: #106905;
    background-color: #d3ecc1;
    border-radius: 5px; 
}
.cord_logo{
    height: 31px;
    width: 244px;
    margin-left: 182px;
    margin-top: 2px;
    margin-bottom: 5px;
}
</style>

<div id="form-container">
  <div id="sq-ccbox">
    <!--
      Be sure to replace the action attribute of the form with the path of
      the Transaction API charge endpoint URL you want to POST the nonce to
      (for example, "/process-card")
    -->
    <form id="nonce-form" novalidate action="payment-process.php" method="post">
        
          <table>
            <tr>
                <td><div class="hedding-text">Donation Form</div></td>
            </tr>  
            <?php if(isset($_GET['success'])){?>  
              <tr>
                <td class="success">Thank You For The Donation</td>
            </tr>
            <?php } ?>
            <tr>
                <td>Name<span style="color:red">*</span></td>
            </tr>
            <tr>        
                <td><input type="text" name="name" class="input_box" required/></td>
            </tr>
            
            <tr>
                <td>Email<span style="color:red">*</span></td>
            </tr>
            <tr>                
                <td><input type="text" name="email" class="input_box" required/></td>
            </tr>
            <tr>
                <td>Address</td>
            </tr>
            <tr>                
                <td><input type="text" name="address" class="input_box" /></td>
            </tr>
            <tr>
                <td>Phone</td>
            </tr>
            <tr>                
                <td><input type="text" name="phone" class="input_box" /></td>
            </tr>
            <tr>
                <td>Amount<span style="color:red">*</span></td>
            </tr>
            <tr>                
                <td><input type="text" id="amount" name="amount" value="10" class="input_box" required></td>
            </tr>
            
        </table>
        
      <fieldset>
        <span class="label"><span style="position: absolute; margin-top: 9px">Card Number</span>
        <span style="color: red;position: absolute; margin-left: 109px;margin-top: 7px;">*</span>
        <img src="Square_CC_logo.png" class="cord_logo"/>
        </span>
        <div id="sq-card-number"></div>

        <div class="third">
          <span class="label">Expiration<span style="color:red">*</span></span>
          <div id="sq-expiration-date"></div>
        </div>

        <div class="third">
          <span class="label">CVV<span style="color:red">*</span></span>
          <div id="sq-cvv"></div>
        </div>

        <div class="third">
          <span class="label">Postal<span style="color:red">*</span></span>
          <div id="sq-postal-code"></div>
        </div>
      </fieldset>

      <button id="sq-creditcard" class="button-credit-card" onclick="requestCardNonce(event)" style="width: 430px;">Pay </button>

      <div id="error"></div>

      <!--
        After a nonce is generated it will be assigned to this hidden input field.
      -->
	  
      <input type="hidden" id="card-nonce" name="nonce">
    </form>
  </div> <!-- end #sq-ccbox -->

</div> <!-- end #form-container -->
