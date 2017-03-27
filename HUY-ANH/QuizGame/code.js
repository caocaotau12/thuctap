$(document).ready(function(){
    //set up quiz data
    var quiz=[
    {
       
        "question":"Anh vau di dau ve day?",
        "listanswer":['Game','Bong da','Co vua','danh nhau'],
        "answer":'Game',
        "next":false
    },
    {
       
        "question":"Anh di dau day",
        "listanswer":['di choi','di ngu','di ve sinh',"di sinh nhat"],
        "answer":'di ngu',
        "next":false
    },
    {
       
        "question":"Anh an com chua",
        "listanswer":['chua','roi','khong noi','an tu hom qua'],
        "answer":'khong noi',
        "next":false
    }
    ,
    {
       
        "question":"Mai di choi khong",
        "listanswer":['co','khong','tuy tam trang','k ranh'],
        "answer":'k ranh',
        "next":false
    }
    ];
    var ans=['#dapanA','#dapanB','#dapanC','#dapanD'];
    var size=quiz.length;
    console.log(size);
    var index=0;
   
        
        function run(){
            var cauhoi=quiz[index];
            
            $("#quizX").text(cauhoi["question"]);
         
            loadAnswer(cauhoi);  
           
        }
        function loadAnswer(object){
            var arrQ=object["listanswer"];
                document.getElementById("dapan").innerHTML="";
                for(var j=0;j<ans.length;j++){
                    //delete result true or false
                    var x=setTimeout(function() {
                        $("#ketqua").html("");
                    },1000);
                   //get the name and set text for that selector.
                   
                   var x= document.createElement("li");
                   x.id=ans[j];
                   x.innerHTML=arrQ[j];
                   document.getElementById("dapan").appendChild(x);
                   $(x).click(function(){
                        console.log($(this).text());

                                if($(this).text()==object['answer']){
                                    $("#ketqua").html("Dung roi");
                                }
                                else{
                                    $("#ketqua").html("Sai roi");
                                }
                                if(index<size-1) index++;
                                run();




                   });
               }
            if(index==size-1) return;
               
        }
        run();
             
            
            
        
        
                

           


    
   
});

