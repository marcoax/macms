var ContactForm = function () {

    return {
        
        //Contact Form
        initContactForm: function () {
	        // Validation
	        $("#modulo").validate({
	            // Rules for form validation
	            rules:
	            {
	            	richieste_Firstname:
	                {
	                    required: true
	                },
	                richieste_Email:
	                {
	                    required: true,
	                    email: true
	                },
	                richieste_Note:
	                {
	                    required: true,
	                    minlength: 10
	                },
	                privacy:
	                {
	                    required: true
	                  
	                },
	               
	            },
	                                
	            // Messages for form validation
	            messages:
	            {
	            	richieste_Firstname:
	                {
	                    required: 'Inserire nome e cognome',
	                },
	                richieste_Email:
	                {
	                    required: 'Email non valido',
	                    email: 'Email non valido'
	                },
	                richieste_Note:
	                {
	                    required: 'Inserisci il tuo messaggio',
	                    minlength: 'Prego inserire almeno 10 caratteri'
	                },
	                privacy:
	                {
	                    required: 'Prego fornire il  consenso al trattamento dei  dati'
	                  
	                },
	            },
	                                
	            // Ajax form submition                  
	            submitHandler: function(form)
	            {
	                 
	            	
	            	$(form).ajaxSubmit(
	                {
	                    beforeSend: function()
	                    {
	                        $('#modulo button[type="submit"]').attr('disabled', true);
	                        
	                        
	                    },
	                    success: function()
	                    {
	                    	
	                    	$("#modulo").addClass('submited');
	                    }
	                });
	            },
	            
	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }

    };
    
}();