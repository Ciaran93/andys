<div id="" data-section="gift">
    <div class="container">
        <div class="row text-center fh5co-heading row-padded">
            <div class="col-md-8 col-md-offset-2">
                <h2 class="heading">Gift Voucher</h2>
                <p class="sub-heading">Why not buy your loved ones a gift voucher and have it delivered by email or print it.</p>

                <form action="/gift/charge" method="post" id="payment-form">
                    <div class="form col-lg-6 col-md-6">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div id="errors" style="display:none;"></div>

                        <div class="form-group">  
                            <label>Your Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name">
                            
                            <label>Your Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter your email">
                        </div>

                        <div class="form-group">  
                            <label for="recipient_name">Recipents Name</label>
                            <input type="text" name="recipient_name" class="form-control" placeholder="Recipents Name.">
                            
                           
                        </div>
                    </div>

                    <div class="form col-lg-6">
                        <div class="form-row">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                        </div>

                        <div class="form-group">
                        <label for="">Amount</label>
                        <select name="amount" class="form-control" id="amount">
                            <option value="0">Please Select</option>
                            <option value="20">&euro;20</option>
                            <option value="30">&euro;30</option>
                            <option value="40">&euro;40</option>
                            <option value="50">&euro;50</option>
                            <option value="60">&euro;60</option>
                            <option value="70">&euro;70</option>
                            <option value="80">&euro;80</option>
                            <option value="90">&euro;90</option>
                            <option value="100">&euro;100</option>
                            <option value="100">&euro;110</option>
                            <option value="100">&euro;120</option>
                            <option value="100">&euro;130</option>
                            <option value="100">&euro;140</option>
                            <option value="100">&euro;150</option>
                        </select>
                        </div>

                        <button id="submit-button">Submit Payment</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>