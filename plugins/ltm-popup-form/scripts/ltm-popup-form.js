function ltmPopupSubmit(obj, url) 
{
	_e=document.getElementById("ltm-popup-email");
	_n=document.getElementById("ltm-popup-name");
	_m=document.getElementById("ltm-popup-message");
	
	if(_n.value=="")
	{
		alert("Please Enter Your Name.");
		_n.focus();
		return false;    
	}
	else if(_e.value=="")
	{
		alert("Please Enter Your Email.");
		_e.focus();
		return false;    
	}
	else if(_e.value!="" && (_e.value.indexOf("@",0)==-1 || _e.value.indexOf(".",0)==-1))
	{
		alert("Please Enter Valid Email.")
		_e.focus();
		_e.select();
		return false;
	} 

	document.getElementById('ltm-popup-alert-message').innerHTML = "Sending..."; 
	var str = "LTM_Popup_Name=" + encodeURI( document.getElementById("ltm-popup-name").value ) + "&LTM_Popup_Email=" + encodeURI( document.getElementById("ltm-popup-email").value ) + "&LTM_Popup_Captcha=nocaptcha";
	var data = { 'action': 'ltm_send_popup_mail',
                 'LTM_Email_Nonce' : document.getElementById('LTM_Email_Nonce').value,
                 'LTM_Popup_Name' : encodeURI( document.getElementById("ltm-popup-name").value ),
                 'LTM_Popup_Email': encodeURI( document.getElementById("ltm-popup-email").value )
    };
    ltmSendRequest(data);
}

function ltmSendRequest(dataToSend){
    var message = document.getElementById('ltm-popup-alert-message').innerHTML; 
    message = "Sending..."; 
    // This does the ajax request
    jQuery.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: dataToSend,
        success: function (data) {
            document.getElementById('ltm-popup-alert-message').innerHTML = data;
            document.getElementById("ltm-popup-email").value = "";
			document.getElementById("ltm-popup-name").value = "";
        },
        error: function (errorThrown) {
            document.getElementById('ltm-popup-alert-message').innerHTML = errorThrown;
        }
    });
}