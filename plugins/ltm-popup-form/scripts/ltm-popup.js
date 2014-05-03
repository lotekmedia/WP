function ltmPopupOpenForm(ltmPopupBoxContainerId,ltmPopupBoxContainerBodyId,ltmPopupBoxContainerFooterId)
{
    var bgdiv = document.getElementById(ltmPopupBoxContainerFooterId);
    bgdiv.style.display="block";

    var formdiv = document.getElementById(ltmPopupBoxContainerId);
    formdiv.style.display="block";

    formdiv.style.top = '130px';
    formdiv.style.right = '20px';
    formdiv.style.position = 'fixed';

    var containerdiv = document.getElementById(ltmPopupBoxContainerBodyId);
    if(containerdiv && containerdiv.SavedInnerHTML)
    {
        containerdiv.innerHTML = containerdiv.SavedInnerHTML;
    }
    jQuery(containerdiv).find('input[type="text"]')[0].focus();
}

function ltmPopupHideForm(ltmPopupBoxContainerId,ltmPopupBoxContainerFooterId)
{
	document.getElementById('ltm-popup-alert-message').innerHTML = ""; 

    var formdiv = document.getElementById(ltmPopupBoxContainerId);
    formdiv.style.display="none";

    var bgdiv = document.getElementById(ltmPopupBoxContainerFooterId);
    bgdiv.style.display="none";
}
