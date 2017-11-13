jQuery(document).ready(function(){
    	  jQuery('#cctoggle').on('click',function(){
    	  	if(document.getElementById('cchide-popup').checked){
    	  		CookieControl.setCookie('civicShowCookieIcon', 'no');$('#ccc-icon').hide()
    	  	}
    		 if(jQuery(this).attr('class') == 'cctoggle-on'){
    			 jQuery.ajax({
                     url: 'index.php',
                     type: "POST",
                     data: {
                             eID: 'cookieDelete',
                             action: 'main',                            
                             parameters: ({
                                 'in':2
                         })
                     },
                     success: function(data) {
                        if(data == 2){ /*condition added on 02-05-2016*/
                     	/*CookieControl.reset();*/                       
                        if(CookieControl.options.consentModel == "implicit"){
                            res=CookieControl.reset_custom(); 
                            if(res)
                            {    
                                CookieControl.setCookie(CookieControl.options.cookieName, "no");                                                     
                                setTimeout(function(){location.reload(true)}, 2000);
                                
                           }
                        }
                        else
                        {
                           CookieControl.reset(); 
                           setTimeout(function(){location.reload(true)}, 2000);
                        }                       
                     	
                        }
                     }
             });
    			
    		 }else{ 
    			 jQuery.ajax({
                     url: 'index.php',
                     type: "POST",
                     data: {
                             eID: 'cookieDelete',
                             action: 'main',                              
                             parameters: ({
                                     'in': 1
                             })
                     },
                     success: function(data) {
                        if(data == 1){ /* //Condition and reload added on 02-05-2016*/
                            //setTimeout(function(){window.location.reload()}, 800);
                            setTimeout(function(){location.reload()}.bind(this), 2000);
 						//alert(data);
                        }
                     }
             });
    		 }
    		 return false;
    	  });
    	 jQuery('#cookie_enable').bind('click',function(){
    		  CookieControl.setCookie('civicShowCookieIcon', 'yes');
    		  $('#cccwr').show();
        	  $('#ccc-icon').show();
    	  });
    	  
    	  setTimeout(function(){
    		  $('#cccwr').hide()
        	  $('#ccc-icon').hide()
          },300000) ;
});
