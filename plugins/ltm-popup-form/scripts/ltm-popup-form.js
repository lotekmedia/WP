var http_req = false;
function ltmPopupPostRequest(url, parameters) 
{
  http_req = false;
  if (window.XMLHttpRequest) 
  {
	 http_req = new XMLHttpRequest();
	 if (http_req.overrideMimeType) 
	 {
		http_req.overrideMimeType('text/html');
	 }
  } 
  else if (window.ActiveXObject) 
  {
	 try 
	 {
		http_req = new ActiveXObject("Msxml2.XMLHTTP");
	 } 
	 catch (e) 
	 {
		try 
		{
		   http_req = new ActiveXObject("Microsoft.XMLHTTP");
		} 
		catch (e) {}
	 }
  }
  if (!http_req) 
  {
	 alert('Cannot create XMLHTTP instance');
	 return false;
  }
  http_req.onreadystatechange = ltmPopupContents;
  http_req.open('POST', url, true);
  http_req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http_req.send(parameters);
}

function ltmPopupContents() 
{
  if (http_req.readyState == 4) 
  {
	 if (http_req.status == 200) 
	 {
		if(http_req.responseText == "Invalid security code.")
		{
			alert(http_req.responseText);
			result = http_req.responseText;
			document.getElementById('ltm-popup-alert-message').innerHTML = result;
		}
		else
		{
			result = http_req.responseText;
			document.getElementById('ltm-popup-alert-message').innerHTML = result;   
			document.getElementById("ltm-popup-email").value = "";
			document.getElementById("ltm-popup-name").value = "";
		}
	 } 
	 else 
	 {
		alert('There was a problem with the request.');
	 }
  }
}

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
    ltmPopupPostRequest(url, str);
}
