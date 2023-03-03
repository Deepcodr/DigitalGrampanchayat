window.onload=function(){
    $.ajax({
        url : "http://localhost/DigitalGrampanchayat/utilityscripts/fetchcertificates.php",
        method : 'GET',
        success : function(response){
            document.getElementById('certificates-content').innerHTML=response;
        }
    })
}