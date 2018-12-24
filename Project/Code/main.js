
var forst;
var secant;

$("#drinkerDropdown").change(function($eventData){
    //console.log($("#drinkerDropdown option:selected").val());
 
 
    $.ajax({
        type: 'POST',
        url: './drinker_results.php',
        data:{
            'name': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
            //console.log(data);
            $("#drinkerResults").html(data);
        }
    });
 




$.ajax({
        type: 'POST',
        url: './arraychart1.php',
        data:{
            'name': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
        
        
      //console.log(data);
var fields = data.split(/,/);

var arr2 = fields.filter(function(el) {
    return el.length && el==+el;
//  more comprehensive: return !isNaN(parseFloat(el)) && isFinite(el);
});
var diff = $(fields).not(arr2).get();



var result = arr2.map(function (x) { 
  return parseFloat(x, 10); 

});
//console.log(diff);


            
            $(function() {
  $("#container").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Total Amount Spent In Bar For " + $("#drinkerDropdown option:selected").val()
    },
    subtitle: {
      text: "Source: BeerDrinkerStudies"
    },
    xAxis: [{
      categories: diff
    }],
    yAxis: [{ //Primary yAxis
      labels: {
        format: '${value}',
        style: {
          color: '#714BB9'
        }
      },
      title: {
        text: 'Amount Spend In Bar',
        style: {
          color: '#714BB9'
        }
      }
    }, ],
    tooltip: {
      shared: true
    },
    legend: {
      layout: 'vertical',
      align: 'left',
      x: 120,
      verticalAlign: 'top',
      y: 100,
      floating: true,
      backgroundColor: '#16013E'
    },
    series: [
    {
      name: 'Amount Spent In Bar',
      color: '#714BB9',
      type: 'column',
      yAxis: 0,
      data: result,
      tooltip: {
        valueSuffix: ' Dollars'
      }
   }]
  });
});





$.ajax({
        type: 'POST',
        url: './arraychart2.php',
        data:{
            'name': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
          //console.log(data);

          var fields = data.split(/,/);


var arr2 = fields.filter(function(el) {
    return el.length && el==+el;
//  more comprehensive: return !isNaN(parseFloat(el)) && isFinite(el);
});

var diff = $(fields).not(arr2).get();

var result = arr2.map(function (x) { 
  return parseInt(x, 10); 
});

//console.log(diff);
//console.log(result);

            
            $(function() {
  $("#container2").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Total Beers Ordered For " + $("#drinkerDropdown option:selected").val()
    },
    subtitle: {
      text: "Source: BeerDrinkerStudies"
    },
    xAxis: [{
      categories: diff
    }],
    yAxis: [{ //Primary yAxis
      labels: {
        format: '{value}',
        style: {
          color: '#714BB9'
        }
      },
      title: {
        text: 'Beer Amount Ordered',
        style: {
          color: '#714BB9'
        }
      }
    }, ],
    tooltip: {
      shared: true
    },
    legend: {
      layout: 'vertical',
      align: 'left',
      x: 120,
      verticalAlign: 'top',
      y: 100,
      floating: true,
      backgroundColor: '#16013E'
    },
    series: [
    {
      name: 'Beer Amount Ordered',
      color: '#714BB9',
      type: 'column',
      yAxis: 0,
      data: result,
      tooltip: {
        valueSuffix: ''
      }
   }]
  });
});

        }
    });

             
        }
    });
  
    });






