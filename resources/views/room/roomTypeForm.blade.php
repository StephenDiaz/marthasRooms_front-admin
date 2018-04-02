<div class="form-group">
    <label for="rmName">Room Name</label>
    <input type="text" class="form-control" name="rmName" id="rmName" placeholder="Room Name" autocomplete="off" autofocus>
</div>

<div class="form-group">
    <label for="location">Location</label>
    <select name = "location" class="form-control" id="location" autocomplete="off">
        <option value ="North Cambridge"> North Cambridge </option>
        <option value ="Montinola"> Montinola </option>
    </select>
</div>

<div class="form-group">
    <label for="pax">Number of Pax</label>
    <input type="number" min="1" value="1" class="form-control" name="pax" id="pax" placeholder="Number of Pax" autocomplete="off" autofocus>
</div>
<div class="form-group">
    <label for="excess">Default Price</label>
    <div class="row">
        <div class="col-md-3">
             <label for="numberOfPerson">Number of Person/s</label>
        </div>
        <div class="col-md-3">
             <label for="amount">Amount</label>
        </div>
         <div class="col-md-3">
             <label for="type">Type</label>
            
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-success add-price">Add price</button>
        </div>
   </div>
   <div id="price">
        <div class="row">
            <div class="col-md-3">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span class="fa fa-users"></span>
                    </div>
                    <input class="input form-control" name="personD[]" type="number">
                </div>
            </div>
            <div class="col-md-3">
               <div class="input-group">
                    <div class="input-group-addon">
                        <span>₱</span>
                    </div>
                     <input class="input form-control" name="priceD[]" type="number">
                 </div>
             </div>
             <div class="col-md-3">
               <div class="input-group">
                    <select name = "type[]" class="form-control" id="type" autocomplete="off">
                        <option value ="website"> Website </option>
                        <option value ="walkIn"> Walk In </option>
                    </select>
                 </div>
             </div>
        </div>
    </div>
</div>
<div class="row">
   
</div>
<div class="form-group">
    <label for="excess">Charges for Excess Person</label>
    <input type="number"  class="form-control" name="excess" id="excess" autocomplete="off" autofocus>
</div>
<div class="form-group">
    Select image to upload:
    <input type="file" name="image" id="image">
</div>



