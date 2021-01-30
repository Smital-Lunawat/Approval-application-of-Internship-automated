function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        var iFileSize = oInput.files[0].size;
        console.log(iFileSize);
         if (sFileName.length > 0) {
            var blnValid = false;
            var _validFileExtensions = ".pdf";
            console.log(_validFileExtensions);
            
                if (sFileName.substr(sFileName.length - _validFileExtensions.length,  _validFileExtensions.length).toLowerCase() ==  _validFileExtensions.toLowerCase() && iFileSize < 10485760) {
                    
                  blnValid = true;
                }
            if (!blnValid) {
                alert("Please make sure your file is in pdf format and less than 10 MB");
                oInput.value = "";
                return false;
            }
            
        }
    }
    return true;
}

function Checktitle(val){
    var element=document.getElementById('title');
    if(val=='others')  
      element.style.display='block';
    else{
      element.value = val;
      element.style.display='none';
    }
   }


   function ChangeDuration(){
    var start_date = document.getElementById("Sdate").value;
    var end_date = document.getElementById("Edate").value;
    var date1 = new Date(start_date);
    var date2 = new Date(end_date);
   
  
  
    var diff = Math.floor(date2.getTime() - date1.getTime());
      var day = 1000 * 60 * 60 * 24;
  
      var days = Math.floor(diff/day);
      var months = Math.floor(days/31);
  

      
      if(((date2.getDate()-date1.getDate()+1)>=20) || (((date1.getDate()-date2.getDate()+1)<=10) && ((date1.getDate()-date2.getDate())>0))){
    months++;
  }
  // else{
  //   alert("Duration should be greater than 1 month !!!")
  //   }
      // var years = Math.floor(months/12);
  // while (days=>20){
  //   days = days - 30;
  
  // }
  
  //   var year1=date1.getFullYear();
  //   var year2=date2.getFullYear();
  //   var month1=date1.getMonth();
  //   var month2=date2.getMonth();
  // if(month1===0){ //Have to take into account
  //   month1++;
  //   month2++;
  // }
  
    number = months;
    if(number>6){
      alert("Duration should be less than 6 months");
      document.getElementById('Sdate').value = "";
      document.getElementById('Edate').value = "";
      document.getElementById("myDATE").innerHTML = "";
    }
  
    // alert(number);
    // return number;
    // var dur = number;
    // dur.value = number;
    else if(date2<date1){
      alert("Start date should be less than end date");
      document.getElementById('Sdate').value = "";
      document.getElementById('Edate').value = "";
      document.getElementById("myDATE").innerHTML = "";
    } 
    else if(number<1){
      alert("Duration should be greater than 1 month");
      document.getElementById('Sdate').value = "";
      document.getElementById('Edate').value = "";
      document.getElementById("myDATE").innerHTML = "";
    }
    else{
      document.getElementById("myText").innerHTML = number;
    // var dur = document.getElementById("myText");
    document.getElementById("myText").value = number;
    document.getElementById("myDATE").innerHTML = number;
    }
  }