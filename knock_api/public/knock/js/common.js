function pad_with_zeroes(number, length) {

    var my_string = '' + number;
    while (my_string.length < length) {
        my_string = '0' + my_string;
    }

    return my_string;

}

function getFormatedNumber(date){
  var d = new Date(date);
  var full_date=d.getDate();
  var full_year=d.getFullYear();
  var month=d.getMonth();
  var s=full_year.toString();
  var year=s.slice('2');
  //year = year.toString().substr(2,2);
  var format=year+month+full_date;
  return format;
}	

function getFormatedDate(date)
{
  var d=new Date(date);
  var day=d.getDate();
  var month=d.getMonthName();
  var y=d.getFullYear();

  return (day+' '+month+' '+y);

}

function getDateDifferenceInDays(date1,date2){
  date1=new Date(date1);
  date2=new Date(date2);
  var diff = new Date(date1 - date2);
  var days = diff/1000/60/60/24;
  var x=(days.toString()).split('.');
  return x[0];
}



function getJSDate(php_date){
php_date=php_date.split('-');
php_date=php_date[2]+'-'+php_date[1]+'-'+php_date[0];
return php_date;
}


function getEnquiryNumber(num,date)
{
 
}
