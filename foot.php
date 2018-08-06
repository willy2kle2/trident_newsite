
    
    <script type="text/javascript" data-cfasync="false">(function ()
	{ var done = false;var script = document.createElement("script")
	;script.async = true;script.type = "text/javascript";
	script.src = "https://app.purechat.com/VisitorWidget/WidgetScript";
	document.getElementsByTagName("HEAD").item(0).appendChild(script);
	script.onreadystatechange = script.onload = function (e) 
	{if (!done && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {var w = new PCWidget({ c: "bb9977a1-72bf-4e1e-adb8-f315f2bc8831", f: true });done = true;}};})();</script>
<!-- jQuery library -->


<!-- optional touchswipe file to enable swipping to navigate slideshow -->
<script language ="JavaScript"> function goToURL() { window.location = "http://www.tridentelect.com/trainingcourses.html"; } 

function newWindow1(){
window.open("kitTopics/generalenquiry.html");}
function newWindow2(){
window.open("https://www.youtube.com/embed/qrejiFfoWiY","","height=420, width=315");}

</script>

<!-- Initialize Bootstrap functionality -->
<script>
 var youtube = document.querySelectorAll( ".youtube" );
    
    for (var i = 0; i < youtube.length; i++) {
        
        var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
        
        var image = new Image();
                image.src = source;
                image.addEventListener( "load", function() {
                    youtube[ i ].appendChild( image );
                }( i ) );
        
                youtube[i].addEventListener( "click", function() {

                    var iframe = document.createElement( "iframe" );

                            iframe.setAttribute( "frameborder", "0" );
                            iframe.setAttribute( "allowfullscreen", "" );
                            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

                            this.innerHTML = "";
                            this.appendChild( iframe );
                } );    
    };




</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32767501-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> 