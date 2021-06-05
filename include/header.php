<style>
    @keyframes animationtest {
    0%{
        opacity: 0;
        transform: translate(0, -100px);
    }

    80%{
        transform: translate(0, -20px);
    }

    100%{
        opacity: 1;
        transform: translate(0,0);
    }
}
@keyframes example {
    0%   {background-color:#000;}
  25%  {background-color:#333;}
  50%  {background-color:#666;}
  100% {background-color:#999;}
}
.heading-primary_main{
	display:block;
	font-size:20px;
	font-weight:400;
	letter-spacing:10px;
	text-transform:uppercase;
	margin-bottom:60px;
	animation-name:animationtest;
	animation-duration:2s;
}
.header {
  	padding: 15px;
  	background: white;
  	text-align: center;
    position: relative;
  
}
</style>
<div class="header">
        <img src="images/logochinhthuc.png" usemap="#Map" style="border: 0ch"/>
          
        <span class="heading-primary_main">you are my everything<i class="fas fa-cloud"></i></span>
</div>