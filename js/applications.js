window.onload=function(){
    $.ajax({
        url : "http://localhost/DigitalGrampanchayat/utilityscripts/fetchapplications.php",
        method : 'GET',
        success : function(response){
            document.getElementById('applications-content').innerHTML=response;
        }
    })
}