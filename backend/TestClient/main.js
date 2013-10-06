
function loadItem(){
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.write(xmlhttp.responseText)
        }
    }

    if(window.appConfig.server == 'local'){
        xmlhttp.open("POST", "http://localhost:61555/v1/artist", true);
        xmlhttp.send(JSON.stringify(newUserCreateRequest));
    }else
    {
        xmlhttp.open("POST", "http://api.streemuf.caelum.uberspace.de/", true);
        xmlhttp.send(JSON.stringify(newUserCreateRequest));
    }
}

var newUserCreateRequest = {
    name : 'Aravinth',
    contact: '017631173663',
    location  : 'Warschauerstr',
    text : 'Im a Guitarist',
    video : 'youtube.com/aravinth123'
};