window.onload=function(){
    $.ajax({
        url : "http://localhost/DigitalGrampanchayat/utilityscripts/fetchnotices.php",
        method : 'GET',
        success : function(response){
            console.log(response);
            document.getElementById('notices-content').innerHTML+=response;
        }
    })
}