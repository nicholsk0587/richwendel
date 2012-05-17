<section>
    <h1>Contact Us</h1>
    <p>Please fill out the following fields.</p>
        <?php echo validation_errors(); ?>
        <?php echo $this->session->flashdata('message');?>
        <?php $attributes = array('id' => 'contact','class' => 'full-page');?>
        
        <?php echo form_open('/contact_us/',$attributes);?>

            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="" class="required"/>
            </div>
            <div>
                <label for="from">Email Address</label>
                <input type="text" id="from" name="from" value="" class="required"/>
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="" class="required"/>
            </div>
            <div>
                <label for="subject">Subject</label>
                <select name="subject" class="required"/>
                    <option value="">Select Subject</option>
                    <option value="Test Subject 1">Test Subject 1</option>
                    <option value="Test Subject 2">Test Subject 2</option>
                </select>
            </div>
            <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="10" class="required"></textarea>
            </div>
            <div>
				<label for="captcha">Captcha</label>
				<?php echo $cap['image'];?>
            </div>
            <div>
				<label for="captcha">Copy the above word</label>
                  <?php echo '<input type="text" name="captcha" value="" />';?>
            </div>
            <div class="send">
                <input name="submit" class="jq-ui" type="submit" value="Send Message" />
            </div>
        </form>
    <p class="disclaimer">Information presented on this website is a service for our clients and other visitors.  We welcome your inquiries, but please understand that the use of this site or form for any communication does not establish an attorney-client relationship.  Time-sensitive information should not be sent through this form, and confidential information should not be provided until a formal relationship is established.</p>
</section>