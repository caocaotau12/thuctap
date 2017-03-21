		var screen=document.getElementById('big');
		screen.style.height=window.innerWidth+'px';
		screen.style.height=window.innerHeight+'px';
		var box=document.getElementById('box');
		
		box.onmousedown=function() {
			this.onmouseup=null;
			screen.onmousemove=function(){
				
				
				box.style.top=event.clientY-20 +'px';
				box.style.left=event.clientX-20+'px';
				screen.onmouseup=function(){
					console.log("nha chuot");
					screen.onmousemove=null;
					
				}
			}
		};
		// makeMovable(screen,box);
		