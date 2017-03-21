		var screen=document.getElementById('big');
		screen.style.height=window.innerWidth+'px';
		screen.style.height=window.innerHeight+'px';
		var box=document.getElementById('box');
		
		box.onmousedown=function() {
			this.onmouseup=null;
			this.onmousemove=function(event){
				box.style.top=event.clientY-20 +'px';
				box.style.left=event.clientX-20+'px';
				this.onmouseup=function(){
					console.log("nha chuot");
					this.onmousemove=null;
					
				}
			}
		};