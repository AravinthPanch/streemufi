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
xmlhttp.open("GET", "http://127.0.0.1:1337", true);
xmlhttp.send();
}