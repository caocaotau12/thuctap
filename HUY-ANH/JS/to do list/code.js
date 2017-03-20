
var works;

function loadDuLieu(){
	
	document.getElementById("congviec").innerHTML="";
	works=(document.cookie).split(";");
	
	 
	if(works.toString()!=""){
		
		for(var i=0;i<works.length;i++){
		var one=document.createElement("p");
		var small=works[i].split("=");
		one.innerHTML=(small[1]);
		one.id=small[0];
		one.addEventListener('click',
				function(){
					this.remove();
					var d = new Date();
				    d.setDate(d.getDate() -1);
				    var expires = "expires="+ d.toUTCString();
				    

				    document.cookie = this.id+"=;" + expires;
				   
				});
		document.getElementById("congviec").appendChild(one);
	}




	}
	

}
function add(){
	var work=document.getElementById("inputWord").value;
	var count=works.length;
	var id = (new Date()).valueOf();
	
	document.cookie=id+'='+work;
	loadDuLieu();

}

