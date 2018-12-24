var a;
var zed;

$("#drinkerDropdown").change(function($eventData){
    //console.log($("#drinkerDropdown option:selected").val());






    $.ajax({
        type: 'POST',
        url: './arraybs5.php',
        data:{
            'barName': $("#drinkerDropdown option:selected").val()
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
//console.log(result);
//console.log(diff);


            
            $(function() {
  $("#container5").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Busiest Hours Of The Day In " + $("#drinkerDropdown option:selected").val()
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
        text: 'Amount Of Drinkers Present',
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
      name: 'Time',
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
 



$.ajax({
        type: 'POST',
        url: './arraybs4.php',
        data:{
            'barName': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
       
          var fields = data.split(/,/);


var arr2 = fields.filter(function(el) {
    return el.length && el==+el;
//  more comprehensive: return !isNaN(parseFloat(el)) && isFinite(el);
});

var diff = $(fields).not(arr2).get();

var result = arr2.map(function (x) { 
  return parseInt(x, 10); 
});
//console.log(result);
//console.log(diff);


            
            $(function() {
  $("#container4").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Busiest Days Of The Week In " + $("#drinkerDropdown option:selected").val()
    },
    subtitle: {
      text: "Source: BeerDrinkerStudies"
    },
    xAxis: [{
      categories: diff
    }],
    yAxis: [{ //Primary yAxis
      labels: {
        format: '',
        style: {
          color: '#714BB9'
        }
      },
      title: {
        text: 'Amount Of Drinkers Present',
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
      name: 'Day',
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







 $.ajax({
        type: 'POST',
        url: './arraybs3.php',
        data:{
            'barName': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
        	

        	var fields = data.split(/,/);


var arr2 = fields.filter(function(el) {
    return el.length && el==+el;
//  more comprehensive: return !isNaN(parseFloat(el)) && isFinite(el);
});

var diff = $(fields).not(arr2).get();

var result = arr2.map(function (x) { 
  return parseInt(x, 10); 
});
//console.log(result);
//console.log(diff);


            
            $(function() {
  $("#container3").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Top Beer Manufactures For " + $("#drinkerDropdown option:selected").val()
    },
    subtitle: {
      text: "Source: BeerDrinkerStudies"
    },
    xAxis: [{
      categories: diff
    }],
    yAxis: [{ //Primary yAxis
      labels: {
        format: '',
        style: {
          color: '#714BB9'
        }
      },
      title: {
        text: 'Amount Sold',
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
      name: 'Manufacture Sold',
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







 
    $.ajax({
        type: 'POST',
        url: './arraychart2.php',
        data:{
            'barName': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
        	
        	var fields = data.split(/,/);

var arr2 = fields.filter(function(el) {
    return el.length && el==+el;
//  more comprehensive: return !isNaN(parseFloat(el)) && isFinite(el);
});

var diff = $(fields).not(arr2).get();

var result = arr2.map(function (x) { 
  return parseInt(x, 10); 
});


            
            $(function() {
  $("#container2").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Most Popular Beers Sold In " + $("#drinkerDropdown option:selected").val() 
    },
    subtitle: {
      text: "Source: BeerDrinkerStudies"
    },
    xAxis: [{
      categories: diff
    }],
    yAxis: [{ //Primary yAxis
      labels: {
        format: '',
        style: {
          color: '#714BB9'
        }
      },
      title: {
        text: 'Beers Bought',
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
      name: 'Beers Consumed',
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







    $.ajax({
        type: 'POST',
        url: './arraychart1.php',
        data:{
            'barName': $("#drinkerDropdown option:selected").val()
        },
        success: function(data){
           

var fields = data.split(/,/);

var arr2 = fields.filter(function(el) {
    return el.length && el==+el;
//  more comprehensive: return !isNaN(parseFloat(el)) && isFinite(el);
});
//console.log(arr2);
var diff = $(fields).not(arr2).get();



var result = arr2.map(function (x) { 
  return parseFloat(x, 10); 

});





$(function() {
  $("#container").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Top Spenders In " + $("#drinkerDropdown option:selected").val() 
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
        text: 'Amount Spent',
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
      name: 'Drinker Spent',
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





             
        }
    });
  
    });






