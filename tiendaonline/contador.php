<style type='text/css'>#countdown_container{font-size:13px;width:200px;height:160px;}.countdown_square_container{color:#333;float:left;}.countdown_number{-webkit-box-shadow:0px 5px 10px 0px #444;box-shadow:0px 5px 10px 0px #444;-webkit-border-radius:10px 10px 10px 10px;border-radius:10px 10px 10px 10px;background:#FFF;width:50px;height:65px;font-size:30px;text-align:center;padding-top:15px;}.countdown_number_name{margin-top:10px;font-size:11px;text-transform:uppercase;text-align:center;text-shadow:1px 1px 0px #fff;}#countdown_toppart{height:115px;width:210px;margin:0px auto;}#countdown_bottompart{text-align:center;font-size:16px;text-shadow:1px 1px 0px #fff;max-height:55px;max-width:200px;overflow:hidden;}</style><script type="text/javascript">/*courtesy of onlineclock.net*/ 

countdown_dateFuture=new Date(2016,1,26,0,0,0);
function countdown_UpdateCount(){
dateNow=new Date();
timediff=Math.abs(countdown_dateFuture.getTime() - dateNow.getTime());
delete dateNow;
if(timediff<0){
	
	document.getElementById('countdown_container').style.display="none";
	}else {
		
		days=0;
		hours=0;
		mins=0;
		secs=0;
		out="";
		timediff=Math.floor(timediff/1000);
		days=Math.floor(timediff/86400);
		timediff=timediff % 86400;
		hours=Math.floor(timediff/3600);
		timediff=timediff % 3600;
		mins=Math.floor(timediff/60);
		timediff=timediff % 60;
		secs=Math.floor(timediff);
		if(document.getElementById('countdown_container')){
			document.getElementById('countdown_days').innerHTML=days;
			document.getElementById('countdown_hours').innerHTML=hours;
			document.getElementById('countdown_mins').innerHTML=mins;
			document.getElementById('countdown_secs').innerHTML=secs;
			}
			setTimeout("countdown_UpdateCount()", 1000);
			}
			}
			window.onload=function(){
				countdown_UpdateCount();
				}
				</script>
				
				<div id="countdown_container"><div id="countdown_toppart"><div class="countdown_square_container"><div class="countdown_number" id="countdown_days"></div><div class="countdown_number_name">Days</div></div><div class="countdown_square_container"><div class="countdown_number" id="countdown_hours"></div><div class="countdown_number_name">Hours</div></div><div class="countdown_square_container"><div class="countdown_number" id="countdown_mins"></div><div class="countdown_number_name">Mins</div></div><div class="countdown_square_container"><div class="countdown_number" id="countdown_secs"></div><div class="countdown_number_name">Secs</div></div></div></div>