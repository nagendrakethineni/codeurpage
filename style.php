<style>
  .body {
     font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  }
	#scrolltotop{
	position: fixed;
	bottom: 10px;
    right: 30px;
	color: #eabd0f;
	display: none;
}
#scrolltotop:hover{
	color: black;
	transition: 2s;
	-webkit-transition:2s;	
}
.bgimg{
	background-image: url('/images/room.jpg');
	background-size:cover;
	width:100%;
    background-position: top right;
    animation: bgmove 5s infinite;
}
@keyframes bgmove {
  70% {background-position: center;}
}

.navbar {
background-color: transparent;
position: top;
}

.navbar-dark{
background-color: transparent;
}
.navbar-toggle {
    position: relative;
    float: right;
    padding: 9px 10px;
    margin-right: 15px;
    margin-top: 8px;
    margin-bottom: 8px;
    background-color: transparent;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    border-color: #212529;
}
.navbar-default .navbar-toggle .icon-bar {
    background-color: black;
}
.navbar-toggle .icon-bar {
    display: block;
    width: 22px;
    height: 2px;
    border-radius: 3px;
    border-color: white;
    padding:2px;
}
.dropdown-menu{
    background-color: #fff0;
	border: 1px solid rgba(0, 0, 0, 0.35);
}
.dropdown-item{
	color: #007bff;
}

.card:hover {
-webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
-moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
}
#hm{
margin-left:0%;
margin-top: -2%; 
position:absolute;
width:40%;
}
#banner{
background-color: #ffc1079c;
margin-top:0%;
}


</style>
