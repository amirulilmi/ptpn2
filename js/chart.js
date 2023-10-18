// // window.onload = function() {
// //     var chart = new CanvasJS.Chart("chartContainer", {
// //         animationEnabled: true,
// //         title: {
// //             text: "Usage Share of Desktop Browsers"
// //         },
// //         subtitles: [{
// //             text: "November 2017"
// //         }],
// //         data: [{
// //             type: "pie",
// //             yValueFormatString: "#,##0.00\"%\"",
// //             indexLabel: "{label} ({y})",
// //             dataPoints: "<?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>"
// //         }]
// //     });
// //     chart.render();
// // }

// import Chart from "chart.js/auto";

// (async function() {
//     const data = [
//       { year: 2010, count: 10 },
//       { year: 2011, count: 20 },
//       { year: 2012, count: 15 },
//       { year: 2013, count: 25 },
//       { year: 2014, count: 22 },
//       { year: 2015, count: 30 },
//       { year: 2016, count: 28 },
//     ];
  
//     new Chart(
//       document.getElementById('acquisitions'),
//       {
//         type: 'bar',
//         data: {
//           labels: data.map(row => row.year),
//           datasets: [
//             {
//               label: 'Acquisitions by year',
//               data: data.map(row => row.count)
//             }
//           ]
//         }
//       }
//     );
//   })();