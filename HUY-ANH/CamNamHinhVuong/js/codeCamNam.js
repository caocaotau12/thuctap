		var screen=document.getElementById('big');
		screen.style.height=window.innerWidth+'px';
		screen.style.height=window.innerHeight+'px';
		var box=document.getElementById('box');
		
		box.onmousedown=function(e) {
                // grab the mouse position
			_startX = e.clientX;
        	_startY = e.clientY;
        
                // grab the clicked element's position
        
	        _offsetX = ExtractNumber(box.style.left);
	        _offsetY = ExtractNumber(box.style.top);

			this.onmouseup=null;
			screen.onmousemove=function(e){
				box.style.left = (_offsetX + e.clientX - _startX) + 'px';
    			box.style.top = (_offsetY + e.clientY - _startY) + 'px';
				
			
				screen.onmouseup=function(){
					console.log("nha chuot");
					screen.onmousemove=null;
					
				}
			}
		};
		function ExtractNumber(value)
		{
		    var n = parseInt(value);
			
		    return n == null || isNaN(n) ? 0 : n;
		}
		// makeMovable(screen,box);
		