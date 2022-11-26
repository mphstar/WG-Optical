<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/output.css">
  <title>Document</title>
</head>

<body class="bg-[#F0F0F0] font-ex-color box-border">

  <!-- Background hitam saat sidebar show -->
  <div id="bgbody" class="w-full h-screen bg-black fixed z-50 bg-opacity-50 hidden"></div>
  <!-- End Background hitam saat sidebar show -->

  <!-- sidebar -->
  <div id="ex-sidebar" class="ex-sidebar ex-hide-sidebar fixed z-50 max-lg:transition max-lg:duration-[1s]"></div>
  <!-- end sidebar -->

  <!-- start -->
  <div class="lg:ml-72 flex flex-col xl:h-screen">

    <!-- header -->
    <div class="w-full h-16 bg-white flex items-center md:justify-between md:px-5 justify-between px-6 overflow-hidden">
      <div class="flex flex-row uppercase font-ex-bold text-sm items-center">

        <!-- hamburger -->
        <div class="ex-burger mr-2 lg:hidden absolute" id="burger">
          <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24" width="20" height="20">
            <rect y="10.5" width="24" height="3" />
            <rect y="3.5" width="24" height="3" />
            <rect y="17.5" width="24" height="3" />
          </svg>
        </div>
        <div class="ex-burger mr-2 lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode" data-name="Isolation Mode" viewBox="0 0 24 24" width="20" height="20">
            <rect y="10.5" width="24" height="3" />
            <rect y="3.5" width="24" height="3" />
            <rect y="17.5" width="24" height="3" />
          </svg>
        </div>

        <h1>Dashboard</h1>
      </div>
      <div class="flex flex-row items-center">
        <div class="mr-4">
          <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.8313 21.0763L23.5594 20.8364C22.788 20.1491 22.1129 19.361 21.5521 18.4933C20.9397 17.2957 20.5727 15.9879 20.4725 14.6467V10.6961C20.4778 8.58936 19.7136 6.55319 18.3235 4.97017C16.9334 3.38714 15.013 2.36623 12.9233 2.09923V1.06761C12.9233 0.784463 12.8108 0.512912 12.6106 0.312696C12.4104 0.11248 12.1388 0 11.8557 0C11.5725 0 11.301 0.11248 11.1008 0.312696C10.9005 0.512912 10.7881 0.784463 10.7881 1.06761V2.11523C8.71703 2.40147 6.81989 3.42855 5.44804 5.00626C4.07618 6.58396 3.32257 8.60538 3.32679 10.6961V14.6467C3.22663 15.9879 2.85958 17.2957 2.24718 18.4933C1.69609 19.3588 1.03178 20.1468 0.271901 20.8364L0 21.0763V23.3315H23.8313V21.0763Z" fill="#444D68" />
            <path d="M9.81348 24.1712C9.8836 24.6781 10.1348 25.1425 10.5206 25.4787C10.9065 25.8148 11.401 26 11.9127 26C12.4245 26 12.9189 25.8148 13.3048 25.4787C13.6906 25.1425 13.9418 24.6781 14.0119 24.1712H9.81348Z" fill="#444D68" />
          </svg>
        </div>
        <img class="w-10 h-10 rounded-full" src="https://upload.wikimedia.org/wikipedia/id/d/d5/Aang_.jpg" alt="Rounded avatar">
      </div>
    </div>
    <!-- end header -->

    <!-- Main content -->
    <div class="flex flex-col xl:flex-row-reverse w-full xl:h-full p-5">

      <!-- jam & pie chart -->
      <div class="flex flex-col w-full xl:w-[40%] xl:p-5">
        <div class="flex flex-col w-full h-[130px] xl:h-[20%] rounded-lg bg-white justify-center items-center">
          <p id="time" onload="currentTime()" class="font-ex-bold text-[40px]"></p>
          <p id="date" onload="datenow()" class="font-ex-semibold text-[15px]"></p>
        </div>
        <div class="flex flex-col w-full h-[435px] xl:h-[80%] mt-5 rounded-lg bg-white items-center justify-around">
          <div class="flex flex-row justify-center font-ex-bold text-[15px] w-full">Frame Terlaris</div>
          <div id="pie_chart"></div>
        </div>
      </div>

      <!-- event laporan & chart -->
      <div class="flex flex-col w-full xl:p-5 xl:w-[60%] xl:h-full xl:justify-between">

        <!-- event & laporan -->
        <div class="flex flex-col md:flex-row xl:h-[40%]">

          <!-- <div class="flex w-1/2 bg-white">
            ssss
          </div> -->
          <div class="flex flex-col max-md:h-[231px] xl:h-full md:w-1/2 md:mr-5 mt-5 rounded-lg bg-white items-start xl:mx-0 xl:my-auto p-5">
            <p class="font-ex-semibold text-[16px] mb-3">Event Terdekat</p>
            <div class="flex flex-col justify-between w-full h-full overflow-auto scrollbar-hide text-[9px] font-ex-semibold">

              <!-- item -->
              <div class="flex flex-row items-center w-full h-[32%] py-1">
                <div class="flex flex-row w-[40%] h-full justify-between items-center pl-2">
                  <div class="w-[16px] h-[16px] rounded-full bg-[#7CBBAC]"></div>
                  <p>30-09-2022</p>
                  <div class="border-l-2 border-[#C2C2C2] h-full"></div>
                </div>
                <div class="flex items-center overflow-y-auto h-full w-[60%] pl-3 scrollbar-hide">
                  <p>Meriksa mata picek di TK Tadika-Mesra Lorem ipsum dolor sit amet.</p>
                </div>
              </div>
              <div class="flex flex-row items-center w-full h-[32%] py-1">
                <div class="flex flex-row w-[40%] h-full justify-between items-center pl-2">
                  <div class="w-[16px] h-[16px] rounded-full bg-[#7CBBAC]"></div>
                  <p>30-09-2022</p>
                  <div class="border-l-2 border-[#C2C2C2] h-full"></div>
                </div>
                <div class="flex items-center overflow-y-auto h-full w-[60%] pl-3 scrollbar-hide">
                  <p>Meriksa mata picek di TK Tadika-Mesra Lorem ipsum dolor sit amet.</p>
                </div>
              </div>
              <div class="flex flex-row items-center w-full h-[32%] py-1">
                <div class="flex flex-row w-[40%] h-full justify-between items-center pl-2">
                  <div class="w-[16px] h-[16px] rounded-full bg-[#7CBBAC]"></div>
                  <p>30-09-2022</p>
                  <div class="border-l-2 border-[#C2C2C2] h-full"></div>
                </div>
                <div class="flex items-center overflow-y-auto h-full w-[60%] pl-3 scrollbar-hide">
                  <p>Meriksa mata picek di TK Tadika-Mesra Lorem ipsum dolor sit amet.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="flex flex-col w-full md:w-1/2 xl:justify-between xl:pl-4 xl:h-full">
            <div class="flex flex-row w-full h-[66px] xl:h-[30%] mt-5 xl:mt-0 rounded-lg bg-white justify-start items-center pl-5">
              <svg width="40" height="40" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 5C0 2.23858 2.23858 0 5 0H29C31.7614 0 34 2.23858 34 5V29C34 31.7614 31.7614 34 29 34H5C2.23858 34 0 31.7614 0 29V5Z" fill="#82DCC6" />
                <path d="M17.7969 10.9486C18.5765 10.4297 19.9286 9.3075 19.9286 7.75439V7.1579H14.0722V7.75439C14.0722 9.3075 15.4243 10.4297 16.2039 10.9486C12.2772 11.563 8.94775 16.575 8.94775 20.579C8.94775 23.0462 10.9177 25.0526 13.3401 25.0526H20.6607C23.083 25.0526 25.053 23.0462 25.053 20.579C25.053 16.575 21.7236 11.563 17.7969 10.9486ZM16.007 17.4175L18.2339 17.7956C19.2156 17.9618 19.9286 18.8193 19.9286 19.8333C19.9286 21.0666 18.9433 22.0702 17.7324 22.0702V22.8158H16.2683V22.0702C15.0575 22.0702 14.0722 21.0666 14.0722 19.8333H15.5363C15.5363 20.2442 15.865 20.579 16.2683 20.579H17.7324C18.1358 20.579 18.4645 20.2442 18.4645 19.8333C18.4645 19.5515 18.2661 19.3129 17.9931 19.2667L15.7661 18.8886C14.7844 18.7224 14.0714 17.8649 14.0714 16.8509C14.0714 15.6176 15.0568 14.614 16.2676 14.614V13.8684H17.7317V14.614C18.9425 14.614 19.9279 15.6176 19.9279 16.8509H18.4638C18.4638 16.44 18.1351 16.1053 17.7317 16.1053H16.2676C15.8642 16.1053 15.5355 16.44 15.5355 16.8509C15.5355 17.1327 15.7339 17.3713 16.007 17.4175Z" fill="#1B443A" />
              </svg>
              <div class="flex flex-col justify-center ml-5">
                <p class="font-ex-bold text-[16px]">Rp. 400.000</p>
                <p class="font-ex-semibold text-[11px]">(Pemasukan Hari Ini)</p>
              </div>

            </div>
            <div class="flex flex-row w-full h-[66px] xl:h-[30%] mt-5 xl:mt-0 rounded-lg bg-white justify-start items-center pl-5">
              <svg width="40" height="40" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 5C0 2.23858 2.23858 0 5 0H29C31.7614 0 34 2.23858 34 5V29C34 31.7614 31.7614 34 29 34H5C2.23858 34 0 31.7614 0 29V5Z" fill="#F27F7A" />
                <path d="M24.3088 15.8758C24.052 15.2318 23.6828 14.6305 23.221 14.1045V11.2766C23.221 10.8062 23.0098 10.3693 22.6406 10.077C22.2775 9.78999 21.8133 9.68647 21.3636 9.79227C19.9772 10.1234 18.9372 10.9105 18.3804 12.0348H14.3064C12.3457 12.0348 10.5856 12.9162 9.43013 14.2948C8.51854 14.1616 8.62869 12.7945 9.54636 12.796C10.5392 12.7922 10.54 11.2774 9.54636 11.2736C7.12685 11.266 6.40973 14.6274 8.58311 15.6193C7.24687 18.3748 8.40915 21.9236 11.0657 23.3927V23.4528C11.0672 26.0036 14.6665 26.5874 15.4937 24.214H17.2736C18.1009 26.589 21.7001 26.0021 21.7016 23.4528V23.3828C22.8867 22.6954 23.8067 21.632 24.3088 20.373C24.9325 20.2398 25.4999 19.7275 25.4999 18.8856V17.3632C25.4999 16.5213 24.9317 16.009 24.3088 15.8758ZM20.942 17.3632C19.9484 17.3586 19.9484 15.8454 20.942 15.8408C21.9356 15.8454 21.9356 17.3586 20.942 17.3632ZM11.8656 10.9021C11.4387 6.64622 17.7453 6.23441 17.9034 10.5124H14.3071C13.4556 10.5124 12.6359 10.6532 11.8656 10.9021Z" fill="#7B221F" />
              </svg>
              <div class="flex flex-col justify-center ml-5">
                <p class="font-ex-bold text-[16px]">Rp. 100.000</p>
                <p class="font-ex-semibold text-[11px]">(Pengeluaran Hari Ini)</p>
              </div>

            </div>
            <div class="flex flex-row w-full h-[66px] xl:h-[30%] mt-5 xl:mt-0 rounded-lg bg-white justify-start items-center pl-5">
              <svg width="40" height="40" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 5C0 2.23858 2.23858 0 5 0H29C31.7614 0 34 2.23858 34 5V29C34 31.7614 31.7614 34 29 34H5C2.23858 34 0 31.7614 0 29V5Z" fill="#EDC683" />
                <path d="M17.8992 22.0073C17.3233 22.6355 16.9996 23.487 16.9996 24.3757V25.5H18.0302C18.8448 25.5 19.6253 25.1469 20.2012 24.5186L25.0226 19.2587C25.658 18.5655 25.658 17.4405 25.0226 16.7473C24.3873 16.0542 23.356 16.0542 22.7206 16.7473L17.8992 22.0073ZM16.8976 20.9146L20.4866 17H19.1253C18.1988 16.9954 18.1995 15.4584 19.1253 15.4545H21.9429C22.9126 14.5365 24.4312 14.4284 25.5 15.2026V12.3636C25.5 10.2332 23.9113 8.5 21.9585 8.5H12.0415C10.0887 8.5 8.5 10.2332 8.5 12.3636V20.0909C8.5 22.2213 10.0887 23.9545 12.0415 23.9545H15.6022C15.6914 22.8063 16.1419 21.7391 16.8976 20.9146ZM19.1253 12.3636H21.9585C22.8849 12.3683 22.8842 13.9052 21.9585 13.9091H19.1253C18.1988 13.9045 18.1995 12.3675 19.1253 12.3636ZM13.4581 21.6364C13.0664 21.6364 12.7498 21.2902 12.7498 20.8636V20.0909H12.56C11.8042 20.0909 11.0988 19.6474 10.7198 18.9326C10.5236 18.5632 10.6398 18.0911 10.9776 17.877C11.3176 17.6622 11.7504 17.7897 11.9452 18.1591C12.072 18.3971 12.3071 18.5455 12.5593 18.5455H14.1657C14.8719 18.5957 15.1871 17.3477 14.4179 17.1855L12.2639 16.7937C9.78345 16.2922 10.3175 12.3482 12.7491 12.3636V11.5909C12.7534 10.5802 14.1622 10.581 14.1657 11.5909V12.3636H14.3555C15.1113 12.3636 15.8168 12.808 16.1957 13.5227C16.3919 13.8921 16.2758 14.3642 15.9379 14.5783C15.5972 14.7915 15.1651 14.6656 14.9704 14.2962C14.8436 14.0575 14.6084 13.9099 14.3563 13.9099H12.7498C12.0436 13.8596 11.7284 15.1076 12.4977 15.2699L14.6516 15.6616C17.1321 16.1631 16.598 20.1071 14.1664 20.0917V20.8644C14.1664 21.291 13.8498 21.6364 13.4581 21.6364Z" fill="#604619" />
              </svg>
              <div class="flex flex-col justify-center ml-5">
                <p class="font-ex-bold text-[16px]">Rp. 300.000</p>
                <p class="font-ex-semibold text-[11px]">(Sisa Pengeluaran Hari Ini)</p>
              </div>

            </div>
          </div>

        </div>

        <!-- chart -->
        <div id="container_chart" class="flex h-[340px] xl:h-[57%] mt-5 xl:my-0 rounded-lg bg-white justify-center items-center">
          <div id="chart"></div>
        </div>
      </div>

    </div>

  </div>

  <script src="../js/apexcharts.js"></script>
  <script src="../js/jquery-3.6.1.min.js"></script>
  <script>
    $(document).ready(function() {
      console.log($(document).width());
    });

    // pie chart
    var options = {
      chart: {
        width: 380,
        type: 'pie'
      },
      legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        width: 250,
        offsetX: 45,
      },
      labels: ['DLGH', 'JENSET', 'DEASEL', 'KOBOY', 'BLACK PANTHER'],
      series: [44, 55, 13, 43, 22],
    }

    var chart = new ApexCharts(document.querySelector("#pie_chart"), options);

    chart.render();

    // load sidebar
    $("#ex-sidebar").load("../assets/components/sidebar.html", function() {
      $('#dashboard').addClass("hover-sidebar");
      $('#button-logout').on('click', function() {
        $('#modalLogout').toggleClass("scale-0");
        $('#bgmodal').addClass("effectmodal");
      });
    });

    // auto hide sidebar

    $("#burger").on("click", function() {
      $('#bgbody').toggleClass("hidden");

      $('#ex-sidebar').toggleClass("ex-hide-sidebar");
      $('#burger').toggleClass("show");
    });

    $("#bgbody").on("click", function() {
      $('#ex-sidebar').toggleClass("ex-hide-sidebar");
      $('#burger').toggleClass("show");

      $('#bgbody').toggleClass("hidden");

    });

    // date
    function datenow() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0'); //pdStart tujuannya agar semua item memiliki panjang yang diinginkan
      var mm = String(today.getMonth()); //January is 0!
      var yyyy = today.getFullYear();

      var cars = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

      for (i = 0; i < cars.length; i++) {
        if (i == mm) {
          mm = cars[i];
          break;
        }
      }

      today = dd + ' ' + mm + ' ' + yyyy;

      document.getElementById("date").innerText = today;
    }

    datenow();

    // time
    function currentTime() {

      let date = new Date();
      let hh = date.getHours();
      let mm = date.getMinutes();
      let ss = date.getSeconds();

      hh = (hh < 10) ? "0" + hh : hh;
      mm = (mm < 10) ? "0" + mm : mm;
      ss = (ss < 10) ? "0" + ss : ss;

      let time = hh + " : " + mm + " : " + ss;

      document.getElementById("time").innerText = time;

      var t = setTimeout(function() {
        currentTime()
      }, 1000);

    }

    window.onresize = function() {
      runchart();
    }

    currentTime();

    // chart
    var divChart = document.getElementById("container_chart").getBoundingClientRect();
    var chartWidth = divChart.width - 70;
    var chartHight = divChart.height - 50;

    var options = {
      chart: {
        redrawOnWindowResize: true,
        type: 'bar',
        width: chartWidth,
        height: chartHight,
        // width: undefined,
        toolbar: {
          show: true,
          offsetX: 0,
          offsetY: 0,

          export: {
            csv: {
              filename: undefined,
              columnDelimiter: ',',
              headerCategory: 'category',
              headerValue: 'value',
              dateFormatter(timestamp) {
                return new Date(timestamp).toDateString()
              }
            },
            svg: {
              filename: undefined,
            },
            png: {
              filename: undefined,
            }
          },
          autoSelected: 'zoom'
        },
      },
      dataLabels: {
        enabled: false,

      },
      legend: {
        show: true,

        position: 'bottom',
        horizontalAlign: 'center',

        floating: false,
        fontSize: '14px',
        fontFamily: 'Helvetica, Arial',
        fontWeight: 400,



        offsetX: 0,
        offsetY: 0,
        labels: {
          colors: ['#0782C8', '#0782C8'],
          useSeriesColors: true
        },
      },

      title: {
        text: 'Grafik Daerah',
        align: 'left',
        margin: 60,
        offsetX: 0,
        offsetY: -20,
        floating: true,
        style: {
          fontSize: '16px',
          fontWeight: 'bold',
          fontFamily: undefined,
          color: '#343948'
        },
      },


      series: [{
        name: 'Pemasukkan',
        data: [30, 20, 45, 50, 32, 60, 42],
      }, ],
      stroke: {
        colors: ["transparent"],
        width: 2
      },

      colors: ['#0782C8'],

      xaxis: {
        categories: ['Paga', 'Garahan', 'Sumbersari', 'Gebang', 'Kebonsari', 'Patrang', 'Trunojoyo']
      }

    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();

    runchart();
  </script>
</body>

</html>