$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count

    // Add additional recipient functionality
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"><div class="col-10 mb-1"><input type="email" name="recipient[]" class="form-control" value="" placeholder="Enter recipient email" required></div><div class="col-2 mb-1"><a href="#" class="remove_field btn btn-sm btn-danger">Remove</a></div></div>'); //add input box
        }
    });
    
    // Remove addtional recipient field functionality
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent('div.row').remove(); x--;
    })
});