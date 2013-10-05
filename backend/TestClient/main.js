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
    console.log(xmlhttp.responseText);
    }
}
xmlhttp.open("POST", "http://127.0.0.1:61555", true);
console.log(JSON.stringify(newUserCreateRequest))
xmlhttp.send(JSON.stringify(newUserCreateRequest));
}

var newUserCreateRequest = {
    name : 'Aravinth',
    contact: '017631173663',
    location  : 'Warschauerstr',
    text : 'Im a Guitarist',
    video : 'youtube.com/aravinth123'
};