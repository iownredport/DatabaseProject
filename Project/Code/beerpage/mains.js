var a;
var zed;

$("#drinkerDropdown").change(function($eventData){
    //console.log($("#drinkerDropdown option:selected").val());






    $.ajax({
        type: 'POST',
        url: './arraychart1.php',
        data:{
            'beer': $("#drinkerDropdown option:selected").val()
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


            
            $(function() {
  $("#container").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
      text: "Bars Where " + $("#drinkerDropdown option:selected").val() + " Is Most Popular"
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
        text: 'Amount Sold In Bar',
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
      name: 'Amount Sold',
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
            'beer': $("#drinkerDropdown option:selected").val()
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
  $("#container1").highcharts({
    chart: {
      zoomType: 'xy'
    },
  title: {
      text: "Drinkers Who Consume The Most " + $("#drinkerDropdown option:selected").val()
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
        text: 'Amount Consumed',
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
      name: 'Amount Consumed',
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
            'beer': $("#drinkerDropdown option:selected").val()
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
  $("#container2").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
     text: "Day Of Week " + $("#drinkerDropdown option:selected").val() + " Is Consumed The Most"
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
        text: 'Amount Sold In Day',
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
      name: 'Amount Sold',
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
            'beer': $("#drinkerDropdown option:selected").val()
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
  $("#container3").highcharts({
    chart: {
      zoomType: 'xy'
    },
    title: {
   text: "Hour Of The Day When " + $("#drinkerDropdown option:selected").val() + " Is Consumed The Most"
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
        text: 'Amount Sold During Time',
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
      name: 'Amount Sold',
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


    });






