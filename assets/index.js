

typing_disabled = function(input)
{
	input.bind("copy paste cut keydown", function(e) {
		e.preventDefault();
	});	
}

span_msg = function(resp)
{
	$.each(resp, function(i, item)
	{
		$(`span[id="${i}_msg"]`).attr({
			"class": "text-danger fw-medium animate__animated animate__fadeInUp fs-smaller"
		}).html(item);

		$(`span[id="${i}_msg"]`).find("p").addClass("fs-smaller mb-0");
	});		
}

transition_input = function(input)
{
	input.on("keyup", function() 
	{
		const name = $(this).attr("name");
	    if ( $(this).val().length != 0 ) 
	    {
	    	$(`span[id='${name}_msg']`).hide();
	    }
	    else
	    {
	    	$(`span[id='${name}_msg']`).show();
	    }
	})
} 

transition_dropdown = function(dropdown)
{
	const name = dropdown.attr("name");
	dropdown.on("change", function() 
	{
		if( dropdown.has("option").val() != "" ) 
		{
			$(`span[id='${name}_msg']`).hide();
	    }
	    else
	    {
	    	$(`span[id='${name}_msg']`).show();
	    }
	});
} 

transition_selectize = function(dropdown)
{
	const name = dropdown.attr("id");

	return dropdown.selectize({
		plugins: ["clear_button"],
        onChange: function(value) {
            if( value != "" ) 
            {
                $(`span[id='${name}_msg']`).hide();
            }
            else
            {
                $(`span[id='${name}_msg']`).show();
            }
        }
    });
}