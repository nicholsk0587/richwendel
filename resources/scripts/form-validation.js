$(function(){

//Note: Required fields are designated by adding class="required" to the input, except in special circumstances.
    
    //CONTACT 
    $("#contact").validate({
        errorElement: "p",
        rules: {
			from: {required: "#phone:blank", email: true},
			phone: {required: "#from:blank", phoneUS: true}
		},
		messages: {
			name: {required: "Please enter your name."},
			from: {required: "Please enter your email address.", email: "Please enter a valid email address."},
			phone: {required: "Please enter your phone number."},
			subject: {required: "Please select a subject."},
			message: {required: "Please enter a message."}
		}
    });


});