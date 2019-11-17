$(function(){
  $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
  });

  $("form[data-confirm]").submit(function() {
    $('body').css('opacity','0.1');
    if (!confirm($(this).attr("data-confirm"))) {
      $('body').css('opacity','1');
      return false;
    }
  });

  // $(document.body).append('<div id="preloader"><div class="cssload-thecube"><div class="cssload-cube cssload-c1"></div><div class="cssload-cube cssload-c2"></div><div class="cssload-cube cssload-c4"></div><div class="cssload-cube cssload-c3"></div></div></div>');
  $(document.body).append('<div id="preloader"><div class="loader"><div class="circle"></div><div class="circle"></div><div class="circle"></div></div></div>');
  $(document).ajaxStop(function () {
    $('#preloader').hide();
  });

  $(document).ajaxStart(function () {
    $('#preloader').show();
  });
  $('#preloader').hide();


  Date.prototype.getMonthName = function(lang) {
    lang = lang && (lang in Date.locale) ? lang : 'en';
    return Date.locale[lang].month_names[this.getMonth()];
  };

  Date.prototype.getMonthNameShort = function(lang) {
    lang = lang && (lang in Date.locale) ? lang : 'en';
    return Date.locale[lang].month_names_short[this.getMonth()];
  };

  Date.locale = {
    en: {
     month_names: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
     month_names_short: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
   }
 };

 Date.prototype.sameDay = function(d) {
  return this.getFullYear() === d.getFullYear()
  && this.getDate() === d.getDate()
  && this.getMonth() === d.getMonth();
}

});

function getFormatedDate(date)
{
  var d=new Date(date);
  var day=d.getDate();
  var month=d.getMonthNameShort();
  var y=d.getFullYear();

  return (day+'-'+month+'-'+y);

}

function displayFiancialYear(from_date,to_date,index){
  from_date=new Date(from_date);
  to_date=new Date(to_date);
  if(index == 1){
    return from_date.getFullYear()+' - '+parseInt(to_date.getFullYear().toString().substr(2,2), 10);
  }else if(index == 2){
    return parseInt(from_date.getFullYear().toString().substr(2,2), 10)+' - '+to_date.getFullYear();
  }else if(index == 3){
    return parseInt(from_date.getFullYear().toString().substr(2,2), 10)+' - '+parseInt(to_date.getFullYear().toString().substr(2,2), 10);
  }else{
    return from_date.getFullYear()+' - '+to_date.getFullYear();
  }
}

function replaceSpecialCharacters(str)
{
 return $.trim(str.replace(/[&\/\\#,+()$~%.'":*?<>{} ]/g,'_',''));

}


function getFormatedDate2(date)
{
  var d=new Date(date);
  var day=d.getDate();
  var month=d.getMonthName();
  var y=d.getFullYear();

  return (day+' '+month+' '+y);

}

function getYearMonth(date)
{
  var d=new Date(date);
  var day=d.getDate();
  // var month=d.getMonthNameShort();
  var m=d.getMonth();
  var y=d.getFullYear();

  return (y+''+(("0" + (m + 1)).slice(-2)));

}

function getProductionCardNumber(id,date)
{
  date=date.split(' ');
  date=date[0].split('-');
  production_card_number='C'+date[0].substring(2)+date[1]+date[2]+'-'+pad_with_zeroes(id,4);
  return production_card_number;
}

function getQuotationNumber(id,date)
{
  date=date.split(' ');
  date=date[0].split('-');
  quotation_number='Q-'+date[0].substring(2)+date[1]+date[2]+'-'+pad_with_zeroes(id,4);
  return quotation_number;
}

function getOaNumber(id,date)
{
  date=date.split(' ');
  date=date[0].split('-');
  oa_number='O-'+date[0].substring(2)+date[1]+date[2]+'-'+pad_with_zeroes(id,4);
  return oa_number;
}

function getDCNumber(id,date)
{
  date=date.split(' ');
  date=date[0].split('-');
  dc_number='D-'+date[0].substring(2)+date[1]+date[2]+'-'+pad_with_zeroes(id,5);
  return dc_number;
}

function getBillNumber(id,date)
{
  date=date.split(' ');
  date=date[0].split('-');
  invoice_number='B-'+date[0].substring(2)+date[1]+date[2]+'-'+pad_with_zeroes(id,5);
  return invoice_number;
}

function getInvNumber(id)
{
 
  invoice_number=pad_with_zeroes(id,5);
  return invoice_number;
}

function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
    .toString(16)
    .substring(1);
  }
  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
  s4() + '-' + s4() + s4() + s4();
}
function getDateDifferenceInDays(date1,date2){
  date1=new Date(date1);
  date2=new Date(date2);
  var diff = new Date(date1 - date2);
  var days = diff/1000/60/60/24;
  var x=(days.toString()).split('.');
  return x[0];
}


function convert_number(number)
{
  if ((number < 0) || (number > 999999999)) 
  { 
    return "NUMBER OUT OF RANGE!";
  }
  var Gn = Math.floor(number / 10000000);  /* Crore */ 
  number -= Gn * 10000000; 
  var kn = Math.floor(number / 100000);     /* lakhs */ 
  number -= kn * 100000; 
  var Hn = Math.floor(number / 1000);      /* thousand */ 
  number -= Hn * 1000; 
  var Dn = Math.floor(number / 100);       /* Tens (deca) */ 
  number = number % 100;               /* Ones */ 
  var tn= Math.floor(number / 10); 
  var one=Math.floor(number % 10); 
  var res = ""; 

  if (Gn>0) 
  { 
    res += (convert_number(Gn) + " CRORE"); 
  } 
  if (kn>0) 
  { 
    res += (((res=="") ? "" : " ") + 
      convert_number(kn) + " LAKH"); 
  } 
  if (Hn>0) 
  { 
    res += (((res=="") ? "" : " ") +
      convert_number(Hn) + " THOUSAND"); 
  } 

  if (Dn) 
  { 
    res += (((res=="") ? "" : " ") + 
      convert_number(Dn) + " HUNDRED"); 
  } 


  var ones = Array("", "ONE", "TWO", "THREE", "FOUR", "FIVE", "SIX","SEVEN", "EIGHT", "NINE", "TEN", "ELEVEN", "TWELVE", "THIRTEEN","FOURTEEN", "FIFTEEN", "SIXTEEN", "SEVENTEEN", "EIGHTEEN","NINETEEN"); 
  var tens = Array("", "", "TWENTY", "THIRTY", "FOURTY", "FIFTY", "SIXTY","SEVENTY", "EIGHTY", "NINETY"); 

  if (tn>0 || one>0) 
  { 
    if (!(res=="")) 
    { 
      res += " AND "; 
    } 
    if (tn < 2) 
    { 
      res += ones[tn * 10 + one]; 
    } 
    else 
    { 

      res += tens[tn];
      if (one>0) 
      { 
        res += ("-" + ones[one]); 
      } 
    } 
  }

  if (res=="")
  { 
    res = "zero"; 
  } 
  return res;
}
function pad_with_zeroes(number, length) {

  var my_string = '' + number;
  while (my_string.length < length) {
    my_string = '0' + my_string;
  }

  return my_string;

}

//inputDate = "25-11-2016"
//inputDate = "dd-mm-yyyy"

function getFormattedStringDate(inputDate){
 console.log("inputDate");
 console.log(inputDate);
 var sptdate = String(inputDate).split("/");
 var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
 var myMonth = sptdate[0];
 var myDay = sptdate[1];
 var myYear = sptdate[2];
 var combineDatestr = myDay + " " + months[myMonth - 1] + " " + myYear;
 
 return combineDatestr;
}


function getFormattedStringDate1(inputDate){
  var sptdate = String(inputDate).split("-");
  console.log("inputDate");
  console.log(sptdate);
  var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var myMonth = sptdate[1];
  var myDay = sptdate[2];
  var myYear = sptdate[0];
  var combineDatestr = myDay + " " + months[myMonth - 1] + " " + myYear;
  
  return combineDatestr;
}

function getFormattedDate(inputDate){
  var sptdate = String(inputDate).split("-");
  console.log("inputDate");
  console.log(sptdate);
  var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var myMonth = sptdate[1];
  var myDay = sptdate[2];
  var myYear = sptdate[0];
  var combineDatestr = myDay + "/" + myMonth + "/" + myYear;
  
  return combineDatestr;
}

function number2text(value) {
 var fraction = Math.round(frac(value)*100);
 var f_text  = "";

 if(fraction > 0) {
   f_text = "AND "+convert_number(fraction)+" PAISE";
 }

 return " RUPEES "+convert_number(value)+f_text+" ONLY";
}

function frac(f) {
 return f % 1;
}

function Comma(Num) { //function to add commas to textboxes
           // Num += '';
           // Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
           // Num = Num.replace(',', ''); Num = Num.replace(',', ''); Num = Num.replace(',', '');
           // x = Num.split('.');
           // x1 = x[0];
           // x2 = x.length > 1 ? '.' + x[1] : '';
           // var rgx = /(\d+)(\d{3})/;
           // while (rgx.test(x1))
           //     x1 = x1.replace(rgx, '$1' + ',' + '$2');
           // return x1 + x2;
           return Num;
         }

function getDateFormat($date){
          
  var edd=($date.toString()).split('/');

  var convertDate=edd[2]+'-'+edd[1]+'-'+edd[0];
          console.log(convertDate);

  return convertDate;

}


function moneyFormatIndia(x)
{
   
if(Number(x) === 0){
  return '-';
}
x=x.toString();
var afterPoint = '';
if(x.indexOf('.') > 0)
 afterPoint = x.substring(x.indexOf('.'),x.length);
x = Math.floor(x);
x=x.toString();
var lastThree = x.substring(x.length-3);
var otherNumbers = x.substring(0,x.length-3);
if(otherNumbers != '')
  lastThree = ',' + lastThree;
var res = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
return res;
}

