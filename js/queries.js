window.onload=function(){
    $.ajax({
        url : "http://localhost/DigitalGrampanchayat/utilityscripts/fetchqueries.php",
        method : 'GET',
        success : function(response){
            document.getElementById('queries-content').innerHTML=response;
        }
    })
}