var url = window.location.href;  
url = url.replace("http://", "");           
var urlExplode = url.split("/");  
var serverName = urlExplode[0]+'/'+urlExplode[1];  
  
serverName = 'http://'+serverName;

function toggleRatingForm()
{
	
	var formelement = document.getElementById('ratingform');
	var switchelement = document.getElementById('ratingswitch');
	if (formelement.style.visibility == 'collapse')
	{
		switchelement.style.visibility = 'collapse';
		switchelement.style.height = '0px';
		formelement.style.visibility = 'visible';
		formelement.style.height = '170px';
		alert('abc');
	}
	/* captcha image: replace path to empty captcha (set by default in html) with path to dynamically generated captcha - modify path here */
	document.getElementById('captcha_image').src = serverName+'/public/captcha.php';
	
}