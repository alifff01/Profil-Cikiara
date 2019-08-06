<?php

/**
 * This file is part of the Chatomz PHP Framework package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author         Firman Setiawan
 * @copyright      Copyright (c) Firman Setiawan
 */

// -------------------------------------------------------------------------------------------------

namespace app\Libraries;

// -------------------------------------------------------------------------------------------------


class Chart
{
	public function pie($judul, $label, $nilai, $width='300', $height='200')
	{
		$color = self::getColor();
		$html = "	<canvas id='" . $judul . "' width='" . $width . "' height='" . $height . "'></canvas>
			<script type='text/javascript'>
				var oilCanvas = document.getElementById('" . $judul . "');
				var oilData = {
					labels: [ ".$label." ],
					datasets: [
						{
						 	data: [ ".$nilai."],
						 	  backgroundColor: [" . $color . "]
					}]
				};

				var pieChart = new Chart(oilCanvas, {
						type: 'doughnut',
						data: oilData
				});
			</script>";
		echo $html;
	}

	public function line($judul, $label, $nilai, $width='300', $height='200')
	{
		$color = self::getColor();
		$html = "<canvas id='" . $judul . "'  width='" . $width . "' height='" . $height . "'></canvas>
					<script>
		            var ctx = document.getElementById('" . $judul . "');
		            var myChart = new Chart(ctx, {
		                type: 'line',
		                data: {
		                    labels: ['0', ".$label." ],
		                    datasets: [{
		                            label: '" .$judul. "',
		                            data: [0, ".$nilai." ],
						 	  		backgroundColor: [" . $color . "],
		                            borderColor: [" . $color . "],
		                            borderWidth: 1
		                        }]
		                },
		                options: {
		                    scales: {
		                        yAxes: [{
		                                ticks: {
		                                    beginAtZero: true
		                                }
		                            }]
		                    }
		                }
		            });
			        </script>";
		echo $html;
	}

	public function linechart($id)
	{
	// ------------------------------------------------------- //
    // Line Chart
    // ------------------------------------------------------ //
	$html 	= "<canvas id=" . $id . "></canvas>
			<script>
		    var legendState = true;
		    if ($(window).outerWidth() < 576) {
		        legendState = false;
		    }

		    var LINECHART = $('#" . $id . "');
		    var myLineChart = new Chart(LINECHART, {
		        type: 'line',
		        options: {
		            scales: {
		                xAxes: [{
		                    display: true,
		                    gridLines: {
		                        display: false
		                    }
		                }],
		                yAxes: [{
		                    display: true,
		                    gridLines: {
		                        display: false
		                    }
		                }]
		            },
		            legend: {
		                display: legendState
		            }
		        },
		        data: {
		            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17'],
		            datasets: [
		                {
		                    label: 'Page Visitors',
		                    fill: true,
		                    lineTension: 0,
		                    backgroundColor: 'transparent',
		                    borderColor: '#f15765',
		                    pointBorderColor: '#da4c59',
		                    pointHoverBackgroundColor: '#da4c59',
		                    borderCapStyle: 'butt',
		                    borderDash: [],
		                    borderDashOffset: 0.0,
		                    borderJoinStyle: 'miter',
		                    borderWidth: 1,
		                    pointBackgroundColor: '#fff',
		                    pointBorderWidth: 1,
		                    pointHoverRadius: 5,
		                    pointHoverBorderColor: '#fff',
		                    pointHoverBorderWidth: 2,
		                    pointRadius: 1,
		                    pointHitRadius: 0,
		                    data: [50, 20, 60, 31, 52, 22, 40, 25, 30, 68, 56, 40, 60, 43, 55, 39, 47],
		                    spanGaps: false
		                },
		                {
		                    label: 'Page Views',
		                    fill: true,
		                    lineTension: 0,
		                    backgroundColor: 'transparent',
		                    borderColor: '#54e69d',
		                    pointHoverBackgroundColor: '#44c384',
		                    borderCapStyle: 'butt',
		                    borderDash: [],
		                    borderDashOffset: 0.0,
		                    borderJoinStyle: 'miter',
		                    borderWidth: 1,
		                    pointBorderColor: '#44c384',
		                    pointBackgroundColor: '#fff',
		                    pointBorderWidth: 1,
		                    pointHoverRadius: 5,
		                    pointHoverBorderColor: '#fff',
		                    pointHoverBorderWidth: 2,
		                    pointRadius: 1,
		                    pointHitRadius: 10,
		                    data: [20, 7, 35, 17, 26, 8, 18, 10, 14, 46, 30, 30, 14, 28, 17, 25, 17, 40],
		                    spanGaps: false
		                }
		            ]
		        }
		    });
		    </script>";
		echo $html;
	}

	public function bar($judul, $label, $nilai, $width='300', $height='200')
	{
		$color = '#1ABC9C';
		$html = "
		<canvas id='" . $judul . "' width='" . $width . "' height='" . $height . "'></canvas>
			<script>
            var ctx = document.getElementById('" . $judul . "');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [ " . $label . " ],
                    datasets: [{
                            label: '". $judul . "',
                            data: [ " . $nilai . " ],
                            backgroundColor: ['" . $color . "'],
                            borderColor: ['" . $color . "'],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        	</script> ";
        echo $html;
	}

	public function getColor($color='default')
	{
		if ($color == 'default') {
			$color = self::colorDefault();
		}

		$bgcolor = null;
        foreach ($color as $row) {
        	$bgcolor .= "'#" . $row . "',";
        }
        return rtrim($bgcolor,',');
	}

	public function colorDefault()
	{
		$color = [
			'1ABC9C',
			'2ECC71',
			'3498DB',
			'9B59B6',
			'34495E',
			'F1C40F',
			'E67E22',
			'E74C3C',
			'ECF0F1',
			'95A5A6'
		];
		return $color;
	}
}