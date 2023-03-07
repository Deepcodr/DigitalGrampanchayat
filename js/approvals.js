window.onload=function(){
    $.ajax({
        url : "http://localhost/DigitalGrampanchayat/utilityscripts/fetchapprovals.php",
        method : 'GET',
        success : function(response){
            document.getElementById('approvals-content').innerHTML=response;
        }
    })
}