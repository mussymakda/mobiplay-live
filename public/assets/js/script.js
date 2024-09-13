const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
  e.preventDefault();
  $wrapper.classList.toggle('toggled');
});


$('.lang-menu a').click(function(){
    $('.lang-menu a.active').removeClass('active');
    $(this).addClass('active');
});

$('.profile-drop-link').click(function(){
    $('.profile-link').slideToggle('show');
    
});

var options = {
  chart: {
    type: 'line',
    toolbar: {
      show: false
    }
  },
  
  series: [{
    name: 'Impressions',
    data: [1000,2545,3000,3500,4200,3700,5800,6800,8000]
  }],
  xaxis: {

    categories: ["14 Jan","15 Jan","16 Jan","17 Jan","18 Jan","19 Jan","20 Jan", "21 Jan","22 Jan"]
  },
  colors: ['#DB5AEE'],
  title: {
    text: "Impressions",
    align: "left",
    style: {
      fontSize: "16px"
    }
  },
  subtitle: {
    text: "2545",
    floating: true,
    align: "right",
    offsetY: 0,
    style: {
      fontSize: "22px",

    }
  }

}

var chart = new ApexCharts(document.querySelector("#impressionchart"), options);

chart.render();

var options = {
  chart: {
    type: 'bar',
    toolbar: {
      show: false
    }

  },
  series: [{
    name: 'Impressions',
    data: [5000,7000,5300,3500,6545,5200,7200,2500,2500]
  }],
  xaxis: {
    categories: ["14 Jan","15 Jan","16 Jan","17 Jan","18 Jan","19 Jan","20 Jan", "21 Jan","22 Jan"]
  },
  dataLabels: {
    enabled: false
  },

  colors: ['#AFAFAF'],
  title: {
    text: "Cost Per Mile",
    align: "left",
    style: {
      fontSize: "16px"
    }
  },
  subtitle: {
    text: "2545",
    floating: true,
    align: "right",
    offsetY: 0,
    style: {
      fontSize: "22px"
    }
  }
}

var chart = new ApexCharts(document.querySelector("#costchart"), options);

chart.render();



var options = {
  chart: {
    type: 'line',
    toolbar: {
      show: false
    }
  },
  
  series: [{
    name: 'Impressions',
    data: [1000,2545,3000,3500,4200,3700,5800,6800,8000]
  }],
  xaxis: {

    categories: ["14 Jan","15 Jan","16 Jan","17 Jan","18 Jan","19 Jan","20 Jan", "21 Jan","22 Jan"]
  },
  colors: ['#DB5AEE'],
  title: {
    text: "Impressions",
    align: "left",
    style: {
      fontSize: "16px"
    }
  },
  subtitle: {
    text: "2545",
    floating: true,
    align: "right",
    offsetY: 0,
    style: {
      fontSize: "22px",
      
    }
  }

}

var chart = new ApexCharts(document.querySelector("#impression-chart"), options);

chart.render();

var options = {
  chart: {
    type: 'bar',
    toolbar: {
      show: false
    }

  },
  series: [{
    name: 'Impressions',
    data: [5000,7000,5300,3500,6545,5200,7200,2500,2500]
  }],
  xaxis: {
    categories: ["14 Jan","15 Jan","16 Jan","17 Jan","18 Jan","19 Jan","20 Jan", "21 Jan","22 Jan"]
  },
  dataLabels: {
    enabled: false
  },

  colors: ['#AFAFAF'],
  title: {
    text: "Cost Per Mile",
    align: "left",
    style: {
      fontSize: "16px"
    }
  },
  subtitle: {
    text: "2545",
    floating: true,
    align: "right",
    offsetY: 0,
    style: {
      fontSize: "22px"
    }
  }
}

var chart = new ApexCharts(document.querySelector("#cost-chart"), options);

chart.render();