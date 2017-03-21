//ghi chu

var x=0;
           var y=0;
           var m,n;
           var z;
           var l=0, t=0;
          
           
           var animate;
           var sr=document.getElementById('screen');
            sr.style.height=window.innerHeight+"px";
            sr.style.width=window.innerWidth+"px";
function boxbox(boxx){
            var A1 = function (event){
                m=x;
                n=y;
                z=Math.abs(parseFloat((event.clientX-x)/(event.clientY-y)));
                x=event.clientX;
                y=event.clientY;
               B();
           };
        this.run=function(){
              sr.addEventListener('click', function(event){
                  A1(event);
              });     
         } ; 
   
        function B(){
               if(x<m){
                   l=l-z;
                   boxx.style.left=l+'px';
//                   boxx.style.left=parseFloat(boxx.style.left)-z+'px';
                   if(y<n){
//                       boxx.style.top=parseFloat(boxx.style.top)-1+'px';
                       t=t-1;
                       boxx.style.top=t+'px';
                   }
                   else{
//                       boxx.style.top=parseFloat(boxx.style.top)+1+'px';
                       t=t+1;
                       boxx.style.top=t+'px';
                   }
               }
               else{
//                   boxx.style.left=parseFloat(boxx.style.left)+z+'px';
                   l=l+z;
                   boxx.style.left=l+'px';
                   if(y<n){
//                       boxx.style.top=parseFloat(boxx.style.top)-1+'px';
                       t=t-1;
                       boxx.style.top=t+'px';
                   }
                   else{
//                       boxx.style.top=parseFloat(boxx.style.top)+1+'px';
                       t=t+1;
                       boxx.style.top=t+'px';
                   }
               }
               
               if(parseInt(boxx.style.top)===y){
                   clearTimeout(animate);
               }
               else{
               animate=setTimeout(B,10);}
           };
            }
            
            
//           var sr=document.getElementById('screen');
//            sr.style.height=window.innerHeight+"px";
//            sr.style.width=window.innerWidth+"px";
       
//           var x=0;
//           var y=0;
//           var m,n;
//           var z;
//           var l=0, t=0;
//           var boxx=bb.bx;
//           console.log(boxx);
//           var animate;
//           boxx.style.left='0px';
//           boxx.style.top='0px';
//           function A(event){
//                m=x;
//                n=y;
//                z=Math.abs(parseFloat((event.clientX-x)/(event.clientY-y)));
//                x=event.clientX;
//                y=event.clientY;
//               B();
//           }
           
//           function B(){
//               if(x<m){
//                   l=l-z;
//                   boxx.style.left=l+'px';
////                   boxx.style.left=parseFloat(boxx.style.left)-z+'px';
//                   if(y<n){
////                       boxx.style.top=parseFloat(boxx.style.top)-1+'px';
//                       t=t-1;
//                       boxx.style.top=t+'px';
//                   }
//                   else{
////                       boxx.style.top=parseFloat(boxx.style.top)+1+'px';
//                       t=t+1;
//                       boxx.style.top=t+'px';
//                   }
//               }
//               else{
////                   boxx.style.left=parseFloat(boxx.style.left)+z+'px';
//                   l=l+z;
//                   boxx.style.left=l+'px';
//                   if(y<n){
////                       boxx.style.top=parseFloat(boxx.style.top)-1+'px';
//                       t=t-1;
//                       boxx.style.top=t+'px';
//                   }
//                   else{
////                       boxx.style.top=parseFloat(boxx.style.top)+1+'px';
//                       t=t+1;
//                       boxx.style.top=t+'px';
//                   }
//               }
//               
//               if(parseInt(boxx.style.top)===y){
//                   clearTimeout(animate);
//               }
//               else{
//               animate=setTimeout(B,10);}
//           }
       
            
            
     
   