$(document).ready(function(){
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
    ]
    var ans=['#dapanA','#dapanB','#dapanC','#dapanD'];
    var size=quiz.length;
    var index=0;
    var cauhoi;
        
        function run(){
            cauhoi=quiz[index];
            console.log(cauhoi["answer"]);
            $("#quizX").text(cauhoi["question"]);
            var arrQ=cauhoi["listanswer"];
                for(var j=0;j<ans.length;j++){
                    var x=setTimeout(function() {
                        $("#ketqua").html("");
                    },1000);
                   var t=$(ans[j]);
                   t.text(arrQ[j]);
                   t.click(function(){
                       cauhoi["next"]=true;
                       var s=$(this).text();
                                if($(this).text()==cauhoi['answer']){
                                    $("#ketqua").html("Dung roi");
                                }
                                else{
                                    $("#ketqua").html("Sai roi");
                                }
                                if(index<size-1) index++;
                                run();
                   });
               }
              
           
        }
        run();
             
            
            
        
        
                

           


    
   
});

